<?php

namespace App\Http\Controllers;

use App\Game;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GameController extends Controller
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
        $types = Type::all();
        return view('dashboard.games.add', compact('types'));
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
            'type_id' => 'required',
            'c1' => 'required',
            'c2' => 'required',
            'status' => 'required',
            'tournament_name' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        $name = $request->c1 . ' vs ' . $request->c2;

        $user = Game::create([
            'type_id' =>  $request->input('type_id'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'name' => $name,
            'tournament_name' => $request->input('tournament_name'),
            'game_update' => '',
            'status' => $request->input('status'),
        ]);


        return Redirect::route('admin.games')->with('message', 'Game Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }
}
