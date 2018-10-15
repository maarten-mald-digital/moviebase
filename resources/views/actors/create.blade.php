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