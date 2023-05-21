<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::controller(AuthController::class)->group(function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/register', 'showRegistrationForm');
        Route::post('/register', 'register');
        Route::get('/login', 'showLoginForm');
        Route::post('/login', 'login');
    });
});

Route::middleware('auth:sanctum')->group(function () {
    // Protected routes
    Route::get('/user', [UserController::class, 'show']);
    Route::get('/logout', [AuthController::class, 'logout']);
});
