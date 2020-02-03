<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['name','description','src','category_id','updated_at','type'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    public function scopeVideos($query)
    {
        return $query->where('type','video');
    }

    public function firstVideo()
    {
        return $this->with('category')->videos()->latest()->first();
    }

    public function videosWithCount($count)
    {
        return $this->with('category')->videos()->inRandomOrder()->limit($count)->get();
    }
    public function sameCategoryVideos($categoryId,$news)
    {
        return $this->with('category')->videos()->where('category_id',$categoryId)->where('id','!=',$news['id'])->inRandomOrder()->limit(2)->get();
    }
    public function randomNews()
    {
        return $this->with('category')->inRandomOrder()->limit(4)->get();
    }
    public function latestVideos()
    {
        return $this->with('category')->videos()->latest()->limit(3)->get();
    }
    public function mostPopularCategories()
    {
        return Category::withCount('news')
            ->orderBy('news_count','desc')
            ->limit(2)
            ->get();
    }
    public function previousPost($news){
        return $this->with('category')->latest()->limit(3)->get();
    }
}
