<?php

namespace App\Http\Controllers;

use App\User;
use App\Widthdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        }

        if ($InsertWidthdraw) {
            $data = 'insert';
        } else {
            $data = 'failed';
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
