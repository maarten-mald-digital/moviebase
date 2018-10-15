@extends('layouts.app')

@section('content')

    <div class="subnav clearfix mb-4">
        <a class="btn btn-primary float-left" href="{{ route('actors.index') }}" role="button">< Return</a>
        <a class="btn btn-primary float-right" href="#" role="button">Edit</a>
    </div>

    <div class="content">
        <h1 class="centered">{{ $actor->name }}</h1>

    </div>

@endsection