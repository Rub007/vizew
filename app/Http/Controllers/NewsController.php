<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $topics = News::with('category')->latest()->paginate(5);
        return view('pages.news-list',compact('topics'));
    }

}
