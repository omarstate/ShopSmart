<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        // Validate the requested credentials
        $credentials = request()->validate([
            'email' => ['email', 'required'],
            'password' => ['required']
        ]);

        // If the Authentication failed.
        if(! Auth::attempt($credentials)){
            return response()->json([
                'message' => 'Sorry, invalid credentials.'
            ], 401);
        }

        // Get the Authenticated user
        $user = Auth::user();

        // Create a Personal token
        $token = $user->createToken('API Token')->plainTextToken;

        // Return the response
        return response()->json([
            'message' => 'Login Successful',
            'token' => $token

        ], 200);
    }


    public function destroy()
    {
        // Logs out the Authenticated User
        Auth::logout();

        // Returns the response
        return response()->json([
            'message' => "Logged out successfully"
        ], 200);

    }
}
