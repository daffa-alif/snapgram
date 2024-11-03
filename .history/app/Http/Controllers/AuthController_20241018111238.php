<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm() {
        // Return the view for login
        return view('auth.login');  // Ensure 'auth.login' view exists
    }

    public function postLogin(Request $request) {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    
        $credentials = $request->only('username', 'password');
    
        if (Auth::attempt($credentials)) {
            // Login successful, redirect to home
            return redirect()->route('home');
        }
    
        // Login failed, return to login form with error
        return back()->withErrors(['username' => 'Invalid credentials']);
    }

    public function showRegistrationForm() {
        return view('auth.register');
    }

    // Menghandle proses registrasi
public function register(Request $request) {
    $request->validate([
        'username' => 'required|string|unique:users,username|max:255',
        'password' => 'required|string|confirmed|min:8',
    ]);

    // Membuat pengguna baru
    User::create([
        'username' => $request->username,
        'password' => Hash::make($request->password), // Hash password
    ]);

    // Mengalihkan ke halaman login setelah registrasi berhasil
    return redirect()->route('login');
}

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('login');
    }
}
