@extends('layouts.app')

@section('title', 'Edit Pertanyaan')

@section('content')
    <section class="py-12 bg-slate-50 min-h-screen">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl">

            <div class="mb-6">
                <a href="{{ route('questions.show', $question->slug) }}"
                    class="inline-flex items-center gap-2 text-slate-600 hover:text-slate-900 font-semibold transition-colors group">
                    <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span>Kembali ke Pertanyaan</span>
                </a>
            </div>

            <div class="mb-8">
                <h1 class="text-3xl lg:text-4xl font-black text-slate-900 mb-2">Edit Pertanyaan</h1>
                <p class="text-slate-600">Perbarui pertanyaan Anda</p>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                <form action="{{ route('questions.update', $question->slug) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="title" class="block text-sm font-semibold text-slate-900 mb-2">
                            Judul Pertanyaan <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" id="title" value="{{ old('title', $question->title) }}"
                            required autofocus maxlength="255"
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
                                    {{ old('category_id', $question->category_id) == $category->id ? 'selected' : '' }}>
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
                            placeholder="Jelaskan pertanyaan Anda dengan detail...">{{ old('content', $question->content) }}</textarea>
                        <p class="text-sm text-slate-500 mt-1">Minimal 20 karakter</p>
                        @error('content')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    @if ($question->image)
                        <div>
                            <label class="block text-sm font-semibold text-slate-900 mb-3">Gambar Saat Ini</label>
                            <div class="relative inline-block group" id="current-image-container">
                                <img src="{{ $question->image }}" alt="Current image"
                                    class="w-full max-w-full h-auto object-contain rounded-lg border-2 border-slate-200"
                                    id="current-image">
                                <button type="button" id="remove-image-btn"
                                    class="absolute top-3 right-3 bg-white/90 hover:bg-red-500 text-slate-700 hover:text-white p-2 rounded-full shadow-md transition-all duration-200 hover:scale-110"
                                    title="Hapus Gambar">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>

                                <input type="hidden" name="remove_image" id="remove_image" value="0">

                                <div id="remove-overlay"
                                    class="hidden absolute inset-0 bg-red-500/20 rounded-lg backdrop-blur-sm">
                                    <div class="bg-white px-6 py-3 rounded-lg shadow-xl flex items-center justify-center">
                                        <p class="text-red-600 font-bold flex items-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Gambar akan dihapus
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <p class="text-sm text-slate-500 mt-2">
                                <span class="font-semibold">Tips:</span> Upload gambar baru untuk menggantinya atau klik
                                "X" untuk menghapusnya.
                            </p>
                        </div>
                    @endif

                    <div id="upload-section"
                        class="{{ $question->image ? 'hidden' : '' }} transition-all duration-300 ease-in-out">
                        <label class="block text-sm font-semibold text-slate-900 mb-2">
                            @if ($question->image)
                                <span id="upload-label-replace">Ganti Gambar (Opsional)</span>
                                <span id="upload-label-new" class="hidden">Upload Gambar Baru (Opsional)</span>
                            @else
                                Gambar (Opsional)
                            @endif
                        </label>
                        <div class="border-2 border-dashed border-slate-300 rounded-lg p-6 hover:border-slate-400 transition-colors"
                            id="upload-area">
                            <input type="file" name="image" id="image" accept="image/*" class="hidden"
                                onchange="previewImage(event)">
                            <label for="image" class="cursor-pointer">
                                <div id="image-preview-container" class="hidden mb-4">
                                    <img id="image-preview" src="" alt="Preview"
                                        class="max-w-full h-auto rounded-lg border-2 border-blue-500">
                                    <p class="text-center text-sm font-semibold text-blue-600 mt-2">Gambar baru siap
                                        di-upload</p>
                                </div>
                                <div id="upload-placeholder">
                                    <svg class="w-12 h-12 mx-auto text-slate-400 mb-3" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <p class="text-sm text-slate-600 mb-1 text-center">
                                        <span class="font-semibold text-slate-900">Klik untuk upload</span> atau drag and
                                        drop
                                    </p>
                                    <p class="text-xs text-slate-500 text-center">PNG, JPG, GIF hingga 2MB</p>
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
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Simpan Perubahan</span>
                        </button>
                        <a href="{{ route('questions.show', $question->slug) }}"
                            class="px-6 py-4 bg-slate-100 text-slate-700 rounded-xl font-bold hover:bg-slate-200 transition-colors">
                            Batal
                        </a>
                    </div>

                </form>
            </div>

        </div>
    </section>

@endsection
