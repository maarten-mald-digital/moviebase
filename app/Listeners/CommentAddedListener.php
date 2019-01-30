<?php

namespace App\Listeners;

use App\Events\CommentAdded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Movie;
use App\Comment;

class CommentAddedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CommentAdded  $event
     * @return void
     */
    public function handle(CommentAdded $movie)
    {
      $ratings = Comment::where('movie_id', $movie->movie_id)->pluck('movie_rating')->toArray();
      $ratingAverageDirty = array_sum($ratings) / count($ratings);
      $ratingAverage = number_format($ratingAverageDirty, 2, '.', ',');

      $movie = Movie::where('id', $movie->movie_id)->update(array('rating' => $ratingAverage));

      // dd($ratings);
    }
}
