<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $tweets = $user->tweets()->latest()->get();

        return view('profile.show', compact('user', 'tweets'));
    }

    public function showOtherProfile($id)
    {
        $user = User::findOrFail($id);
        $tweets = $user->tweets()->latest()->get();

        return view('profile.show', compact('user', 'tweets'));
    }
}
