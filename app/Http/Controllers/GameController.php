<?php

namespace App\Http\Controllers;

use App\Game;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $c = explode(' vs ', $game->name);

        $c1 = $c[0];
        $c2 = $c[1];

        $types = Type::all();
        return view('dashboard.games.edit', compact('game', 'types', 'c1', 'c2'));
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
        // $request->validate([
        //     'type_id' => 'required',
        //     'c1' => 'required',
        //     'c2' => 'required',
        //     'status' => 'required',
        //     'tournament_name' => 'required',
        //     'date' => 'required',
        //     'time' => 'required'
        // ]);

        $name = $request->c1 . ' vs ' . $request->c2;
        $updatingUser = Game::where('id', $request->id)->first();
        if ($updatingUser) {
            $updatingUser->update([
                'type_id' =>  $request->input('type_id'),
                'date' => $request->input('date'),
                'time' => $request->input('time'),
                'name' => $name,
                'tournament_name' => $request->input('tournament_name'),
                'status' => $request->input('status'),
            ]);
            return Redirect::route('admin.games')->with('message', 'Game info Updated!');
        }

        return Redirect::route('admin.games')->with('error', 'Game info not Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $deleteGame = DB::table('games')->where('id', $game->id)->delete();
        if ($deleteGame) {
            return back()->with('message', 'Game Deleted!');
        }

        return back()->with('error', 'Game is not sDeleted!');
    }


    # When Admin CLick on Betoptions in Game list
    public function betOptons(Request $request, Game $game)
    {
        // dd($game);
        return view('dashboard.games.betting_options.index', compact('game'));
    }
}
