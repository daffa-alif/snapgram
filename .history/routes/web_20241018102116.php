<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\{
    AuthController
};

Route::get('/', function () {
    return view('welcome');
});
