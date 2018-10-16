<div class="not-logged-in mt-3">
    <hr>
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
        <div class="row">
            <div class="col">
                <p>Login to comment <a href="{{ route('login') }}">Login</a>
                <p>No account? click <a href="{{ route('register') }}">here</a> to register</p>
            </div>
        </div>
    @endif
</div>