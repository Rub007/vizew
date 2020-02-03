<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(News $news)
    {
        $singleVideo = $news->firstVideo();
        $trendingVideos = $news->videosWithCount(3);
        $featuredVideos = $news->videosWithCount(2);
        $popularCategories = $news->mostPopularCategories();
        $randomNews = $news->randomNews();
        $latestVideos = $news->latestVideos();
        foreach ($popularCategories as $category){
            $category->load(['news' => function($query){
                $query->limit(2)->videos()->inRandomOrder();
            }]);
        }
        return view('pages.index',compact('singleVideo','trendingVideos','featuredVideos','popularCategories','randomNews','latestVideos'));
    }
    public function singlePost(News $news)
    {
        $categoryId = $news['category_id'];
        if ($news->sameCategoryVideos($categoryId,$news)){
            $relatedVideos = $news->sameCategoryVideos($categoryId,$news);
        }
        $topic = $news->load('category','comments');
        return view('pages.single-post',compact('topic','relatedVideos'));
    }
}
