<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class backendController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function settings()
    {
        return view('dashboard.settings');
    }

    public function settingStore(Request $request)
    {
        $settings = new Setting();

        if ($request->hasFile('image')) {

            $settings->footer = $request->footer;
            $settings->save();

            // session()->flash('success', 'New Settings Added !!');

            return back();
        }
    }
}
