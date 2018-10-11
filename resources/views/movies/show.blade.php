@extends('layouts.app')

@section('content')

    <div class="subnav clearfix mb-4">
        <a class="btn btn-primary float-left" href="/movies" role="button">< Return</a>
        <a class="btn btn-primary float-right" href="/movies/create" role="button">Edit</a>
    </div>

    <div class="content">
        <h1 class="centered">{{ $movie->title }}</h1>
        
    </div>



@endsection