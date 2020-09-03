<?php

namespace App\Http\Controllers;

use App\Widthdraw;
use Illuminate\Http\Request;

class WidthdrawController extends Controller
{

    public function requestUserWidthdraw(Request $request)
    {
        $method = $request->method;
        $type = $request->type;
        $to = $request->to;
        $amount =  $request->amount;

        return response()->json($method);
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
