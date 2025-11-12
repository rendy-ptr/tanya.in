@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
    <section class="py-12 bg-slate-50 min-h-screen">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-2xl">

            <div class="mb-6">
                <a href="{{ route('categories.index') }}"
                    class="inline-flex items-center gap-2 text-slate-600 hover:text-slate-900 font-semibold transition-colors group">
                    <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span>Kembali ke Daftar Kategori</span>
                </a>
            </div>

            <div class="mb-8">
                <h1 class="text-3xl lg:text-4xl font-black text-slate-900 mb-2">Edit Kategori</h1>
                <p class="text-slate-600">Perbarui informasi kategori</p>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                <form action="{{ route('categories.update', $category->slug) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name" class="block text-sm font-semibold text-slate-900 mb-2">
                            Nama Kategori <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
                            required autofocus
                            class="w-full px-4 py-3 bg-slate-50 border {{ $errors->has('name') ? 'border-red-500' : 'border-slate-200' }} rounded-lg text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-slate-900 focus:ring-1 focus:ring-slate-900 transition-all"
                            placeholder="contoh: Pemrograman">
                        @error('name')
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
                        <a href="{{ route('categories.index') }}"
                            class="px-6 py-3 bg-slate-100 text-slate-700 rounded-lg font-bold hover:bg-slate-200 transition-colors">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
