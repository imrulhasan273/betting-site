<?php

namespace App\Http\Controllers;

use App\StackAnswer;
use App\StackQuestion;
use App\AutoStackCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class StackAnswerController extends Controller
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


    public function add(AutoStackCategory $autoStackCategory, StackQuestion $stackQuestion)
    {
        return view('dashboard.auto_stacks.stack_options.answers.add', compact('stackQuestion', 'autoStackCategory'));
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

        $ansStore = StackAnswer::create([
            'question_id' =>  $request->input('question_id'),
            'answer' => $request->input('answer'),
            'bet_rate' => $request->input('bet_rate'),
        ]);

        # CUSTOM ALERT
        $msg1 = 'error';
        $msg2 = 'Answer is not Added!';
        if ($ansStore) {
            $msg1 = 'message';
            $msg2 = 'Answer is Added!';
        }

        return Redirect::route('admin.auto_stack.stack_options', [$request->cat_id])->with($msg1, $msg2);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StackAnswer  $stackAnswer
     * @return \Illuminate\Http\Response
     */
    public function show(StackAnswer $stackAnswer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StackAnswer  $stackAnswer
     * @return \Illuminate\Http\Response
     */
    public function edit($cat_id, StackAnswer $stackAnswer)
    {
        return view('dashboard.auto_stacks.stack_options.answers.edit', compact('cat_id', 'stackAnswer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StackAnswer  $stackAnswer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StackAnswer $stackAnswer)
    {
        $updatingAnswer = StackAnswer::where('id', $request->answer_id)->first();
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

        return Redirect::route('admin.auto_stack.stack_options', [$request->cat_id])->with($msg1, $msg2);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StackAnswer  $stackAnswer
     * @return \Illuminate\Http\Response
     */
    public function destroy(StackAnswer $stackAnswer)
    {
        $deleteAns = DB::table('stack_answers')->where('id', $stackAnswer->id)->delete();
        if ($deleteAns) {
            return back()->with('message', 'Answer Deleted!');
        }

        return back()->with('error', 'Answer is not sDeleted!');
    }
}
