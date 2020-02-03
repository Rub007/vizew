<?php

namespace App\Http\Controllers;

use App\Comment;
use App\News;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request,News $news){
        $request->validate(['name' => 'required|max:255', 'email' => 'email|required', 'message'=>'required']);
        $comment = new Comment();
        $comment->news_id = $news['id'];
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->message = $request->message;
        $comment->save();
        return redirect()->back();
    }
}
