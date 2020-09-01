<?php

namespace App\Http\Controllers;

use App\Bet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BetController extends Controller
{

    # ____________________________________Using Ajax__________________________________
    public function placeBit(Request $request)
    {
        # Auth User
        $userId = Auth::user()->id;

        # Requested Data from JS - Ajax Request
        $gameID = $request->gameID;
        $quesID = $request->quesID;
        $ansID =  $request->ansID;
        $BETreturnRate =  $request->BETreturnRate;
        $BETamount =  $request->BETamount;
        $match =  $request->match;
        $total_win = $BETamount * $BETreturnRate;

        # __________START NEED TO CHECK IF I HAVE ENOUGH BALANCE AND IF SO THEN MOVE THE BALANCE IN LOCK CREDITS COLUMN
        $amount = User::where('id', $userId)->pluck('credits');
        $amount = $amount[0];

        $LockAmount = User::where('id', $userId)->pluck('lock_credits');
        $LockAmount = $LockAmount[0];

        if ($amount < $BETamount) {
            return response()->json('Insufficient Balance');
        } else {
            $updatingUserAccount = User::where('id', $userId)->first();
            if ($updatingUserAccount) {
                $updatingUserAccount->update([
                    'credits' => $amount - $BETamount,
                    'lock_credits' => $LockAmount + $BETamount
                ]);
            }
        }
        # __________END NEED TO CHECK IF I HAVE ENOUGH BALANCE AND IF SO THEN MOVE THE BALANCE IN LOCK CREDITS COLUMN



        # Calculation of Club Fee
        $club_id = DB::table('users')->where('id', $userId)->pluck('club_id');
        $club_id = $club_id[0] ?? null;
        $commission = DB::table('clubs')->where('id', $club_id)->pluck('commission');
        $commission = $commission[0] ?? null;
        // $commission = ($commission * $total_win) / 100;
        $commission = ($total_win) / 100;

        $BetInsert = Bet::create([
            'bet_by' =>  $userId,
            'match' => $match,
            'game_id' => $gameID,
            'question_id' => $quesID,
            'answer_id' => $ansID,
            'amount' => $BETamount,
            'return_rate' => $BETreturnRate,
            'total_win' => $total_win,
            'return_amount' => $total_win,
            'club_fee' => $commission,
        ]);

        if ($BetInsert) {
            $data = 'Bit has been placed successfully!';
        } else {
            $data = 'Bet has not been placed!';
        }

        return response()->json($data);
    }

    public function status($bet_id, $code)
    {
        $status = DB::table('bets')
            ->where('id', '=', $bet_id)
            ->pluck('status');
        $status = $status[0] ?? null;

        $state = $status;

        if ($code == 0) {
            $state = 'cancelled';
        }


        $updatingBet = Bet::where('id', $bet_id)->first();
        if ($updatingBet) {
            $updatingBet->update([
                'status' => $state,
            ]);
        }

        # CUSTOM ALERT
        $msg1 = 'error';
        $msg2 = 'Bet Status is not Changes!';
        if ($updatingBet) {
            $msg1 = 'message';
            $msg2 = 'Bet Status Changes!';
        }

        return Redirect::route('admin.bets')->with($msg1, $msg2);
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
     * @param  \App\Bet  $bet
     * @return \Illuminate\Http\Response
     */
    public function show(Bet $bet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bet  $bet
     * @return \Illuminate\Http\Response
     */
    public function edit(Bet $bet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bet  $bet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bet $bet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bet  $bet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bet $bet)
    {
        //
    }
}
