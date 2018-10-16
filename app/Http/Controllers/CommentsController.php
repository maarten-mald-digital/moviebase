<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Comment;
use App\Movie;

class CommentsController extends Controller
{
    public function store(Movie $movie) {

        $user_id = Auth::id();
        $movie_id = $movie->id;

        // Validation
        $this->validate(request(), [
            'comment' => 'required'
        ]);

        // Creating the post
        $comment = new Comment;

        $comment->comment = request('comment');
        $comment->user_id = $user_id;
        $comment->movie_id = $movie_id;
        $comment->movie_rating = request('movie_rating');

        // save it to the database
        $comment->save();

        // Redicrect after succes
        return redirect()->back();
    }
}
