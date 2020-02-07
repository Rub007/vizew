<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
        if (!$request->search){
            return redirect()->back();
        }
        $request->validate(['search' =>'required']);
        $topics = News::where('name', 'like', '%'.$request->search.'%')->with('category')->paginate(5);
        return view('pages.search',compact('topics'));
    }
}
