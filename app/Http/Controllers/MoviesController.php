<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Storage;

use App\Movie;
use App\Actor;

use Psy\Util\Json;

class MoviesController extends Controller
{

    public function index(Request $request)
    {
//        $movies = Movie::with('actors')->get();
//        return view('movies.movies', compact ('movies'));

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

        // Get selected actors from form
        // Put the post in db
        // save the relation to db

        // Try this to see the result array
        $selectedActors = $request->input('selected_actor');
        //        dd($selectedActors);


        // Creating or updating the post
        Movie::updateOrCreate(
            ['id' => $request->id],
            [
                'title' => $request->title,
                'body' => $request->body,
                'genre' => $request->genre,
                'release_date' => $request->release_date,
                'rating' => 5.5,
                'image' => $imageUpload,

            ]);

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
