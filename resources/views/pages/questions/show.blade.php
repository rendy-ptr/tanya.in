@extends('layouts.app')

@section('title', $question->title)

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

            <article class="bg-white rounded-2xl border border-slate-200 p-8 mb-8 shadow-sm">

                <div class="mb-4">
                    <span
                        class="inline-flex items-center gap-1.5 px-3 py-1 bg-blue-50 text-blue-700 rounded-lg text-sm font-bold">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" />
                        </svg>
                        {{ $question->category->name }}
                    </span>
                </div>

                <h1 class="text-3xl lg:text-4xl font-black text-slate-900 mb-6">{{ $question->title }}</h1>

                <div class="flex items-center gap-4 pb-6 mb-6 border-b border-slate-200">
                    <div class="flex items-center gap-3">
                        <img src="{{ 'https://ui-avatars.com/api/?name=' . urlencode($question->user->name) . '&background=3b82f6&color=fff' }}"
                            alt="{{ $question->user->name }}" class="w-10 h-10 rounded-full">
                        <div>
                            <div class="font-bold text-slate-900">{{ $question->user->name }}</div>
                            <div class="text-sm text-slate-500">{{ $question->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                </div>

                <div class="prose prose-slate max-w-none mb-6">
                    <p class="text-lg text-slate-700 leading-relaxed whitespace-pre-line">{{ $question->content }}</p>
                </div>

                @if ($question->image)
                    <div class="mb-6">
                        <img src="{{ asset('storage/' . $question->image) }}" alt="Question image"
                            class="rounded-xl max-w-full h-auto border border-slate-200">
                    </div>
                @endif

                @auth
                    @if ($question->isOwnedBy(auth()->user()))
                        <div class="flex items-center gap-3 pt-6 border-t border-slate-200">
                            <a href="#"
                                class="inline-flex items-center gap-2 px-4 py-2 bg-slate-100 text-slate-700 rounded-lg font-semibold hover:bg-slate-200 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                <span>Edit</span>
                            </a>
                            <form action="#" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus pertanyaan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center gap-2 px-4 py-2 bg-red-50 text-red-600 rounded-lg font-semibold hover:bg-red-100 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    <span>Hapus</span>
                                </button>
                            </form>
                        </div>
                    @endif
                @endauth

            </article>

            <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                <h2 class="text-2xl font-black text-slate-900 mb-6">
                    {{ $question->answers->count() }} Jawaban
                </h2>

                @forelse($question->answers as $answer)
                    <div class="pb-6 mb-6 border-b border-slate-200 last:border-0 last:pb-0 last:mb-0">
                        <div class="flex items-center gap-3 mb-4">
                            <img src="{{ 'https://ui-avatars.com/api/?name=' . urlencode($answer->user->name) . '&background=3b82f6&color=fff' }}"
                                alt="{{ $answer->user->name }}" class="w-10 h-10 rounded-full">
                            <div>
                                <div class="font-bold text-slate-900">{{ $answer->user->name }}</div>
                                <div class="text-sm text-slate-500">{{ $answer->created_at->diffForHumans() }}</div>
                            </div>
                        </div>

                        <div class="prose prose-slate max-w-none mb-4">
                            <p class="text-slate-700 leading-relaxed whitespace-pre-line">{{ $answer->content }}</p>
                        </div>

                        @auth
                            @if ($answer->isOwnedBy(auth()->user()))
                                <div class="flex items-center gap-3">
                                    <button
                                        class="text-sm text-slate-600 hover:text-slate-900 font-semibold transition-colors">Edit</button>
                                    <button
                                        class="text-sm text-red-600 hover:text-red-700 font-semibold transition-colors">Hapus</button>
                                </div>
                            @endif
                        @endauth
                    </div>
                @empty
                    <div class="text-center py-8">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-slate-100 rounded-full mb-4">
                            <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                        </div>
                        <p class="text-slate-600 font-medium">Belum ada jawaban</p>
                        <p class="text-sm text-slate-500 mt-1">Jadilah yang pertama menjawab pertanyaan ini!</p>
                    </div>
                @endforelse

                @auth
                    <div class="mt-8 pt-8 border-t border-slate-200">
                        <h3 class="text-xl font-bold text-slate-900 mb-4">Tulis Jawaban</h3>
                        <form action="#" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <textarea name="content" rows="6" required
                                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-slate-900 focus:ring-1 focus:ring-slate-900 transition-all"
                                    placeholder="Tulis jawaban Anda di sini..."></textarea>
                            </div>
                            <button type="submit"
                                class="inline-flex items-center gap-2 px-6 py-3 bg-slate-900 text-white rounded-lg font-bold hover:bg-slate-800 transition-all">
                                <span>Kirim Jawaban</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </button>
                        </form>
                    </div>
                @else
                    <div class="mt-8 pt-8 border-t border-slate-200 text-center">
                        <p class="text-slate-600 mb-4">Login untuk menjawab pertanyaan ini</p>
                        <a href="{{ route('auth.login') }}"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-slate-900 text-white rounded-lg font-bold hover:bg-slate-800 transition-all">
                            <span>Login</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </section>
@endsection
