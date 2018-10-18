@extends('layouts.app')

@section('content')

    <h1>Add an actor</h1>

    <form method="POST" action="{{ route('actors.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Actor name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Cillian murphy">
        </div>

        <div id="dropzone">
            <div>Drop actor image</div>
            <input type="file" name="imageToUpload" accept="image/png, image/jpg, image/jpeg, image/gif"/>
        </div>

        <div class="form-group">
            <div class="row movie-actors">

                <?php $count = 0; ?>
                @foreach($movies as $movie)

                        <div class="col-3">
                            <div class="form-check">
                                <div class="actor-image" style="background-image:url('{{ $movie->image }}')"></div>
                                <input type="checkbox" id="defaultCheck<?php echo $count ?>" name="selected_movie[]" value="{{ $movie->id }}" class="form-check-input">
                                <label class="form-check-label" for="defaultCheck<?php echo $count ?>">
                                    <h5 class="text-center p-2">{{ $movie->title }}</h5>
                                </label>
                            </div>
                        </div>
                    <?php $count++; ?>
                @endforeach

            </div>
        </div>

        <div class="form-group">
            <label for="birth">Birth place</label>
            <input type="text" class="form-control" id="birth_place" name="birth_place" placeholder="London">
        </div>

        <div class="form-group">
            <label for="birth">Birth date</label>
            <input type="text" class="form-control" id="birth_date" name="birth_date" placeholder="yyyy-mm-dd">
        </div>

        <div class="form-group">
            <label for="biography">biography</label>
            <textarea class="form-control" id="biography" name="biography" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create actor</button>
    </form>

    @include('layouts.errors')

@endsection