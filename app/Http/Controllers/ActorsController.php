<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Movie;
use App\Actor;

class ActorsController extends Controller
{
    public function index(Request $request)
    {
        $actors = Actor::all();
        return view('actors.actors', compact ('actors'));
    }


    public function create()
    {
        $movies = Movie::all();
        return view('actors.create', compact ('movies'));
    }


    public function store(Request $request)
    {
        // Get and store the image local
        $imageUpload = $request->file('imageToUpload')->store('public/images/actors');

        // Validation
        $this->validate(request(), [
            'name' => 'required',
            'biography'  => 'required'
        ]);

        // Creating or updating the post
        $createActor = Actor::updateOrCreate(
            ['id' => $request->id],
            [
                'name' => $request->name,
                'biography' => $request->biography,
                'birth_date' => $request->birth_date,
                'birth_place' => $request->birth_place,
                'image' => $imageUpload
            ]);

        // Get the id from the selected movies
        $selectedMovies = $request->input('selected_movie');

        // Create the actor, take the movies() and sync the selected movies
        // This will be stored in the relation model
        $createActor->movies()->sync($selectedMovies);

        return redirect('/actors');
    }


    public function sort(string $filter, string $ordering)
    {
        $actors = Actor::orderBy($filter, $ordering)->get();
        return $actors;
    }


    public function show(Actor $actor)
    {
        return view('actors.show', compact('actor'));
    }
}
