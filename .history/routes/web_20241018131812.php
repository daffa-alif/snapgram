<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    HomeController,
    AlbumController,
    PhotoController,
};

// Redirect root URL to login
Route::redirect('/', '/auth/login');

// Authentication routes
Route::controller(AuthController::class)->group(function () {
    // Login routes
    Route::get('auth/login', 'showLoginForm')->name('login')->middleware('guest');
    Route::post('auth/postLogin', 'postLogin')->name('postLogin');
    Route::post('logout', 'logout')->name('logout');

    // Registration routes
    Route::get('auth/register', 'showRegistrationForm')->name('register.form');
    Route::post('auth/register', 'register')->name('register');

    // Authenticated routes
    Route::middleware('auth')->group(function () {
        Route::get('home', [HomeController::class, 'index'])->name('home');

        // Resource routes for albums
        Route::resource('albums', AlbumController::class);

        // Resource routes for photos
        Route::resource('photos', PhotoController::class);
    });
});
