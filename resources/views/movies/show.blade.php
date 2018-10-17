@extends('layouts.app')

@section('content')

    <div class="subnav clearfix mb-4">
        <a class="btn btn-primary float-left" href="{{ route('movies.index') }}" role="button">< Return</a>
        <a class="btn btn-primary float-right" href="#" role="button">Edit</a>
    </div>

    <div class="content">

        <div class="row movie">

            <div class="col">
                <div class="movie-content">
                    <h1 class="centered">{{ $movie->title }}</h1>
                    <p>{{ $movie->body }}</p>
                </div>
            </div>

            <div class="col-4">
                <div class="movie-sidebar">
                    <img src="{{ $movie->image }}" class="img-fluid" alt="Responsive image">
                    <div class="sidebar-inner">
                        <p>Genre: {{ $movie->genre }}</p>
                        <p>Rating: {{ $movie->rating }}</p>
                        <p>Release date: {{ $movie->release_date }}</p>

                        <p>Rating: {{ $movie->dynamic_rating }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <hr>
                <h2 class="pb-1">Actors</h2>
            </div>
        </div>

        <div class="row movie-actors">
            @foreach ($movie->actors as $actor)
                <div class="col-3">
                    <div class="actor-image" style="background-image:url('{{ $actor->image }}')"></div>
                    <h5 class="text-center p-2">{{ $actor->name }}</h5>
                </div>
            @endforeach
        </div>

        <div class="row played-in">
            <div class="col">
                <hr>
                <h2 class="pb-1">Comments</h2>
            </div>
        </div>

        <div class="comments">
            @include('movies.comments.comments')
            @include('movies.comments.comment-form')
        </div>

    </div><!-- End content -->

@endsection