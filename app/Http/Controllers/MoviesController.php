<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Storage;

use App\Movie;

use Psy\Util\Json;

class MoviesController extends Controller
{

    public function index(Request $request)
    {

//        $actors = Movie::find(1);
//        return $actors->actors;

         $movies = Movie::all();
         return view('movies.movies', compact ('movies'));
    }


    public function create()
    {
        return view('movies.create');
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
        Movie::updateOrCreate(
            ['id' => $request->id],
            [
                'title' => $request->title,
                'body' => $request->body,
                'genre' => $request->genre,
                'release_date' => $request->release_date,
                'rating' => 5.5,
                'image' => $imageUpload
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
//        $actors = Movie::find(1);
//        return $actors->actors;

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
