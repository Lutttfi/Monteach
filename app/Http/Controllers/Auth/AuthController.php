<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan ada file resources/views/auth/login.blade.php
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:6'
        ]);

        // Cek kredensial
        if (Auth::attempt($credentials, $request->filled('remember'))) { // Include 'remember' jika ada
            $request->session()->regenerate();

            // Ambil user yang sudah login
            $user = Auth::user();

            // Redirect berdasarkan role_id atau role
            switch ($user->role_id) { // Sesuaikan dengan field yang digunakan
                case 1: // Role ID untuk Admin
                    return redirect()->route('admin.dashboard');
                case 2: // Role ID untuk Guru
                    return redirect()->route('guru.dashboard');
                case 3: // Role ID untuk Siswa
                    return redirect()->route('siswa.dashboard');
                default:
                    return redirect()->route('home'); // Redirect default jika role tidak dikenali
            }
        }

        // Jika login gagal
        return back()->withErrors(['username' => 'Username atau password salah'])->withInput();
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        // Redirect ke halaman login
        return redirect('/login'); // Kembali ke halaman login setelah logout
    }
}
