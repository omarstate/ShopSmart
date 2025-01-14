<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
         request()->validate([
            'name' => ['required', 'min:2', 'max:16'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(5)],

        ]);

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => request('password')
        ]);

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user
        ], 201);

    }

}
