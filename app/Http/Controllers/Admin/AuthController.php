<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Admin Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json([
                'success' => true,
                'redirect' => route('admin.dashboard')
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'E-posta adresi veya şifre hatalı.'
        ], 401);
    }

    // Admin Logout
    public function logout(Request $request)
    {
        Auth::logout(); // Kullanıcıyı çıkış yaptırır

        // Eğer AJAX çağrısı ise JSON formatında yanıt döner
        if ($request->ajax()) {
            return response()->json(['status' => 'success', 'message' => 'Çıkış başarılı.']);
        }

        // Normal bir request ise logout sonrası yönlendirme yapar
        return redirect()->route('admin.login');
    }
}
