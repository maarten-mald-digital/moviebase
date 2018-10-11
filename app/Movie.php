<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public $fillable = [
        'id',
        'title',
        'body',
        'genre',
        'image',
        'release_date',
        'rating'
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

    // Example to change the title value
//    public function getTitleAttribute($title)
//    {
//        return ucfirst($title);
//    }


}
