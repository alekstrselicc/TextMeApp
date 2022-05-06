<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|',
            'country' => 'required|string',
            'mobile' => 'required|string',
            'birth' => 'required|string',
            'img' => 'string',
        ]);

        $user = User::create([
            'first_name' => $fields['first_name'],
            'last_name' => $fields['last_name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'country' => $fields['country'],
            'mobile' => $fields['mobile'],
            'birth' => $fields['birth'],
            'img' => $fields['img'],
        ]);

        $response = [
            'user' => $user
        ];

        return response($response, 201);
    }
    
    public function logout (Request $request) {
        $request->user()->token()->revoke();
        return response()->json([
        'message' => 'Successfully logged out'
     ]);
    }
}
