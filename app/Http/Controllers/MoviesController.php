<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movie;

class MoviesController extends Controller
{

    public function index()
    {
        $movies = Movie::all();

        return view('movies.movies', compact ('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validation
        $this->validate(request(), [
            'title' => 'required',
            'body'  => 'required'
        ]);

        // Creating the post
        $movie = new Movie;

        $movie->title   = request('title');
        $movie->body    = request('body');
        $movie->genre   = request('genre');
        $movie->release_date = request('release_date');
        $movie->rating  = 5.5;

        // save it to the database
        $movie->save();

        // Redirect after succes
        return redirect('/movies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
