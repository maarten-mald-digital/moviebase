<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Storage;

use App\Movie;
use App\Actor;
use App\Comment;

use Psy\Util\Json;

class MoviesController extends Controller
{

    public function index(Request $request)
    {
         $movies = Movie::all();
         return view('movies.movies', compact ('movies'));
    }


    public function create()
    {
        $actors = Actor::all();
        return view('movies.create', compact ('actors'));
    }


    public function store(Request $request)
    {
        // Get and store the image local
        $imageUpload = $request->file('imageToUpload')->store('public/images/movies');

        // Validation
        $this->validate(request(), [
            'title' => 'required',
            'body'  => 'required'
        ]);

        // Creating or updating the post
        $createMovie = Movie::updateOrCreate(
            ['id' => $request->id],
            [
                'title' => $request->title,
                'body' => $request->body,
                'genre' => $request->genre,
                'release_date' => $request->release_date,
                'rating' => 5.5,
                'image' => $imageUpload
            ]);

        // Get the id from the selected actors
        $selectedActors = $request->input('selected_actor');

        // Create the movie, take the actors() and sync the selected actors
        // This will be stored in the relation model
        $createMovie->actors()->sync($selectedActors);

        return redirect('/movies');
    }


    public function sort(string $filter, string $ordering)
    {
        $movies = Movie::orderBy($filter, $ordering)->get();
        return $movies;
    }


    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
