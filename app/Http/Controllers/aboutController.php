<?php

namespace App\Http\Controllers;
use App\About;
use Illuminate\Http\Request;

class aboutController extends Controller
{
    public function index()
    {
        $abouts = About::limit(1)->orderBy('id', 'desc')->get();
        return view('dashboard.about.about_us', compact('abouts'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'about_description' => 'required',

        ],
            [
                'about_description.required' => 'Blank field is not allowed',

            ]);

        $abouts = new About();
        $abouts->about_description = $request->about_description;
        $abouts->save();
        return back()->with('message', 'About us Added !!');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'about_description' => 'required',

        ],
            [
                'about_description.required' => 'Blank field is not allowed',

            ]);

        $abouts = About::find($id);
        $abouts->about_description = $request->about_description;
        $abouts->save();
        return back()->with('message', 'About us Updated !!');

    }
}
