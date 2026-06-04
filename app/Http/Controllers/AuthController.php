<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Регистрация
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'user' // по умолчанию обычный пользователь
        ]);

        Auth::login($user);

        return response()->json([
            'success' => true,
            'redirect' => route('profile')
        ]);
    }

    // Авторизация
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Определяем редирект по роли
            if ($user->isAdmin()) {
                $redirect = route('admin.dashboard');
            } elseif ($user->isDoctor()) {
                $redirect = route('doctor.dashboard');
            } else {
                $redirect = route('profile');
            }

            return response()->json([
                'success' => true,
                'redirect' => $redirect
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Неверный email или пароль'
        ], 422);
    }

    // Выход
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
