<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('pages.profile.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('pages.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'bio' => ['nullable', 'string', 'max:500'],
            'age' => ['nullable', 'integer', 'min:13', 'max:120'],
            'address' => ['nullable', 'string', 'max:500'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'age.min' => 'Umur minimal 13 tahun',
            'age.max' => 'Umur maksimal 120 tahun',
        ]);


        $user->update($validated);

        flash()->success('Profil berhasil diperbarui!');

        return redirect()->route('profile.show');
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ], [
            'current_password.required' => 'Password lama wajib diisi',
            'current_password.current_password' => 'Password lama salah',
            'password.required' => 'Password baru wajib diisi',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        flash()->success('Password berhasil diubah!');

        return redirect()->route('profile.show');
    }

    public function myQuestions()
    {
        $user = Auth::user();

        $questions = Question::where('user_id', $user->id)
            ->with(['category', 'answers'])
            ->latest()
            ->paginate(10);

        return view('pages.profile.my-questions', compact('user', 'questions'));
    }
}
