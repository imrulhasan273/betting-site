<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('Profile_Frontend.wallet_partials.profile', compact('user'));
    }
    public function deposit()
    {
    }
    public function widthdraw()
    {
    }
    public function bTransfer()
    {
    }
    public function changeClub()
    {
    }
    public function changePassword()
    {
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
