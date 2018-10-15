@extends('layouts.app')

@section('content')


    <h1 class="float-left">Actors</h1>
    <a class="btn btn-primary float-right" href="{{ route('actors.create') }}" role="button">Add actor</a>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col"></th>

            <th scope="col" class="filter" data-table="actors" data-filter="name" onclick="makeAjax(event)">Name <i class="fas fa-sort-up"></i></th>
            <th scope="col" class="filter" data-table="actors" data-filter="birth_date" onclick="makeAjax(event)">Age <i class="fas fa-sort-up"></i></th>
            <th scope="col" class="filter" data-table="actors" data-filter="movieCount" onclick="makeAjax(event)">Played in movies <i class="fas fa-sort-up"></i></th>
        </tr>
        </thead>

        <tbody id="actors-results">

        @foreach($actors as $actor)
            <tr onclick="document.location = '/actors/{{ $actor->id }}';">
                <td><img src="{{ $actor->image }}" /></td>
                <td>{{ $actor->name }}</td>
                <td>{{ $actor->birth_date }}</td>
                <td>10</td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection