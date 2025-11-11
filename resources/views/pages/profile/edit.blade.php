@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <section class="py-12 bg-slate-50 min-h-screen">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-3xl">

            <div class="mb-6">
                <a href="{{ route('profile.show') }}"
                    class="inline-flex items-center gap-2 text-slate-600 hover:text-slate-900 font-semibold transition-colors group">
                    <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span>Kembali ke Profile</span>
                </a>
            </div>

            <div class="mb-8">
                <h1 class="text-3xl lg:text-4xl font-black text-slate-900 mb-2">Edit Profile</h1>
                <p class="text-slate-600">Perbarui informasi profile Anda</p>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm mb-6">
                <h2 class="text-xl font-bold text-slate-900 mb-6">Informasi Personal</h2>

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name" class="block text-sm font-semibold text-slate-900 mb-2">Nama Lengkap</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                            class="w-full px-4 py-3 bg-slate-50 border {{ $errors->has('name') ? 'border-red-500' : 'border-slate-200' }} rounded-lg text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-slate-900 focus:ring-1 focus:ring-slate-900 transition-all"
                            placeholder="Masukkan nama lengkap">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-900 mb-2">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                            required
                            class="w-full px-4 py-3 bg-slate-50 border {{ $errors->has('email') ? 'border-red-500' : 'border-slate-200' }} rounded-lg text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-slate-900 focus:ring-1 focus:ring-slate-900 transition-all"
                            placeholder="nama@email.com">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="bio" class="block text-sm font-semibold text-slate-900 mb-2">Bio</label>
                        <textarea name="bio" id="bio" rows="4" maxlength="500"
                            class="w-full px-4 py-3 bg-slate-50 border {{ $errors->has('bio') ? 'border-red-500' : 'border-slate-200' }} rounded-lg text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-slate-900 focus:ring-1 focus:ring-slate-900 transition-all"
                            placeholder="Ceritakan tentang diri Anda...">{{ old('bio', $user->bio) }}</textarea>
                        <p class="text-sm text-slate-500 mt-1">Maksimal 500 karakter</p>
                        @error('bio')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="age" class="block text-sm font-semibold text-slate-900 mb-2">Umur</label>
                        <input type="number" name="age" id="age" value="{{ old('age', $user->age) }}"
                            min="13" max="120"
                            class="w-full px-4 py-3 bg-slate-50 border {{ $errors->has('age') ? 'border-red-500' : 'border-slate-200' }} rounded-lg text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-slate-900 focus:ring-1 focus:ring-slate-900 transition-all"
                            placeholder="Masukkan umur Anda">
                        @error('age')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>


                    <div>
                        <label for="address" class="block text-sm font-semibold text-slate-900 mb-2">Alamat</label>
                        <textarea name="address" id="address" rows="3" maxlength="500"
                            class="w-full px-4 py-3 bg-slate-50 border {{ $errors->has('address') ? 'border-red-500' : 'border-slate-200' }} rounded-lg text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-slate-900 focus:ring-1 focus:ring-slate-900 transition-all"
                            placeholder="Masukkan alamat lengkap">{{ old('address', $user->address) }}</textarea>
                        @error('address')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-3 pt-4">
                        <button type="submit"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-slate-900 text-white rounded-lg font-bold hover:bg-slate-800 transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Simpan Perubahan</span>
                        </button>
                        <a href="{{ route('profile.show') }}"
                            class="px-6 py-3 bg-slate-100 text-slate-700 rounded-lg font-bold hover:bg-slate-200 transition-colors">
                            Batal
                        </a>
                    </div>

                </form>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                <h2 class="text-xl font-bold text-slate-900 mb-6">Ubah Password</h2>
                @livewire('password-toggle')
            </div>

        </div>
    </section>

@endsection
