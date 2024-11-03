<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller {
    public function index() {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function update (Request $request) {
        // update user profile
    }
}