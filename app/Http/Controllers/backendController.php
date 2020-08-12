<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class backendController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }


}
