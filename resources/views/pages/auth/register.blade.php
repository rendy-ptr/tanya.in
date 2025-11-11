@extends('layouts.auth')

@section('title', 'Daftar Akun')

@section('content')
    <section class="min-h-screen flex items-center justify-center bg-white py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div class="text-center">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 group mb-2">
                    <div
                        class="w-10 h-10 bg-slate-900 rounded-lg flex items-center justify-center group-hover:bg-linear-to-r group-hover:from-blue-500 group-hover:to-emerald-500  transition-colors">
                        <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
                        </svg>
                    </div>
                    <span
                        class="text-2xl font-black text-slate-900 group-hover:text-blue-600 transition-colors">Tanya.in</span>
                </a>
                <h1 class="mt-6 text-3xl font-black text-slate-900">Buat akun baru</h1>
                <p class="mt-2 text-sm text-slate-600">Sudah punya akun? <a href="{{ route('auth.login') }}"
                        class="font-semibold text-slate-900 hover:text-blue-600 transition-colors">Masuk</a></p>
            </div>

            <form method="POST" action="#" class="mt-8 space-y-5">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-semibold text-slate-900 mb-1.5">
                        Nama Lengkap
                    </label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                        class="w-full px-4 py-3 rounded-lg text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-slate-900 focus:ring-1 focus:ring-slate-900 transition-all {{ $errors->has('name') ? 'border border-red-500 bg-red-50' : 'border border-slate-200 bg-slate-50' }}"
                        placeholder="Masukkan nama lengkap Anda">
                    @error('name')
                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-semibold text-slate-900 mb-1.5">
                        Email
                    </label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-3 rounded-lg text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-slate-900 focus:ring-1 focus:ring-slate-900 transition-all {{ $errors->has('email') ? 'border border-red-500 bg-red-50' : 'border border-slate-200 bg-slate-50' }}"
                        placeholder="nama@email.com">
                    @error('email')
                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold text-slate-900 mb-1.5">
                        Password
                    </label>
                    <input id="password" type="password" name="password" required
                        class="w-full px-4 py-3 rounded-lg text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-slate-900 focus:ring-1 focus:ring-slate-900 transition-all {{ $errors->has('password') ? 'border border-red-500 bg-red-50' : 'border border-slate-200 bg-slate-50' }}"
                        placeholder="Minimal 8 karakter">
                    @error('password')
                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold text-slate-900 mb-1.5">
                        Konfirmasi Password
                    </label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-slate-900 focus:ring-1 focus:ring-slate-900 transition-all"
                        placeholder="Ulangi password Anda">
                </div>

                <div class="flex items-start">
                    <input id="terms" name="terms" type="checkbox" required
                        class="mt-1 w-4 h-4 border-slate-300 rounded text-slate-900 focus:ring-2 focus:ring-slate-900 cursor-pointer">
                    <label for="terms" class="ml-2 text-sm text-slate-600 cursor-pointer">
                        Saya setuju dengan <a href="#"
                            class="font-semibold text-slate-900 hover:text-blue-600 transition-colors">Syarat &
                            Ketentuan</a> serta <a href="#"
                            class="font-semibold text-slate-900 hover:text-blue-600 transition-colors">Kebijakan Privasi</a>
                    </label>
                </div>

                <div class="pt-2">
                    <button type="submit"
                        class="w-full flex items-center justify-center px-8 py-3.5 bg-slate-900 text-white rounded-lg font-semibold hover:bg-slate-800 transition-all duration-200 group">
                        <span>Daftar</span>
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-0.5 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
