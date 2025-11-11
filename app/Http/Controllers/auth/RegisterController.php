<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.auth.register');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed', Password::min(8)],
                'terms' => ['required', 'accepted'],
            ], [
                'name.required' => 'Nama wajib diisi',
                'name.max' => 'Nama maksimal 255 karakter',
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Format email tidak valid',
                'email.unique' => 'Email sudah terdaftar',
                'password.required' => 'Password wajib diisi',
                'password.confirmed' => 'Konfirmasi password tidak cocok',
                'password.min' => 'Password minimal 8 karakter',
                'terms.required' => 'Anda harus menyetujui syarat dan ketentuan',
                'terms.accepted' => 'Anda harus menyetujui syarat dan ketentuan',
            ]);

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            flash()->success('Berhasil! Akun Anda telah dibuat. Silakan login.');
            return redirect()->route('auth.login');
        } catch (\Exception $e) {
            flash()->error('Terjadi kesalahan saat membuat akun. Silakan coba lagi.');
            return redirect()->back()->withInput();
        }
    }
}
