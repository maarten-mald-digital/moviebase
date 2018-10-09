<div class="alert">
    @if (count($errors))
        <h2>Woops!</h2>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>