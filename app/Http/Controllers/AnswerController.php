<?php

namespace App\Http\Controllers;

use App\Bet;
use App\Game;
use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AnswerController extends Controller
{
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

    public function add(Game $game, Question $question)
    {
        // dd($game->id);
        return view('dashboard.games.betting_options.answers.add', compact('question', 'game'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'answer' => 'required',
            'bet_rate' => 'required'
        ]);

        $gameStore = Answer::create([
            'question_id' =>  $request->input('question_id'),
            'answer' => $request->input('answer'),
            'bet_rate' => $request->input('bet_rate'),
        ]);

        # CUSTOM ALERT
        $msg1 = 'error';
        $msg2 = 'Answer is not Added!';
        if ($gameStore) {
            $msg1 = 'message';
            $msg2 = 'Answer is Added!';
        }

        return Redirect::route('admin.games.bet', [$request->game_id])->with($msg1, $msg2);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit($game_id, Answer $answer)
    {
        return view('dashboard.games.betting_options.answers.edit', compact('game_id', 'answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        // dd($request);

        $updatingAnswer = Answer::where('id', $request->answer_id)->first();
        if ($updatingAnswer) {
            $updatingAnswer->update([
                'answer' =>  $request->input('answer'),
                'bet_rate' => $request->input('bet_rate'),
            ]);
        }

        # CUSTOM ALERT
        $msg1 = 'error';
        $msg2 = 'Answer is not Updated!';
        if ($updatingAnswer) {
            $msg1 = 'message';
            $msg2 = 'Answer is Updated!';
        }

        return Redirect::route('admin.games.bet', [$request->game_id])->with($msg1, $msg2);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        $deleteAns = DB::table('answers')->where('id', $answer->id)->delete();
        if ($deleteAns) {
            return back()->with('message', 'Answer Deleted!');
        }

        return back()->with('error', 'Answer is not sDeleted!');
    }

    public function status($game_id, $ans_id, $code)
    {
        // dd($ans_id);

        $status = DB::table('answers')
            ->where('id', '=', $ans_id)
            ->pluck('status');
        $status = $status[0] ?? null;

        $state = $status;

        if ($code == 1) {
            if ($status == 'active') {
                $state = 'inactive';
            } else if ($status == 'inactive') {
                $state = 'active';
            }
        }


        $updatingAns = Answer::where('id', $ans_id)->first();
        if ($updatingAns) {
            $updatingAns->update([
                'status' => $state,
            ]);
        }

        # CUSTOM ALERT
        $msg1 = 'error';
        $msg2 = 'Answer Status is not Changes!';
        if ($updatingAns) {
            $msg1 = 'message';
            $msg2 = 'Answer Status Changes!';
        }

        return Redirect::route('admin.games.bet', [$game_id])->with($msg1, $msg2);
    }

    public function result(Question $question, Answer $answer)
    {
        $winedID = $answer->id;
        $failedIDs = Answer::where('question_id', $question->id)
            ->where('id', '!=', $answer->id)->pluck('id')->toArray();

        $winBet = Bet::where('answer_id', $winedID)->first();
        $lossBet = Bet::whereIn('answer_id', $failedIDs)->get();


        dd($lossBet);
    }
}
