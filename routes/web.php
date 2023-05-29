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
    Route::controller(CustomerController::class)->prefix('customers')->group(function () {
        Route::get('/', 'index');
        Route::get('/create', 'showAddCustomerPage');
        Route::post('/create', 'createCustomer');
        Route::delete('/{customer}', 'destroy');
        // Route::get('/{id}/edit', 'showEditCustomerPage');
        // Route::post('/{id}/edit', 'edit');
    });
});

Route::get('/', [IndexController::class, 'index'])->name('index');
