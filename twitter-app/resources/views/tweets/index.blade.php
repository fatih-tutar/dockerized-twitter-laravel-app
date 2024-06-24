<html>
<head>
    <title>Tweet List</title>
</head>
<body>
    <div class="container">
        <h1>Tweet List</h1>
        <form action="{{ route('tweets.store') }}" method="POST">
            @csrf
            <div>
                <textarea name="content" rows="3" cols="50"></textarea>
            </div>
            <div>
                <button type="submit">Tweet</button>
            </div>
        </form>
        <hr>
        <div>
            @foreach ($tweets as $tweet)
                <div>
                    <strong>{{ $tweet->user->username }}</strong> - {{ $tweet->created_at->diffForHumans() }}
                    <p>{{ $tweet->content }}</p>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
