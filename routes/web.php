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

/*

Profile routes

*/


// User Profile
Route::get('/profile', [UserController::class, 'showProfile'])->name('profile.show')->middleware('auth');

// Edit User Profile
Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit')->middleware('auth');

// Update User Profile
Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update')->middleware('auth');

// Delete User Profile
Route::delete('/profile', [UserController::class, 'destroyProfile'])->name('profile.delete')->middleware('auth');