<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BoardController;
use Illuminate\Support\Facades\Route;



Route::middleware('guest')->group(function () {
    Route::inertia('/', 'Home');

    Route::inertia('/register', 'auth/Register')->name('register');
    Route::inertia('/login', 'auth/Login')->name('login');

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::inertia('/dashboard', 'Dashboard')->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/dashboard', [BoardController::class, 'store'])->name('board.store');
});