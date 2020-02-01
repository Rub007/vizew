<?php


namespace App\Http\Controllers\admin;


use App\Message;

class ContactController
{
    public function index()
    {
        $messages = Message::all();
        $count = $this->count();
        return view('admin.messages',compact('messages','count'));
    }

    private function count()
    {
       return Message::where('status','new')->count();
    }
    public function makeSeen(Message $message)
    {
        $message->update(['status' => 'seen']);
        return redirect()->back();
    }
    public function makeNew(Message $message)
    {
        $message->update(['status' => 'new']);
        return redirect()->back();
    }

    public function delete(Message $message)
    {
        $message->delete();
        return redirect()->back();
    }
}
