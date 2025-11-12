@extends('layouts.app')

@section('title', 'Edit Jawaban')

@section('content')
    <section class="py-12 bg-slate-50 min-h-screen">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-3xl">

            <div class="mb-6">
                <a href="{{ route('questions.show', $answer->question->slug) }}"
                    class="inline-flex items-center gap-2 text-slate-600 hover:text-slate-900 font-semibold transition-colors group">
                    <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span>Kembali ke Pertanyaan</span>
                </a>
            </div>

            <div class="mb-8">
                <h1 class="text-3xl lg:text-4xl font-black text-slate-900 mb-2">Edit Jawaban</h1>
                <p class="text-slate-600">Perbarui jawaban Anda</p>
            </div>

            <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 mb-8">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-bold text-slate-900 mb-1">Pertanyaan:</h3>
                        <p class="text-slate-700 leading-relaxed">{{ $answer->question->title }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                <form action="{{ route('answers.update', $answer->id) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    @method('PUT')


                    <div>
                        <label for="content" class="block text-sm font-semibold text-slate-900 mb-2">
                            Jawaban <span class="text-red-500">*</span>
                        </label>
                        <textarea name="content" id="content" rows="10" required autofocus
                            class="w-full px-4 py-3 bg-slate-50 border-2 {{ $errors->has('content') ? 'border-red-500' : 'border-slate-200' }} rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-slate-900 focus:ring-2 focus:ring-slate-900/20 transition-all"
                            placeholder="Tulis jawaban Anda di sini...">{{ old('content', $answer->content) }}</textarea>
                        <p class="text-sm text-slate-500 mt-1">Minimal 10 karakter</p>
                        @error('content')
                            <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" />
                                </svg>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-3 pt-4">
                        <button type="submit"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-slate-900 text-white rounded-xl font-bold hover:bg-slate-800 transition-all shadow-lg hover:shadow-xl hover:scale-105">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Simpan Perubahan</span>
                        </button>
                        <a href="{{ route('questions.show', $answer->question->slug) }}"
                            class="px-6 py-3 bg-slate-100 text-slate-700 rounded-xl font-bold hover:bg-slate-200 transition-colors">
                            Batal
                        </a>
                    </div>

                </form>
            </div>

        </div>
    </section>
@endsection
