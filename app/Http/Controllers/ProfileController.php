<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function statements()
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
