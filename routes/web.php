<?php

use App\Events\CommentAdded;

Route::get('/', function () {
    return view('index');
});

// Movies
Route::resource('movies', 'MoviesController');
Route::get('/movies/sort/{filter}/{ordering}', 'MoviesController@sort');

// Actors
Route::resource('actors', 'ActorsController');
Route::get('/actors/sort/{filter}/{ordering}', 'ActorsController@sort');

// Comments
Route::post('/movies/{movie}/comments', 'CommentsController@store');

// Auth
Auth::routes();
Route::get('/profile', 'ProfileController@index');
