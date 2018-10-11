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
        /** @var Movie $movies */
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
        $imageUpload = $request->file('imageToUpload')->store('public/images');

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

        /* Old way
        $movie = new Movie;

        $movie->title   = request('title');
        $movie->body    = request('body');
        $movie->genre   = request('genre');
        $movie->release_date = request('release_date');
        $movie->rating  = 5.5;
        $movie->image = $imageUpload;

        // save it to the database
        $movie->save();
        */

        // Redirect after succes
        //return redirect('/movies');
    }

    public function sort(string $filter, string $ordering)
    {
        $movies = Movie::orderBy($filter, $ordering)->get();
        return $movies;
    }


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
