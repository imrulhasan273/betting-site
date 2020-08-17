<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Notice;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class backendController extends Controller
{
    public function index()
    {
        // return view('dashboard.index');
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
}
