<?php

namespace App\Http\Controllers;

use App\Bet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BetController extends Controller
{

    # ____________________________________Using Ajax__________________________________
    public function placeBit(Request $request)
    {
        $gameID = $request->gameID;
        $quesID = $request->quesID;
        $ansID =  $request->ansID;
        $BETreturnRate =  $request->BETreturnRate;
        $BETamount =  $request->BETamount;
        $match =  $request->match;

        #
        $userId = Auth::user()->id;
        $total_win = $BETamount * $BETreturnRate;
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
            'club_fee' => 0.01,
        ]);

        if ($BetInsert) {
            $data = 'Inserted';
        } else {
            $data = 'Not Inserted';
        }

        return response()->json($data);
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
