@extends('layouts.app')

@section('content')


    <h1 class="float-left">Movies</h1>
    <a class="btn btn-primary float-right" href="/movies/create" role="button">Add movie</a>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col"></th>

            <th scope="col" class="filter" data-filter="title" onclick="makeAjax(event)">Title</th>
            <th scope="col" class="filter" data-filter="genre" onclick="makeAjax(event)">Genre</th>
            <th scope="col" class="filter" data-filter="release_date" onclick="makeAjax(event)">Release date</th>
            <th scope="col" class="filter" data-filter="rating" onclick="makeAjax(event)">Rating</th>
        </tr>
        </thead>

        <tbody id="movie-results">

            @foreach($movies as $movie)
                <tr>
                    <td><img src="{{ asset('img/spiderman.jpeg') }}" /></td>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->genre }}</td>
                    <td>{{ $movie->release_date }}</td>
                    <td>{{ $movie->rating }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

@endsection