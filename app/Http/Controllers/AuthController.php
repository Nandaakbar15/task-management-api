<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(!Auth::attempt($credentials)) {
            return response()->json([
                'statusCode' => 400,
                'message' => 'Invalid credentials!'
            ], 400);
        }


        $user = Auth::user();
        
        $token = $user->createToken('API Token')->plainTextToken;  
        
        return response()->json([
            'statusCode' => 200,
            'message' => 'Login Successfully!',
            'token' => $token
        ]);
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'username' => $credentials['username'],
            'email' => $credentials['email'],
            'password' => bcrypt($credentials['password']), // Hashing the password
        ]);

        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'statusCode' => 200,
            'message' => 'New User added!',
            'token' => $token
        ], 200);
    }
}
