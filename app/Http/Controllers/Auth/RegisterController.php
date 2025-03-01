<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
        public function showRegistrationForm()
        {
            return view('auth.register');
        }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if (User ::where('email', $request->email)->exists()) {
            return redirect()->back()->withErrors(['Пользователь с таким email уже существует']);
        }

        if ($request->password !== $request->password_confirmation) {
            return redirect()->back()->withErrors(['Пароли не совпадают']);
        }

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['Ошибка создания пользователя']);
        }

        return redirect()->route('login')->with('success', 'Регистрация успешна!');
    }
}
