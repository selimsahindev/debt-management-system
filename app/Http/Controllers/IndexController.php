<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return inertia('User/Dashboard');
        }

        return inertia('Index');
    }
}
