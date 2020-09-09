<?php

namespace App\Http\Controllers;

use App\User;
use App\Widthdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class WidthdrawController extends Controller
{

    public function requestUserWidthdraw(Request $request)
    {

        # CHECK IF AUTH USER IS AN ADMIN/SUPER/CLUB ADMIN -> THEY CAN'T PLAY
        $authRole = Auth::check() ? Auth::user()->role->pluck('name')->toArray() : [];
        if ($authRole[0] == 'admin' || $authRole[0] == 'super_admin' || $authRole[0] == 'club_admin') {
            return response()->json($authRole[0]);
        }


        $userId = Auth::user()->id;

        $method = $request->method;
        $type = $request->type;
        $to = $request->to;
        $amount =  $request->amount;

        $CurrentCredits = User::where('id', $userId)->pluck('credits');
        $CurrentCredits = $CurrentCredits[0];

        $LockCredits = User::where('id', $userId)->pluck('lock_credits');
        $LockCredits = $LockCredits[0];

        if ($CurrentCredits < $amount) {
            return response()->json('Insufficient Balance');
        }

        $InsertWidthdraw = false;

        if (is_numeric($amount)) {

            $userRole = Auth::user()->role[0]->name;

            $InsertWidthdraw = Widthdraw::create([
                'user_id' =>  $userId,
                'user_role' => $userRole,
                'method' => $method,
                'method_type' => $type,
                'amount' => $amount,
                'widthdraw_to' => $to,
                'note' => '',
                'status' => 'pending'
            ]);

            # MOVE WIDTHDRAW AMOUNT TO LOCK CREDITS
            $creditsToLockCredits = User::where('id', $userId)->first();
            if ($creditsToLockCredits) {
                $creditsToLockCredits->update([
                    'credits' => $CurrentCredits - $amount,
                    'lock_credits' => $LockCredits + $amount
                ]);
            }
        }

        if ($InsertWidthdraw) {
            $data = 'insert';
        } else {
            $data = 'failed';
        }

        return response()->json($data);
    }


    public function statusChangeByUser(Widthdraw $widthdraw, $code)
    {
        $flag = Widthdraw::where('id', $widthdraw->id)->pluck('status');
        $flag = $flag[0];

        if ($flag == 'paid') {
            return back()->with('error', 'Already Paid');
        } else if ($flag == 'cancel') {
            return back()->with('error', 'Already Cancelled');
        }

        # -- - - --- - - -- - - - -- - -- -- - - --- - - -- -- - -- - - - -

        $updatingWidthdraw = Widthdraw::where('id', $widthdraw->id)->first();
        if ($updatingWidthdraw) {
            $updatingWidthdraw->update([
                'status' => 'cancel'
            ]);
        }

        $Credits = User::where('id', $widthdraw->user_id)->pluck('credits');
        $Credits = $Credits[0];

        $LockCredits = User::where('id', $widthdraw->user_id)->pluck('lock_credits');
        $LockCredits = $LockCredits[0];

        $updatingUserAccount = User::where('id', $widthdraw->user_id)->first();
        if ($updatingUserAccount) {
            $updatingUserAccount->update([
                'lock_credits' => $LockCredits - $widthdraw->amount,
                'credits' => $Credits + $widthdraw->amount
            ]);
        }

        return back();
    }


    public function status(Widthdraw $widthdraw, $code)
    {
        // dd($widthdraw);

        $flag = Widthdraw::where('id', $widthdraw->id)->pluck('status');

        $flag  = $flag[0] ?? null;

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

            # UPDATE USER ACCOUNT (SUBSTRACT)
            $LockCredits = User::where('id', $widthdraw->user_id)->pluck('lock_credits');
            $LockCredits = $LockCredits[0];

            $updatingUserAccount = User::where('id', $widthdraw->user_id)->first();
            if ($updatingUserAccount) {
                $updatingUserAccount->update([
                    'lock_credits' => $LockCredits - $widthdraw->amount
                ]);
            }

            # ADD TRANSECTION HISTORY FOR USER
            $Credits = User::where('id', $widthdraw->user_id)->pluck('credits');
            $Credits = $Credits[0];
            $LockCredits = User::where('id', $widthdraw->user_id)->pluck('lock_credits');
            $LockCredits = $LockCredits[0];
            DB::table('user_transection')->insert(
                [
                    'user_id' => $widthdraw->user_id,
                    'from_id' => '',
                    'debit' => $widthdraw->amount,
                    'credit' => 0,
                    'balance' =>  $Credits + $LockCredits,
                    'description' => 'Widthdraw',
                    'created_at' =>  \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]
            );

            # START UPDATE SUPER ADMIN ACCOUNT (ADD)
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
                    'credits' => $BANK[0] + $widthdraw->amount,
                ]);
            }
            # END UPDATE SUPER ADMIN ACCOUNT (SUBSTRACT)

            # ADD TRANSECTION HISTORY FOR SUPER ADMIN
            DB::table('user_transection')->insert(
                [
                    'user_id' => $superAdmin->id,
                    'from_id' => '',
                    'debit' => 0,
                    'credit' => $widthdraw->amount,
                    'balance' => $BANK[0] + $widthdraw->amount,
                    'description' => 'Widthdraw Request',
                    'created_at' =>  \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]
            );
        } else if ($state == 'cancel') {

            $Credits = User::where('id', $widthdraw->user_id)->pluck('credits');
            $Credits = $Credits[0];

            $LockCredits = User::where('id', $widthdraw->user_id)->pluck('lock_credits');
            $LockCredits = $LockCredits[0];

            $updatingUserAccount = User::where('id', $widthdraw->user_id)->first();
            if ($updatingUserAccount) {
                $updatingUserAccount->update([
                    'lock_credits' => $LockCredits - $widthdraw->amount,
                    'credits' => $Credits + $widthdraw->amount
                ]);
            }
        }

        $updatingWidthdraw = Widthdraw::where('id', $widthdraw->id)->first();
        if ($updatingWidthdraw) {
            $updatingWidthdraw->update([
                'status' => $state
            ]);
        }

        # CUSTOM ALERT
        $msg1 = 'error';
        $msg2 = 'Widthdraw Request rejected!';
        if ($code == 1) {
            $msg1 = 'message';
            $msg2 = 'Widthdraw Request accepted!';
        } else if ($code == 2) {
            $msg1 = 'error';
            $msg2 = 'Widthdraw Request Cancelled!';
        }

        return back()->with($msg1, $msg2);
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
     * @param  \App\Widthdraw  $widthdraw
     * @return \Illuminate\Http\Response
     */
    public function show(Widthdraw $widthdraw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Widthdraw  $widthdraw
     * @return \Illuminate\Http\Response
     */
    public function edit(Widthdraw $widthdraw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Widthdraw  $widthdraw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Widthdraw $widthdraw)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Widthdraw  $widthdraw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Widthdraw $widthdraw)
    {
        //
    }
}
