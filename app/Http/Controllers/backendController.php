<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class backendController extends Controller
{
   public function index(){

        return view('dashboard.index');
   }

   public function settings()
   {
       return view('dashboard.settings');

   }
}
