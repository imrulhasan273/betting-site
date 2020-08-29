<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function edit()
    {
        $superAdmin = User::whereHas(
            'role',
            function ($q) {
                $q->where('name', 'super_admin');
            }
        )->get();
        $superAdmin = $superAdmin[0];

        return view('dashboard\index\acc', compact('superAdmin'));
    }
}
