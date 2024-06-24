<html>
<head>
    <title>Welcome</title>
</head>
<body>
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Laravel Tweet App
        </div>

        <div class="links">
            <a href="{{ route('tweets.index') }}">Tweet List</a>
        </div>
    </div>
</body>
</html>
