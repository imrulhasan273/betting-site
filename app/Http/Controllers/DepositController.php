<?php

namespace App\Http\Controllers;

use App\Deposit;
use App\PaymentOption;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DepositController extends Controller
{

    public function getNumber(Request $request)
    {
        $data = PaymentOption::where('id', $request->method_id)->get('phone');
        return response()->json($data[0]->phone);
    }

    # BY USER
    public function placeDeposit(Request $request)
    {
        # CHECK IF AUTH USER IS AN ADMIN/SUPER/CLUB ADMIN -> THEY CAN'T PLAY
        $authRole = Auth::check() ? Auth::user()->role->pluck('name')->toArray() : [];
        if ($authRole[0] == 'admin' || $authRole[0] == 'super_admin' || $authRole[0] == 'club_admin') {
            return response()->json($authRole[0]);
        }

        $InsertDeposit = false;

        if (is_numeric($request->amount)) {

            $userId = Auth::user()->id;

            $InsertDeposit = Deposit::create([
                'user_id' =>  $userId,
                'deposit_to' => $request->deposit_to,
                'deposit_by' => $request->deposit_by,
                'amount' => $request->amount,
                'method_id' => $request->method_id,
                'transection_id' => $request->transection_id,
                'note' => '',
                'status' => 'pending'
            ]);
        }

        if ($InsertDeposit) {
            $data = 'insert';
        } else {
            $data = 'failed';
        }

        return response()->json($data);
    }


    #BY ADMIN
    public function status(Deposit $deposit, $code)
    {
        // dd($deposit);
        $flag = Deposit::where('id', $deposit->id)->pluck('status');
        $flag  = $flag[0] ?? null;

        if ($code == 0) {
            DB::table('deposits')->where('id', $deposit->id)->delete();
            return Redirect::route('admin.user.deposit')->with('error', 'Deposit Deleted');
        }

        if ($flag == 'paid') {
            return back()->with('error', 'Already Paid');
        } else if ($flag == 'cancel') {
            return back()->with('error', 'Already Cancelled');
        }

        # -- - - --- - - -- - - - -- - -- -- - - --- - - -- -- - -- - - - -

        $state = null;
        if ($code == 1) {
            $state = 'paid';
        } else if ($code == 0) {
            $state = 'reject';
        } else if ($code == 2) {
            $state = 'cancel';
        }



        if ($state == 'paid') {

            # UPDATE USER ACCOUNT (ADD)
            $PrevAmount = User::where('id', $deposit->user_id)->pluck('credits');
            $updatingUserAccount = User::where('id', $deposit->user_id)->first();

            if ($updatingUserAccount) {
                $updatingUserAccount->update([
                    'credits' => $PrevAmount[0] + $deposit->amount
                ]);
            }

            # ADD TRANSECTION HISTORY FOR USER
            DB::table('user_transection')->insert(
                [
                    'user_id' => $deposit->user_id,
                    'from_id' => '',
                    'debit' => 0,
                    'credit' => $deposit->amount,
                    'balance' => $PrevAmount[0] + $deposit->amount,
                    'description' => 'Deposit',
                    'created_at' =>  \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]
            );

            # UPDATE SUPER ADMIN ACCOUNT (SUBSTRACT)
            $superAdmin = User::whereHas(
                'role',
                function ($q) {
                    $q->where('name', 'super_admin');
                }
            )->get();
            $superAdmin = $superAdmin[0];

            $BANK = User::where('id', $superAdmin->id)->pluck('credits');

            $SuperAdminUser = User::where('id', $superAdmin->id)->first();
            if ($SuperAdminUser) {
                $SuperAdminUser->update([
                    'credits' => $BANK[0] - $deposit->amount,
                ]);
            }

            # ADD TRANSECTION HISTORY FOR SUPER ADMIN
            DB::table('user_transection')->insert(
                [
                    'user_id' => $superAdmin->id,
                    'from_id' => '',
                    'debit' => $deposit->amount,
                    'credit' => 0,
                    'balance' => $BANK[0] - $deposit->amount,
                    'description' => 'Deposit',
                    'created_at' =>  \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]
            );
        }


        $updatingDeposit = Deposit::where('id', $deposit->id)->first();
        if ($updatingDeposit) {
            $updatingDeposit->update([
                'status' => $state
            ]);
        }

        # CUSTOM ALERT
        $msg1 = 'error';
        $msg2 = 'Deposit Request rejected!';
        if ($code == 1) {
            $msg1 = 'message';
            $msg2 = 'Deposit Request accepted!';
        } else if ($code == 2) {
            $msg1 = 'error';
            $msg2 = 'Deposit Request Cancelled!';
        }

        return Redirect::route('admin.user.deposit')->with($msg1, $msg2);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposit $deposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deposit $deposit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposit $deposit)
    {
        //
    }
}
