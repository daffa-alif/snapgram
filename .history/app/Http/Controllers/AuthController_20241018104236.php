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