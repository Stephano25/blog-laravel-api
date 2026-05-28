<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginMutation
{
    public function __invoke($rootValue, array $args)
    {
        $credentials = [
            'email' => $args['email'],
            'password' => $args['password']
        ];
        
        if (!$token = JWTAuth::attempt($credentials)) {
            throw new \Exception('Invalid credentials');
        }
        
        $user = Auth::user();
        
        return [
            'token' => $token,
            'user' => $user
        ];
    }
}