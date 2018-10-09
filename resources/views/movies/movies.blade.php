@extends('layout')

@section('content')

    <h1>Movies</h1>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">Title</th>
            <th scope="col">Genre</th>
            <th scope="col">Release</th>
            <th scope="col">Rating</th>
        </tr>
        </thead>

        <tbody>

        @foreach($movies as $movie)
            <tr>
                <th scope="row">1</th>
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