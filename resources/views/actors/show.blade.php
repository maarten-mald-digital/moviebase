@extends('layouts.app')

@section('content')

    <div class="subnav clearfix mb-4">
        <a class="btn btn-primary float-left" href="{{ route('actors.index') }}" role="button">< Return</a>
        <a class="btn btn-primary float-right" href="#" role="button">Edit</a>
    </div>

    <div class="content">

        <div class="row actor">

                <div class="col">
                    <div class="actor-content">
                        <h1 class="centered">{{ $actor->name }}</h1>
                        <p>{{ $actor->biography }}</p>
                    </div>
                </div>

                <div class="col-4">
                    <div class="actor-sidebar">
                        <div class="sidebar-image" style="background:url('{{ $actor->image }}')"></div>
                        <img src="{{ $actor->image }}" class="img-fluid" alt="Responsive image">
                        <div class="sidebar-inner">
                            <p>Born in: {{ $actor->birth_place }}</p>
                            <p>Age: {{ $actor->birth_date }}</p>
                        </div>
                    </div>
                </div>
        </div>

        <div class="row played-in">
            <div class="col">
                <hr>
                <h2 class="pb-1">Played in</h2>
            </div>

        </div>
        <div class="row movie-actors">
            @foreach ($actor->movies as $movie)
                <div class="col-3">
                    <div class="actor-image" style="background-image:url('{{ $movie->image }}')"></div>
                    <h5 class="text-center p-2">{{ $movie->title }}</h5>
                </div>
            @endforeach
        </div>


        </div>

    </div>

@endsection