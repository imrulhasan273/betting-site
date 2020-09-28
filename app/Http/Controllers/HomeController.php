<?php

namespace App\Http\Controllers;

use App\Club;
use App\Game;
use App\Answer;
use App\PaymentOption;
use App\Sponsor;
use App\Question;
use App\Rule;
use App\Faq;
use App\About;
Use App\User;
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
        # FOR PAYMENT OPTIONS
        // $paymentsOptions = PaymentOption::all();

        return view('home', compact('games', 'questions', 'answers'));
    }

    public function mybet()
    {
       $auth_user_id = Auth::user()->id ?? null;
       $user = User::where('id', $auth_user_id)->first();
       $userROLE = $user->role[0]->name ?? null;


        if($userROLE == 'user'){

            return view('Profile_Frontend.statements');
        }
        else{

           return back();
        }

    }

    public function support()
    {
        return view('support');
    }

    public function about()
    {
        $about_us = About::orderBy('id', 'desc')->first();
        return view('about',compact('about_us'));
    }

    public function rules()
    {
        $rules = Rule::orderBy('id', 'desc')->first();
        return view('rules',compact('rules'));
    }
    public function faq()
    {
        $faqs = Faq::orderBy('id', 'desc')->first();
        return view('faq',compact('faqs'));
    }
}
