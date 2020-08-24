<?php

namespace App\Http\Controllers;

use App\StackQuestion;
use App\AutoStackCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class StackQuestionController extends Controller
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

    public function add(AutoStackCategory $autoStackCategory)
    {
        return view('dashboard.auto_stacks.stack_options.questions.add', compact('autoStackCategory'));
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
            'cat_id' => 'required',
            'question' => 'required',
        ]);

        $quesStore = StackQuestion::create([
            'auto_stack_cat_id' =>  $request->input('cat_id'),
            'question' => $request->input('question'),
        ]);

        # CUSTOM ALERT
        $msg1 = 'error';
        $msg2 = 'Question is not Added!';
        if ($quesStore) {
            $msg1 = 'message';
            $msg2 = 'Question is Added!';
        }
        return Redirect::route('admin.auto_stack.stack_options', [$request->cat_id])->with($msg1, $msg2);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StackQuestion  $stackQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(StackQuestion $stackQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StackQuestion  $stackQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(StackQuestion $stackQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StackQuestion  $stackQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StackQuestion $stackQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StackQuestion  $stackQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(StackQuestion $stackQuestion)
    {
        $deleteQues = DB::table('stack_questions')->where('id', $stackQuestion->id)->delete();

        # CUSTOM ALERT
        $msg1 = 'error';
        $msg2 = 'Question is not sDeleted!';
        if ($deleteQues) {
            $msg1 = 'message';
            $msg2 = 'Question Deleted!!';
        }

        return back()->with($msg1, $msg2);
    }

    public function status($cat_id, $ques_id, $code)
    {
        $status = DB::table('stack_questions')
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


        $updatingQues = StackQuestion::where('id', $ques_id)->first();
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

        return Redirect::route('admin.auto_stack.stack_options', [$cat_id])->with($msg1, $msg2);
    }
}
