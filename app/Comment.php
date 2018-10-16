<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'movie_id',
        'movie_rating',
        'comment'
    ];

    public function movie(){
        return $this->belongsTo(Movie::class);
    }


//    public function user(){
    public function poster(){
        return $this->belongsTo(User::class, 'user_id');
    }



//    public function exercise()
//    {
//        return $this->belongsTo('App\Exercise');
//    }
//    public function poster()
//    {
//        return $this->belongsTo('App\User', 'user_id');
//    }
}
