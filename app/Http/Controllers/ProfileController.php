<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('Profile_Frontend.wallet_partials.profile');
    }
    public function deposit()
    {
        return view('Profile_Frontend.wallet_partials.deposit');
    }
    public function widthdraw()
    {
        return view('Profile_Frontend.wallet_partials.widthdraw');
    }
    public function bTransfer()
    {
        return view('Profile_Frontend.wallet_partials.balance_transfer');
    }
    public function changeClub()
    {
        return view('Profile_Frontend.wallet_partials.change_club');
    }
    public function changePassword()
    {
        return view('Profile_Frontend.wallet_partials.change_password');
    }
    public function statement()
    {
        return view('Profile_Frontend.statements');
    }

    public function sponsor()
    {
        return view('Profile_Frontend.sponsor');
    }

    public function oneten()
    {
        return view('Profile_Frontend.oneten');
    }
}
