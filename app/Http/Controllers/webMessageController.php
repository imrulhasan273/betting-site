<?php

namespace App\Http\Controllers;

use App\webMessage;
use App\WebMessageAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class webMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUser()
    {
        return view('Profile_Frontend.wallet_partials.messages.send_message');
    }

    public function viewUser()
    {
        //////////////////////query should be here
        $messages = WebMessageAdmin::all();
        return view('Profile_Frontend.wallet_partials.messages.receivedwebmessage', compact('messages'));
    }





    public function Admingetuser($user_id)
    {
        // $user = webMessage::find($user_id);
        $user = DB::table('web_messages')->where('user_id', $user_id)->orderBy('id', 'desc')->first();
        return view('dashboard.web_messages.webmessagesend', compact('user'));
    }



    # Admin Reply to User
    public function AdminSendMessage(Request $request)
    {
        // dd($request);
        $admin_message = new WebMessageAdmin();
        $admin_message->user_id = $request->user_id;
         $admin_message->user_name = $request->user_name;
        $admin_message->admin_message_subject = $request->admin_message_subject;
        $admin_message->admin_sent_message = $request->admin_sent_message;
        $admin_message->save();
        session()->flash('message', 'Replay has been sent !!');
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendUser(Request $request)
    {

        $validatedData = $request->validate([
            'user_message_subject' => 'required',
            'user_sent_message' => 'required',
        ]);


        $user_messages = new webMessage();
        $user_messages->user_id = $request->user_id;
        $user_messages->user_name = $request->user_name;
        $user_messages->user_message_subject = $request->user_message_subject;
        $user_messages->user_sent_message = $request->user_sent_message;
        $user_messages->save();

        // session()->flash('message', ' Message has been sent !!');
        return back()->with('message', 'Message has been sent !!');
    }

    public function AdminIndex()
    {
        $webmessages = webMessage::orderBy('id', 'desc')->get();
        return view('dashboard.web_messages.webmessage', compact('webmessages'));
    }


    public function AdminviewSent()
    {
        $sent_messages_admin = WebMessageAdmin::orderBy('id', 'asc')->get();
        return view('dashboard.web_messages.sentwebmessageview', compact('sent_messages_admin'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
