<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\{
    AuthController
};

Route::redirect('/', 'URI', 301);
