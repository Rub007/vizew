<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function sendMessage(Request $request)
    {
        $request->validate(['name' => 'required', 'email'=>'required|email', 'message' =>'required']);
        $message  = new Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->message = $request->message;
        $message->status = 'new';
        $message->save();
        return redirect()->back();
    }
}
