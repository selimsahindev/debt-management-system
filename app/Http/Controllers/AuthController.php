<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return inertia('Auth/Register');
    }

    public function register(AuthRequest $request)
    {
        try {
            $fields = $request->validated();

            $user = User::create([
                'first_name' => $fields['firstName'],
                'last_name' => $fields['lastName'],
                'email' => $fields['email'],
                'password' => bcrypt($fields['password']),
                'confirmPassword' => 'required|same:password',
            ]);

            $token = $user->createToken('app')->plainTextToken;

            $response = [
                'message' => 'User created successfully.',
                'token' => $token,
                'user' => $user,
            ];

            return response($response, 201);
        } catch (\Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    public function showLoginForm()
    {
        return inertia('Auth/Login');
    }
}
