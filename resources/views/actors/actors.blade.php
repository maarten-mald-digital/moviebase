@extends('layouts.app')

@section('content')


    <h1 class="float-left">Actors</h1>
    <a class="btn btn-primary float-right" href="{{ route('actors.create') }}" role="button">Add actor</a>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col"></th>

            <th scope="col" class="filter" data-filter="title" onclick="makeAjax(event)">Title <i class="fas fa-sort-up"></i></th>
            <th scope="col" class="filter" data-filter="genre" onclick="makeAjax(event)">Age <i class="fas fa-sort-up"></i></th>
            <th scope="col" class="filter" data-filter="release_date" onclick="makeAjax(event)">Played in movies <i class="fas fa-sort-up"></i></th>
        </tr>
        </thead>

        <tbody id="form-results">

        @foreach($actors as $actor)
            <tr onclick="document.location = '/actors/{{ $actor->id }}';">
                <td><img src="{{ $actor->image }}" /></td>
                <td>{{ $actor->name }}</td>
                <td>{{$actor->getAge($actor->birth_date)}}</td>
                <td>10</td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection