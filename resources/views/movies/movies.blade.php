@extends('layouts.app')

@section('content')


    <h1 class="float-left">Movies</h1>
    <a class="btn btn-primary float-right" href="{{ route('movies.create') }}" role="button">Add movie</a>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col"></th>

            <th scope="col" class="filter" data-table="movies" data-filter="title" onclick="makeAjax(event)">Title <i class="fas fa-sort-up"></i></th>
            <th scope="col" class="filter" data-table="movies" data-filter="genre" onclick="makeAjax(event)">Genre <i class="fas fa-sort-up"></i></th>
            <th scope="col" class="filter" data-table="movies" data-filter="release_date" onclick="makeAjax(event)">Release date <i class="fas fa-sort-up"></i></th>
            <th scope="col" class="filter" data-table="movies" data-filter="rating" onclick="makeAjax(event)">Rating <i class="fas fa-sort-up"></i></th>
        </tr>
        </thead>

        <tbody id="movies-results">

            @foreach($movies as $movie)
                <tr onclick="document.location = '/movies/{{ $movie->id }}';">
                    <td><img src="{{ $movie->image }}" /></td>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->genre }}</td>
                    <td>{{ $movie->release_date }}</td>
                    <td>{{ $movie->rating }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

@endsection