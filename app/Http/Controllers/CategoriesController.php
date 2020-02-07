<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(Category $category){
//        $news = News::with('category')->where('id',$category['id'])->paginate(5);
        $topics = $category->news()->paginate(5);
        return view('pages.news-list',compact('topics'));
    }
}
