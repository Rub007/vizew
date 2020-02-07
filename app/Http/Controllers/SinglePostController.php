<?php

namespace App\Http\Controllers;

use App\News;

class SinglePostController extends Controller
{
    public function index(News $news)
    {
        if ($category = $news->category()->first()){
            $relateds = $category->news()->videos()->limit(2)->get();
        }
        $topic = $news->load('category','comments');
        $next = $news->next($news);
        $previous = $news->previous($news);
        return view('pages.single-post',compact('topic','relateds','category','next','previous'));
    }
}
