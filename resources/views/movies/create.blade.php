@extends('layouts.app')

@section('content')

    <h1>Add a movie</h1>

    <form method="POST" action="/movies/store">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="title">Movie title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Spiderman">
        </div>

        <div class="form-group">
            <label for="genre">Select a genre</label>
            <select class="form-control" id="genre" name="genre">
                <option>Action</option>
                <option>Comedy</option>
                <option>Horror</option>
                <option>Thriller</option>
            </select>
        </div>

        <div class="form-group">
            <label for="release_date">Release date</label>
            <input type="text" class="form-control" id="release_date" name="release_date" placeholder="yyyy-mm-dd">
        </div>

        <div class="form-group">
            <label for="body">Description</label>
            <textarea class="form-control" id="body" name="body" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create movie</button>
    </form>

    @include('layouts.errors')

@endsection