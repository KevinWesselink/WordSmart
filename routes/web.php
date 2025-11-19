<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

/* 

User routes 

*/

// Register Form
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form')->middleware('guest');

// Create New User
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

// Login Form
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login.form')->middleware('guest');

// Create New Session (Login)
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->name('login.authenticate');

// Logout User
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
