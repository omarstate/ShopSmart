<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Pest\Laravel\get;

class ProfileController extends Controller
{
    public function getPoints()
    {
        $user = request()->user(); // Get the Authenticated User
        return response()->json([
            'points' => $user['points']
        ], 201);
    }
}
