<?php

namespace App\Http\Controllers;

use App\Club;
use App\Sponsor;
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
        // dd(Auth::id());
        $clubs = Club::all();
        $sponsors = Sponsor::all();

        return view('home', compact('clubs', 'sponsors'));
    }

    public function mybet()
    {
        return view('mybet');
    }

    // public function oneten()
    // {
    //     return view('oneten');
    // }

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
