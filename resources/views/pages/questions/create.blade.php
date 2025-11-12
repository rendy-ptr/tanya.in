@extends('layouts.app')

@section('title', 'Buat Pertanyaan')

@section('content')
    <section class="py-12 bg-slate-50 min-h-screen">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl">

            <div class="mb-6">
                <a href="{{ route('questions.index') }}"
                    class="inline-flex items-center gap-2 text-slate-600 hover:text-slate-900 font-semibold transition-colors group">
                    <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span>Kembali ke Daftar Pertanyaan</span>
                </a>
            </div>

            <div class="mb-8">
                <h1 class="text-3xl lg:text-4xl font-black text-slate-900 mb-2">Buat Pertanyaan</h1>
                <p class="text-slate-600">Tulis pertanyaan Anda dengan jelas agar mudah dipahami</p>
            </div>

            <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 mb-8">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-bold text-slate-900 mb-2">Tips Membuat Pertanyaan yang Baik:</h3>
                        <ul class="text-sm text-slate-700 space-y-1">
                            <li>• Gunakan judul yang jelas dan spesifik</li>
                            <li>• Jelaskan masalah dengan detail</li>
                            <li>• Sertakan contoh atau screenshot jika perlu</li>
                            <li>• Pilih kategori yang sesuai</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                <form action="{{ route('questions.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    <div>
                        <label for="title" class="block text-sm font-semibold text-slate-900 mb-2">
                            Judul Pertanyaan <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" required autofocus
                            maxlength="255"
                            class="w-full px-4 py-3 bg-slate-50 border {{ $errors->has('title') ? 'border-red-500' : 'border-slate-200' }} rounded-lg text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-slate-900 focus:ring-1 focus:ring-slate-900 transition-all"
                            placeholder="contoh: Bagaimana cara menggunakan Laravel Eloquent?">
                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="category_id" class="block text-sm font-semibold text-slate-900 mb-2">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <select name="category_id" id="category_id" required
                            class="w-full px-4 py-3 bg-slate-50 border {{ $errors->has('category_id') ? 'border-red-500' : 'border-slate-200' }} rounded-lg text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-slate-900 focus:ring-1 focus:ring-slate-900 transition-all">
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="content" class="block text-sm font-semibold text-slate-900 mb-2">
                            Isi Pertanyaan <span class="text-red-500">*</span>
                        </label>
                        <textarea name="content" id="content" rows="10" required
                            class="w-full px-4 py-3 bg-slate-50 border {{ $errors->has('content') ? 'border-red-500' : 'border-slate-200' }} rounded-lg text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-slate-900 focus:ring-1 focus:ring-slate-900 transition-all"
                            placeholder="Jelaskan pertanyaan Anda dengan detail...">{{ old('content') }}</textarea>
                        <p class="text-sm text-slate-500 mt-1">Minimal 20 karakter</p>
                        @error('content')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-900 mb-2">
                            Gambar (Opsional)
                        </label>
                        <div
                            class="border-2 border-dashed border-slate-300 rounded-lg p-6 hover:border-slate-400 transition-colors">
                            <input type="file" name="image" id="image" accept="image/*" class="hidden"
                                onchange="previewImage(event)">
                            <label for="image" class="cursor-pointer">
                                <div id="image-preview-container" class="hidden mb-4">
                                    <img id="image-preview" src="" alt="Preview"
                                        class="max-w-full h-auto rounded-lg">
                                </div>
                                <div class="text-center">
                                    <svg class="w-12 h-12 mx-auto text-slate-400 mb-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <p class="text-sm text-slate-600 mb-1">
                                        <span class="font-semibold text-slate-900">Klik untuk upload</span> atau drag and
                                        drop
                                    </p>
                                    <p class="text-xs text-slate-500">PNG, JPG, GIF hingga 2MB</p>
                                </div>
                            </label>
                        </div>
                        @error('image')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-3 pt-4">
                        <button type="submit"
                            class="inline-flex items-center gap-2 px-8 py-4 bg-slate-900 text-white rounded-xl font-bold hover:bg-slate-800 transition-all shadow-lg hover:shadow-xl hover:scale-105">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                            <span>Posting Pertanyaan</span>
                        </button>
                        <a href="{{ route('questions.index') }}"
                            class="px-6 py-4 bg-slate-100 text-slate-700 rounded-xl font-bold hover:bg-slate-200 transition-colors">
                            Batal
                        </a>
                    </div>

                </form>
            </div>

        </div>
    </section>


@endsection
