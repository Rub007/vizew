<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['name','description','src','category_id','updated_at','type'];

    public function category()
    {
        return $this->belongsToMany('App\Category', 'category_news')->withTimestamps();
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
    public function previous($news){
        return $this->with('category')->where('id', '<', $news['id'])->videos()->first();
    }
    public function next($news){
        return $this->with('category')->where('id', '>', $news['id'])->videos()->first();
    }
}
