<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegistrationForm']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLoginForm']);
    Route::post('/login', [AuthController::class, 'login']);
});

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/logout', [AuthController::class, 'logout']);

    // Customer routes
    Route::prefix('customers')->group(function () {
        Route::get('/', [CustomerController::class, 'index']);
        Route::get('/create', [CustomerController::class, 'showAddCustomerPage']);
        Route::post('/create', [CustomerController::class, 'createCustomer']);
        Route::post('/{customer}/delete', [CustomerController::class, 'destroy']);
        Route::get('/{id}/edit', [CustomerController::class, 'showEditCustomerPage']);
        Route::post('/{id}/edit', [CustomerController::class, 'edit']);
    });
});

Route::get('/', [IndexController::class, 'index'])->name('index');
