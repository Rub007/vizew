<?php


namespace App\Http\ViewComposers;

use App\Message;
use Illuminate\View\View;
use App\Http\Controllers\admin\ContactController;

class CountComposer
{
    public function __construct(Message $messages)
    {
        $this->messages = Message::where('status','new')->count();
    }

    public function compose(View $view)
    {
        $view->with('count', $this->messages);
    }

}
