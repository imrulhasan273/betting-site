<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return view('dashboard.message');
    }

    public function send(Request $request)
    {
        $sms = new Message();
        $sms->user_no = $request->user_no;
        $sms->user_message = $request->user_message;

        $number = $request->user_no;
        $msg = $request->user_message;

        $to = $number;
        $token = "2c153c492d6bc6af22e522efcc64e66d";
        $message = $msg;

        $url = "http://api.greenweb.com.bd/api.php";


        $data = array(
            'to' => "$to",
            'message' => "$message",
            'token' => "$token",
        ); // Add parameters in key value
        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);

        if ($smsresult) {
            $sms->save();
            session()->flash('message', ' New Message Has Sent !!');
            return back();
        } else {
           session()->flash('message', ' New Message Sending failed !!');
            return back();

        }

    }public function view()
    {
        $messages = Message::orderBy('id', 'desc')->get();
        return view('dashboard.message_view',compact('messages'));

    }




}
