@foreach ($movie->comments as $comment)
    <!-- Start comment -->
    <div class="row comment {{ Auth::check() && $comment->poster->id == Auth::user()->id ? "justify-content-end" : "" }}">
        <div class="col-md-1 text-center">
            <div class="rating">
                <p>{{ $comment->movie_rating }}</p>
            </div>
        </div>

        <div class="col-md-1">
            <div class="thumbnail">
                <img class="img-fluid user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
            </div>
        </div>

        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>{{ $comment->poster->name }}</strong><br />
                    <span class="text-muted">commented on {{ $comment->created_at }}</span>
                </div>
                <div class="panel-body">
                    {{ $comment->comment }}
                </div>
            </div>
        </div>
    </div>
    <!-- End comment -->
@endforeach