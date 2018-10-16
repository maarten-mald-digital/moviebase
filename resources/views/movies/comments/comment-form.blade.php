<div class="not-logged-in mt-3">
    <hr>
    @if(Auth::check())
        <form method="POST" action="/movies/{{ $movie->id }}}/comments">

            <!-- Generates a unique hidden token, for security reasons  -->
            {{ csrf_field() }}


                {{--<label for="movie_rating">Rate this movie (1-10)</label>--}}
                {{--<input id="movie_rating" name="movie_rating" class="form-control">--}}
            <div class="row">
                <div class="col-sm-4 ">
                    <div class="form-group">
                        <label for="movie_rating">Rate the movie:</label>
                        <label for="movie_rating" id="movie_rating_label"></label>
                        <input type="range" class="custom-range" min="0" max="5" step="0.5" id="movie_rating_range" name="movie_rating">
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea id="comment" name="comment" class="form-control"></textarea>
                    </div>
                </div>
            </div>

            <div class="row justify-content-end">
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary submit-button">Rate the movie!</button>
                </div>
            </div>



        </form>

        <!-- validation message -->
        @include ('layouts.errors')
    @else
        <div class="row">
            <div class="col">
                <p>Login to comment <a href="{{ route('login') }}">Login</a>
                <p>No account? click <a href="{{ route('register') }}">here</a> to register</p>
            </div>
        </div>
    @endif
</div>