@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profile Page</h1>
    <div class="card">
        <div class="card-header">
            {{ $user->name }}
        </div>
        <div class="card-body">
            <p>Email: {{ $user->email }}</p>
            <p>Member since: {{ $user->created_at->format('d M Y') }}</p>

            @if (auth()->id() !== $user->id)
                @if (auth()->user()->following->contains($user))
                    <form action="{{ route('profile.unfollow', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Unfollow</button>
                    </form>
                @else
                    <form action="{{ route('profile.follow', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Follow</button>
                    </form>
                @endif
            @endif
        </div>
    </div>

    <h2 class="mt-4">Tweets</h2>
    @forelse ($tweets as $tweet)
        <div class="card mb-3">
            <div class="card-body">
                <p>{{ $tweet->content }}</p>
                <small class="text-muted">{{ $tweet->created_at->diffForHumans() }}</small>
            </div>
        </div>
    @empty
        <p>No tweets yet.</p>
    @endforelse
</div>
@endsection
