<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class settingsController extends Controller
{


    public function index()
    {
        $settings = Setting::limit(1)->orderBy('id', 'desc')->get();
        return view('dashboard.settings', compact('settings'));
    }

    public function settingStore(Request $request)
    {
        // dd($request);

        $settings = new Setting();

        if (($request->image) > 0) {

            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/setting/' . $img);
            Image::make($image)->save($location);
            $settings->image = $img;
        }
        $settings->footer = $request->footer;
        $settings->warning = $request->warning;
        $settings->save();
        return back();
    }

    public function settingUpdate(Request $request, $id)
    {

        $settings = Setting::find($id);

        if (($request->image) > 0) {
            if (File::exists('images/setting/' . $settings->image)) {
                File::delete('images/setting/' . $settings->image);
            }

            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/setting/' . $img);
            Image::make($image)->save($location);
            $settings->image = $img;
        }
        $settings->footer = $request->footer;
        $settings->warning = $request->warning;
        $settings->save();
        // session()->flash('success', ' Settings Updated !!');
        return back();
    }
}
