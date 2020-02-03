<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'updated_at', 'color'];

    public function news()
    {
        return $this->hasMany('App\News');
    }

    public function limitNews()
    {
        return $this->news()->limit(2);
    }

    public function scopeVideos($query)
    {
        return $query->where('type', 'video');
    }

}
