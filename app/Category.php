<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'updated_at', 'color'];

    public function news()
    {
        return $this->belongsToMany('App\News', 'category_news')->withTimestamps();
    }
    public function limitNews()
    {
        return $this->news()->limit(2);
    }
    public function scopeVideos($query)
    {
        return $query->where('type', 'video');
    }

//    public function sameCategoryVideos($categoryId,$news)
//    {
//        return $this->with('category')->videos()->where('category_id',$categoryId)->where('id','!=',$news['id'])->inRandomOrder()->limit(2)->get();
//    }

}
