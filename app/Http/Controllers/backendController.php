<?php

namespace App\Http\Controllers;

use App\Bet;
use App\Club;
use App\Game;
use App\Role;
use App\User;
use App\Notice;
use App\Deposit;
use App\Session;
use App\Setting;
use App\Question;
use App\Widthdraw;
use App\PaymentOption;
use App\AutoStackCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Facade\Ignition\QueryRecorder\Query;
use Intervention\Image\ImageManagerStatic as Image;

class backendController extends Controller
{
    public function index()
    {
        // # TOTAL USERS
        // $user = User::whereHas(
        //     'role',
        //     function ($q) {
        //         $q->where('name', 'user');
        //     }
        // )->get();

        # SUPER ADMIN FOR ACC BALANCE
        $superAdmin = User::whereHas(
            'role',
            function ($q) {
                $q->where('name', 'super_admin');
            }
        )->get();
        $superAdmin = $superAdmin[0];


        # TOTAL ADMINS (normal users)
        $CountAdmins = User::whereHas(
            'role',
            function ($q) {
                $q->where('name', 'admin');
            }
        )->count();

        # TOTAL USERS (normal users)
        $CountUsers = User::whereHas(
            'role',
            function ($q) {
                $q->where('name', 'user');
            }
        )->count();


        # TOTAL CLUBS
        $CountClubs = User::whereHas(
            'role',
            function ($q) {
                $q->where('name', 'club_admin');
            }
        )->count();

        # - - -- - - - - - - -- - - - - - - HERE IS THE USER STATE - -  -- -- - - - - - -- - -

        $dash_users = User::limit(5)->orderBy('id', 'desc')->get();

        # SPONSORS COMMMISSION FEE
        $commission = DB::table('sponsor_commission')->first();
        $commission = $commission->commission ?? null;


        #__________________________________CLUB DASHBOARD INFO_________________________________
        // $TotalCredits = DB::table('club_transection')->where('club_owner_id', Auth::user()->id)->sum('credit');
        // dd($TotalCredits);

        // $user = User::where('id', Auth::user()->id)->get();
        // $clubID = $user[0]->clubOwner[0]->id;
        // dd($clubID);

        #______________________________________________________________________________________

        return view('dashboard.index', compact('commission', 'dash_users', 'superAdmin', 'CountAdmins', 'CountUsers', 'CountClubs'));
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

    public function paymentOption()
    {
        $paymentOptions = PaymentOption::all();
        return view('dashboard.paymentOptions', compact('paymentOptions'));
    }

    public function SITE_ACC()
    {
        return view('dashboard.siteAccount');
    }

    public function UserDeposit()
    {
        $deposits = Deposit::all();
        return view('dashboard.deposits', compact('deposits'));
    }

    public function UserWidthdraw()
    {
        $widthdraws = Widthdraw::where('user_role', 'user')->get();
        return view('dashboard.Uwidthdraws', compact('widthdraws'));
    }


    # __________________ START SESSION FUNCTION ____________________________
    public function session(Request $request)
    {
        $sessions = Session::all();
        return view('dashboard.sessions', compact('sessions'));
    }
    # __________________ END SESSION FUNCTION ____________________________

}
