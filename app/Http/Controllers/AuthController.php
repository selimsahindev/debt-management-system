<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return inertia('Auth/Register');
    }

    public function register(AuthRequest $request)
    {
        $fields = $request->validated();

        User::create($fields);

        return to_route('/login');
    }

    public function showLoginForm()
    {
        return inertia('Auth/Login');
    }

    public function login(AuthRequest $request)
    {
        $fields = $request->validated();

        $credentials = [
            'email' => $fields['email'],
            'password' => $fields['password'],
        ];

        if (Auth::attempt($credentials, $fields['rememberMe'])) {
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success', 'Logged in successfully.');
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect()->intended('/')->with('success', 'Logged out successfully.');
    }
}
