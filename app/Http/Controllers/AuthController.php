<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function register()
    {
        return inertia('Auth/Register');
    }

    public function login()
    {
        return inertia('Auth/Login');
    }
}
