<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function store($id)
    {
        $userToFollow = User::findOrFail($id);
        $user = auth()->user();

        if (!$user->following()->where('followed_id', $id)->exists()) {
            $user->following()->attach($userToFollow);
        }

        return redirect()->route('profile.showOther', $id);
    }

    public function destroy($id)
    {
        $userToUnfollow = User::findOrFail($id);
        $user = auth()->user();

        if ($user->following()->where('followed_id', $id)->exists()) {
            $user->following()->detach($userToUnfollow);
        }

        return redirect()->route('profile.showOther', $id);
    }
}
