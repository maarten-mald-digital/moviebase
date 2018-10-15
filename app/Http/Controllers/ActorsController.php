<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
        return view('actors.create');
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
        Actor::updateOrCreate(
            ['id' => $request->id],
            [
                'name' => $request->name,
                'biography' => $request->biography,
                'birth_date' => $request->birth_date,
                'birth_place' => $request->birth_place,
                'image' => $imageUpload
            ]);

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
