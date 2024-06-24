<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index()
    {
        $tweets = Tweet::with('user')->latest()->get();
        return view('tweets.index', compact('tweets'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required|max:180',
        ]);

        auth()->user()->tweets()->create([
            'content' => $validatedData['content'],
        ]);

        return redirect()->route('tweets.index');
    }
}
