<?php

namespace App\Http\Controllers;

use App\Bet;
use App\Club;
use App\Game;
use App\Role;
use App\User;
use App\Notice;
use App\Setting;
use App\Question;
use App\AutoStackCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Facade\Ignition\QueryRecorder\Query;
use Intervention\Image\ImageManagerStatic as Image;

class backendController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }


    // this is the index page of Setting Model
    public function settings()
    {
        $settings = Setting::limit(1)->orderBy('id', 'desc')->get();
        return view('dashboard.settings', compact('settings'));
    }

    public function notices()
    {
        $notices = Notice::limit(1)->orderBy('id', 'desc')->get();

        return view('dashboard.notices', compact('notices'));
    }

    public function users()
    {
        $users = User::all();

        return view('dashboard.users', compact('users'));
    }

    public function roles()
    {
        $roles = Role::all();

        return view('dashboard.roles', compact('roles'));
    }

    public function games()
    {
        // dd(Carbon\Carbon::now());
        $games = Game::all();
        return view('dashboard.games', compact('games'));
    }

    public function fgames()
    {
        $games = Game::all();
        return view('dashboard.fgames', compact('games'));
    }

    public function bets()
    {
        $bets = Bet::all();
        return view('dashboard.bets', compact('bets'));
    }

    # For Auto Stack Management
    public function AutoStackCats()
    {
        $AutoStackCats = AutoStackCategory::all();
        return view('dashboard.AutoStackCats', compact('AutoStackCats'));
    }

    public function clubs()
    {
        $users = User::all();
        $clubs = Club::all();
        return view('dashboard.clubs', compact('clubs'));
    }
}
