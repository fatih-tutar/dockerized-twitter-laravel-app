<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
        ]);

        $user = User::create([
            'username' => $validatedData['username'],
            'password' => bcrypt($validatedData['password']),
        ]);

        return response()->json(['message' => 'User registered successfully', 'user' => $user]);
    }
}
