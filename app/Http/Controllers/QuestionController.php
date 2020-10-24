<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Game;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class QuestionController extends Controller
{
    public function answersStatus(Request $request)
    {
        $questionStatus = DB::table('questions')->where('id', '=', $request->id)->pluck('flag_ans');
        $questionStatus = $questionStatus[0] ?? null;

        if ($questionStatus == 0) {
            $status = 'inactive';
            $updatingQues = Question::where('id', $request->id)->first();
            if ($updatingQues) {
                $updatingQues->update([
                    'flag_ans' => 1,
                ]);
            }
        } else {
            $status = 'active';
            $updatingQues = Question::where('id', $request->id)->first();
            if ($updatingQues) {
                $updatingQues->update([
                    'flag_ans' => 0,
                ]);
            }
        }

        $answers = Answer::where('question_id', $request->id)->get();
        foreach ($answers as $answer) {
            $updatingAns = Answer::where('id', $answer->id)->first();
            if ($updatingAns) {
                $updatingAns->update([
                    'status' => $status,
                ]);
            }
        }
        return response()->json($request->id);
    }

    public function add(Game $game)
    {
        return view('dashboard.games.betting_options.questions.add', compact('game'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'question' => 'required',
        ]);

        $gameStore = Question::create([
            'game_id' =>  $request->input('game_id'),
            'question' => $request->input('question'),
        ]);

        # CUSTOM ALERT
        $msg1 = 'error';
        $msg2 = 'Question is not Added!';
        if ($gameStore) {
            $msg1 = 'message';
            $msg2 = 'Question is Added!';
        }
        return Redirect::route('admin.games.bet', [$request->game_id])->with($msg1, $msg2);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $deleteQues = DB::table('questions')->where('id', $question->id)->delete();

        # CUSTOM ALERT
        $msg1 = 'error';
        $msg2 = 'Question is not sDeleted!';
        if ($deleteQues) {
            $msg1 = 'message';
            $msg2 = 'Question Deleted!!';
        }

        return back()->with($msg1, $msg2);
    }

    public function status($game_id, $ques_id, $code)
    {
        $status = DB::table('questions')
            ->where('id', '=', $ques_id)
            ->pluck('is_active');
        $status = $status[0] ?? null;

        $state = $status;

        if ($code == 1) {
            if ($status == 1) {
                $state = 0;
            } else if ($status == 0) {
                $state = 1;
            }
        }


        $updatingQues = Question::where('id', $ques_id)->first();
        if ($updatingQues) {
            $updatingQues->update([
                'is_active' => $state,
            ]);
        }

        # CUSTOM ALERT
        $msg1 = 'error';
        $msg2 = 'Question Status is not Changes!';
        if ($updatingQues) {
            $msg1 = 'message';
            $msg2 = 'Question Status Changes!';
        }

        return Redirect::route('admin.games.bet', [$game_id])->with($msg1, $msg2);
    }
}
