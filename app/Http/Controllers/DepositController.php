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

    public function placeDeposit(Request $request)
    {
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

    public function status(Deposit $deposit, $code)
    {

        $state = null;
        if ($code == 1) {
            $state = 'paid';
        } else if ($code == 0) {
            $state = 'reject';
        }

        if ($state == 'paid') {
            $PrevAmount = User::where('id', $deposit->user_id)->pluck('credits');
            $updatingUserAccount = User::where('id', $deposit->user_id)->first();
            if ($updatingUserAccount) {
                $updatingUserAccount->update([
                    'credits' => $PrevAmount[0] + $deposit->amount
                ]);
            }
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
