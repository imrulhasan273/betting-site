<?php

namespace App\Http\Controllers;

use App\AutoStackCategory;
use App\StackAnswer;
use App\StackQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AutoStackCategoryController extends Controller
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

    public function add()
    {
        return view('dashboard.auto_stacks.add');
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
            'cat_name' => 'required',
        ]);

        $Cat = AutoStackCategory::create([
            'name' =>  $request->input('cat_name'),
        ]);

        # CUSTOM ALERT
        $msg1 = 'error';
        $msg2 = 'New Category is not Added!';
        if ($Cat) {
            $msg1 = 'message';
            $msg2 = 'New Category Added!';
        }

        return Redirect::route('admin.AutoStackCats')->with($msg1, $msg2);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AutoStackCategory  $autoStackCategory
     * @return \Illuminate\Http\Response
     */
    public function show(AutoStackCategory $autoStackCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AutoStackCategory  $autoStackCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(AutoStackCategory $autoStackCategory)
    {
        return view('dashboard.auto_stacks.edit', compact('autoStackCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AutoStackCategory  $autoStackCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AutoStackCategory $autoStackCategory)
    {
        $updatingCat = AutoStackCategory::where('id', $request->id)->first();
        if ($updatingCat) {
            $updatingCat->update([
                'name' =>  $request->input('cat_name'),
            ]);
        }

        # CUSTOM ALERT
        $msg1 = 'error';
        $msg2 = 'Category Name Is Not Updated!';
        if ($updatingCat) {
            $msg1 = 'message';
            $msg2 = 'Category Name Updated!';
        }

        return Redirect::route('admin.AutoStackCats')->with($msg1, $msg2);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AutoStackCategory  $autoStackCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(AutoStackCategory $autoStackCategory)
    {
        $deleteCat = DB::table('auto_stack_categories')->where('id', $autoStackCategory->id)->delete();
        if ($deleteCat) {
            return back()->with('message', 'Category Deleted!');
        }
        return back()->with('error', 'Category is not sDeleted!');
    }

    public function stackOptions(Request $request, AutoStackCategory $autoStackCategory)
    {
        $questions = StackQuestion::all();
        $answers = StackAnswer::all();
        return view('dashboard.auto_stacks.stack_options.index', compact('autoStackCategory', 'questions', 'answers'));
    }
}
