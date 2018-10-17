<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'id',
        'title',
        'body',
        'genre',
        'release_date',
        'rating',
        'image'
    ];

    // Return the full image url and remove /public from url
    public function getImageAttribute($image)
    {
        return str_replace('public/', '', env('APP_URL').'/'.$image);
    }

    // Returns the date in another format
    public function getReleaseDateAttribute($release_date)
    {
        $date = new \DateTime($release_date);
        return $date->format('F jS, Y');
    }

    // Comment section
    public function comments()
    {
        return $this->hasMany(Comment::class, 'movie_id');
    }


    // Trying stuff
    public function actors(){
        return $this->belongsToMany('App\Actor');
    }

}
