@extends('layouts.app')

@section('content')

    <h1 class="float-left">Movies</h1>
    <a class="btn btn-primary float-right" href="/movies/create" role="button">Add movie</a>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">Title</th>
            <th scope="col">Genre</th>
            <th scope="col">Release date</th>
            <th scope="col">Rating</th>
        </tr>
        </thead>

        <tbody>
        <?php $count = 1; ?>

        @foreach($movies as $movie)
            <tr>
                <th scope="row"><?php echo $count++; ?></th>
                <td><img src="{{ asset('img/spiderman.jpeg') }}" style="width: 30%" /></td>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->genre }}</td>
                <td>{{ $movie->release_date }}</td>
                <td>{{ $movie->rating }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection