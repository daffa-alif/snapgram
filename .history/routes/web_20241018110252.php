<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    HomeController,
};

// Redirect root URL to login
Route::redirect('/', '/auth/login');

// Authentication routes
Route::controller(AuthController::class)->group(function () {

    Route::get('auth/login', 'showLoginForm')->name('login')->middleware('guest');
    Route::post('auth/postLogin', 'postLogin')->name('postLogin');
    Route::post('logout', 'logout')->name('logout');
    Route::get('auth/register', 'showRegistrationForm')->name('register.form');
    Route::post('auth/register', 'register')->name('register');

    Route::middleware('auth')->group(function () {
        Route::get('home', [])
    });
});