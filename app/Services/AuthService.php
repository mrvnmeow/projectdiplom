<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function register(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return $user;
    }

    public function login(array $data)
    {
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return Auth::user();
        }

        return null;
    }

    public function logout()
    {
        Auth::logout();
    }
}
