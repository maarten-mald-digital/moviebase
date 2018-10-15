<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    public $fillable = [
        'id',
        'name',
        'biography',
        'birth_date',
        'birth_place',
        'image'
    ];

    // Return the full image url and remove /public from url
    public function getImageAttribute($image)
    {
        return str_replace('public/', '', env('APP_URL').'/'.$image);
    }

    // Returns age of the actor
    public function getBirthDateAttribute($birth_date)
    {
        $age = date_diff(date_create($birth_date), date_create('now'))->y;
        return $age;
    }
}
