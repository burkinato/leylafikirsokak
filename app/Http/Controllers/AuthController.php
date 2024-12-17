<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember'); // Remember me parametresi
    
        if (Auth::attempt($credentials, $remember)) {
            // Başarıyla giriş yapıldı
            return response()->json([
                'success' => true,
                'redirect' => route('admin.dashboard') // Yönlendirme URL'si
            ]);
        } else {
            // Giriş başarısız
            return response()->json([
                'success' => false,
                'message' => 'Giriş yapılamadı. Lütfen bilgilerinizi kontrol edin.'
            ], 400);
        }
    }
    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return response()->json([
        'success' => true,
        'message' => 'Başarıyla çıkış yapıldı.',
        'redirect' => route('login')
    ]);
}
}
