<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class settingsController extends Controller
{
    public function settingStore(Request $request)
    {
        $settings = new Setting();

        if (($request->image) > 0) {
            $logo="logo";
            $image = $request->file('image');
            $img = $logo . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/setting/' . $img);
            Image::make($image)->save($location);
            $settings->image = $img;
        }
        $settings->footer = $request->footer;
        $settings->warning = $request->warning;
        $settings->save();
        session()->flash('message', ' New Settings added !!');
        return back();
    }

    public function settingUpdate(Request $request, $id)
    {

        $settings = Setting::find($id);

        if (($request->image) > 0) {
            if (File::exists('images/setting/' . $settings->image)) {
                File::delete('images/setting/' . $settings->image);
            }
            $logo = "logo";
            $image = $request->file('image');
            $img = $logo . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/setting/' . $img);
            Image::make($image)->save($location);
            $settings->image = $img;
        }
        $settings->footer = $request->footer;
        $settings->warning = $request->warning;
        $settings->save();
        session()->flash('message', ' Settings Updated !!');
        return back();
    }
}
