@extends('layouts.app')

@section('content')

    <h1>Add a movie</h1>

    <form method="POST" action="{{ route('movies.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="title">Movie title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Spiderman">
        </div>

        <div class="form-group">
            <div class="row movie-actors">

                {{--example--}}
                {{--<input type="checkbox" id="inlineCheckbox1" name="my_checkbox[]" value="option1"> 1--}}
                {{--<input type="checkbox" id="inlineCheckbox2" name="my_checkbox[]" value="option2"> 2--}}
                {{--<input type="checkbox" id="inlineCheckbox3" name="my_checkbox[]" value="option3"> 3--}}

                <?php
                    $count = 0;
                ?>

                @foreach($actors as $actor)

                    <div class="col-3">
                        <div class="form-check">
                            <div class="actor-image" style="background-image:url('{{ $actor->image }}')"></div>
                            <input type="checkbox" id="defaultCheck<?php echo $count ?>" name="selected_actor[]" value="actor{{ $actor->id }}" class="form-check-input">
                            <label class="form-check-label" for="defaultCheck<?php echo $count ?>">
                                <h5 class="text-center p-2">{{ $actor->name }}</h5>
                            </label>
                        </div>
                    </div>

                    <?php $count++; ?>
                @endforeach

            </div>
        </div>


        <div id="dropzone">
            <div>Drop movie image</div>
            <input type="file" name="imageToUpload" accept="image/png, image/jpg, image/jpeg, image/gif"/>
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