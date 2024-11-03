<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\{
    AuthController
};

Route::redirect('/', 'auth/login', 301);

Route::
