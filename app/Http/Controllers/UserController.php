<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class UserController extends Controller
{
    public function show()
    {
        /** @var User $user */
        $user = Auth::user();

        return Inertia::render('User/Show', [
            'user' => $user->getFormattedUser(),
        ]);
    }
}
