<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Correct User model import
use Illuminate\Support\Facades\Hash; // Correct Hash import

class AuthController extends Controller
{
    public function showLoginForm() {
        return view('auth.login');
    }

    public function postLogin(Request $request) {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    
        $credentials = $request->only('username', 'password');
    
        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }
    
        return back()->withErrors(['username' => 'Invalid credentials']);
    }

    public function showRegistrationForm() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'username' => 'required|string|unique:users,username|max:255',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Create new user
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password), // Hash password
        ]);

        return redirect()->route('login');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('login');
    }
}
