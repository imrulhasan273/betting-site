<?php

namespace App\Http\Controllers;

use App\Club;
use App\Game;
use App\Answer;
use App\Sponsor;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $games = Game::all();
        $questions = Question::all();
        $answers = Answer::all();

        // dd($games);

        return view('home', compact('games', 'questions', 'answers'));
    }

    public function mybet()
    {
        return view('mybet');
    }

    public function support()
    {
        return view('support');
    }

    public function about()
    {
        return view('about');
    }

    public function rules()
    {
        return view('rules');
    }
}
