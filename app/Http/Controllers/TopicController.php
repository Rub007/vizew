<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index()
    {
        return view('pages.news-list');
    }

    public function show($id)
    {
        return view('pages.single-post');
    }

    public function videoPost($id)
    {
        return view('pages.video-post');
    }
}
