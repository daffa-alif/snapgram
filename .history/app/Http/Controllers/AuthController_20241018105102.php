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

    public function register(Request $request) {
        // Handle registration logic here
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('login');
    }
}
