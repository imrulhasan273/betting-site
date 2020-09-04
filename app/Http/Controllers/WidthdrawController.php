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




    public function status(Widthdraw $widthdraw, $code)
    {
        $flag = Widthdraw::where('id', $widthdraw->user_id)->pluck('status');

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
            $LockCredits = User::where('id', $widthdraw->user_id)->pluck('lock_credits');
            $LockCredits = $LockCredits[0];

            $updatingUserAccount = User::where('id', $widthdraw->user_id)->first();
            if ($updatingUserAccount) {
                $updatingUserAccount->update([
                    'lock_credits' => $LockCredits - $widthdraw->amount
                ]);
            }
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

        $updatingDeposit = Widthdraw::where('id', $widthdraw->id)->first();
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
