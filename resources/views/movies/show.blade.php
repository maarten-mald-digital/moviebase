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
                        <p>Rating: {{ $movie->release }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row played-in">
            <div class="col">
                <hr>
                <h2 class="pb-1">Actors</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <img src="{{ $movie->image }}" class="img-fluid" alt="Responsive image">
                <h5 class="text-center p-2">Actor name</h5>
            </div>

            <div class="col-3">
                <img src="{{ $movie->image }}" class="img-fluid" alt="Responsive image">
                <h5 class="text-center p-2">Actor name</h5>
            </div>
        </div>


        <div class="row played-in">
            <div class="col">
                <hr>
                <h2 class="pb-1">Comments</h2>
            </div>
        </div>

        @foreach ($movie->comments as $comment)
            <!-- Start comment -->
                <div class="row comments {{ Auth::check() && $comment->poster->id == Auth::user()->id ? "justify-content-end" : "" }}">
                    <div class="col-md-1">
                        <div class="thumbnail">
                            <img class="img-fluid user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>{{ $comment->poster->name }}</strong> <span class="text-muted">commented {{ $comment->created_at }}</span>
                            </div>
                            <div class="panel-body">
                                {{ $comment->body }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End comment -->
            @endforeach

            @if(Auth::check())
                <form method="POST" action="/movies/{{ $movie->id }}}/comments">

                    <!-- Generates a unique hidden token, for security reasons  -->
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea id="comment" name="comment" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <!-- validation message -->
                @include ('layouts.errors')
            @else
                <p>Login to comment <a href="{{ route('login') }}">Login</a>
                <p>No account? click <a href="{{ route('register') }}">here</a> to register</p>
            @endif
    </div>

@endsection