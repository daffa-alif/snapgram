<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function postLogin(Request $request) {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    
        $credentials = $request->only('username', 'password');
    
        if (Auth::attempt($credentials)) {
            // Login berhasil
            return redirect()->route('home');
        }
    
        // Login gagal
        return back();
    }

    public function showRegistrationForm() {
        return view (auth)
    }

    public function register(Request $request){

    }

    public function logout(Request $request){

    }

    
}
