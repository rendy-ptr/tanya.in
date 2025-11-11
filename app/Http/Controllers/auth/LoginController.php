<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.auth.login');
    }

    public function store(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ], [
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Format email tidak valid',
                'password.required' => 'Password wajib diisi',
            ]);

            $remember = $request->boolean('remember');
            if (Auth::attempt($credentials, $remember)) {
                $request->session()->regenerate();

                flash()->success('Berhasil! Selamat datang kembali.');
                return redirect()->intended('/');
            }
            flash()->error('Gagal! Email atau password salah.');
            return redirect()->back()->withInput();
        } catch (\Exception $e) {
            flash()->error('Terjadi kesalahan saat proses login. Silakan coba lagi.');
            return redirect()->back()->withInput();
        }
    }

    public function destroy(Request $request)
    {
        try {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            flash()->success('Berhasil! Anda telah logout.');
            return redirect()->route('auth.login');
        } catch (\Exception $e) {
            flash()->error('Terjadi kesalahan saat proses logout. Silakan coba lagi.');
            return redirect()->back();
        }
    }
}
