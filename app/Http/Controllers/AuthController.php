<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        $isEmailValid = User::where('email', $credentials['email'])->exists();

        if (!$isEmailValid) 
        {
            return response()->json([
                'message' => 'Invalid email address.',
            ], 401);
        }

        if (auth()->attempt($credentials))
        {
            $user = auth()->user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ], 200);
        } 
        else 
        {
            return response()->json([
                'message' => 'Invalid credentials.',
            ], 401);
        }
    }
}
