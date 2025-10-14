<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan form login untuk admin.
     */
    public function showAdminLoginForm()
    {
        return view('auth.login'); 
    }

    /**
     * Menangani upaya login dari admin.
     */
    public function adminLogin(Request $request)
    {
        // 1. Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Coba untuk melakukan autentikasi
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Jika berhasil, regenerate session untuk keamanan
            $request->session()->regenerate();

            // Redirect ke halaman yang dituju sebelumnya, atau ke dashboard admin
            return redirect()->intended('/admin/dashboard');
        }

        // 3. Jika gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        // 1. Lakukan logout pada guard default (web)
        Auth::logout();

        // 2. Invalidate session pengguna
        // Ini akan menghapus semua data session dan membuatnya tidak valid
        $request->session()->invalidate();

        // 3. Regenerate CSRF token baru
        // Langkah keamanan untuk memastikan session baru memiliki token yang baru
        $request->session()->regenerateToken();

        // 4. Redirect pengguna ke halaman yang diinginkan (misalnya halaman beranda)
        return redirect()->route('beranda')->with('status', 'Anda telah berhasil logout.');
    }
}