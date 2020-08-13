<?php

namespace App\Http\Controllers;

use App\Notice;
use Illuminate\Http\Request;

class noticeController extends Controller
{
    public function index()
    {
        $notices = Notice::limit(1)->orderBy('id', 'desc')->get();

        return view('dashboard.notice', compact('notices'));
    }

    public function noticeStore(Request $request)
    {
        $notices = new Notice();
        $notices->notice_slide = $request->notice_slide;
        $notices->notice_pop = $request->notice_slide;
        $notices->save();
        session()->flash('message', ' New Notice Added !!');

        return back();

    }

    public function noticeUpdate(Request $request, $id)
    {

        $notices = Notice::find($id);
        $notices->notice_slide = $request->notice_slide;
        $notices->notice_pop = $request->notice_pop;
        $notices->save();
        session()->flash('message', ' Notice Updated !!');
        return back();

    }
}
