@extends('layouts.app')

@section('title', $category->name . ' - Kategori')

@section('content')
    <section class="bg-linear-to-br from-blue-50 to-emerald-50 border-b border-slate-200">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl py-12">

            <nav class="flex items-center gap-2 text-sm mb-6">
                <a href="{{ route('home') }}" class="text-slate-600 hover:text-slate-900 transition-colors">Home</a>
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <a href="{{ route('categories.index') }}"
                    class="text-slate-600 hover:text-slate-900 transition-colors">Kategori</a>
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-slate-900 font-semibold">{{ $category->name }}</span>
            </nav>

            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                <div class="flex items-start gap-4">
                    <div
                        class="w-20 h-20 bg-linear-to-br from-blue-500 to-emerald-500 rounded-2xl flex items-center justify-center shrink-0 shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" />
                        </svg>
                    </div>

                    <div>
                        <h1 class="text-4xl lg:text-5xl font-black text-slate-900 mb-2">{{ $category->name }}</h1>
                        @if ($category->description)
                            <p class="text-lg text-slate-600 max-w-2xl">{{ $category->description }}</p>
                        @endif
                        <div class="flex items-center gap-4 mt-3">
                            <span class="inline-flex items-center gap-1 text-sm text-slate-600">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
                                </svg>
                                <span class="font-bold text-slate-900">{{ $questions->total() }}</span> pertanyaan
                            </span>
                        </div>
                    </div>
                </div>

                @auth
                    <a href="{{ route('questions.create') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-slate-900 text-white rounded-xl font-bold hover:bg-slate-800 transition-all shadow-lg hover:shadow-xl hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Ajukan Pertanyaan</span>
                    </a>
                @else
                    <a href="{{ route('auth.login') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-slate-900 text-white rounded-xl font-bold hover:bg-slate-800 transition-all shadow-lg hover:shadow-xl hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        <span>Login untuk Bertanya</span>
                    </a>
                @endauth
            </div>
        </div>
    </section>

    <section class="py-12 bg-slate-50 min-h-screen">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">

            <div class="bg-white rounded-xl border border-slate-200 p-4 mb-6 shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-slate-600">
                        Menampilkan <span class="font-bold text-slate-900">{{ $questions->total() }}</span> pertanyaan
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('questions.index') }}"
                            class="text-sm text-blue-600 hover:text-blue-700 font-semibold">
                            Lihat Semua Kategori
                        </a>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                @forelse($questions as $question)
                    <article
                        class="bg-white rounded-xl border border-slate-200 hover:shadow-lg hover:border-slate-300 transition-all duration-300 group cursor-pointer">
                        <a href="{{ route('questions.show', $question->slug) }}" class="block p-6">
                            <div class="flex gap-6">

                                <div class="hidden sm:flex flex-col items-center gap-3 text-center min-w-20">
                                    <div>
                                        <div class="text-2xl font-black text-slate-900">{{ $question->answers->count() }}
                                        </div>
                                        <div class="text-xs text-slate-500 font-medium">Jawaban</div>
                                    </div>
                                </div>

                                <div class="flex-1 min-w-0">

                                    <h3
                                        class="text-xl font-bold text-slate-900 mb-2 group-hover:text-blue-600 transition-colors">
                                        {{ $question->title }}
                                    </h3>

                                    <p
                                        class="text-slate-600 mb-4 line-clamp-2 group-hover:text-slate-700 transition-colors">
                                        {{ Str::limit($question->content, 200) }}
                                    </p>

                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-3 text-sm">
                                            <div class="flex items-center gap-2">
                                                <img src="{{ 'https://ui-avatars.com/api/?name=' . urlencode($question->user->name) . '&background=3b82f6&color=fff' }}"
                                                    alt="{{ $question->user->name }}" class="w-6 h-6 rounded-full">
                                                <span
                                                    class="font-semibold text-slate-900">{{ $question->user->name }}</span>
                                            </div>
                                            <span class="text-slate-400">•</span>
                                            <span
                                                class="text-slate-500">{{ $question->created_at->diffForHumans() }}</span>
                                        </div>

                                        <div
                                            class="sm:hidden flex items-center gap-2 text-sm text-slate-500 group-hover:text-blue-600 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                            </svg>
                                            <span class="font-semibold">{{ $question->answers_count }}</span>
                                        </div>
                                    </div>

                                </div>

                                @if ($question->image)
                                    <img src="{{ $question->image }}" alt="{{ $question->title }}"
                                        class="w-24 h-24 object-cover rounded-lg shrink-0 hidden lg:block group-hover:scale-105 transition-transform">
                                @endif

                            </div>
                        </a>
                    </article>
                @empty
                    <div class="bg-white rounded-xl border border-slate-200 p-12 text-center">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-slate-100 rounded-full mb-6">
                            <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Belum Ada Pertanyaan</h3>
                        <p class="text-slate-600 mb-6">Belum ada pertanyaan dalam kategori
                            <strong>{{ $category->name }}</strong>. Jadilah yang pertama!
                        </p>
                        @auth
                            <a href="{{ route('questions.create') }}"
                                class="inline-flex items-center gap-2 px-6 py-3 bg-slate-900 text-white rounded-xl font-bold hover:bg-slate-800 transition-all shadow-lg hover:shadow-xl hover:scale-105">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                <span>Ajukan Pertanyaan</span>
                            </a>
                        @else
                            <a href="{{ route('auth.login') }}"
                                class="inline-flex items-center gap-2 px-6 py-3 bg-slate-900 text-white rounded-xl font-bold hover:bg-slate-800 transition-all shadow-lg hover:shadow-xl hover:scale-105">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                <span>Login untuk Bertanya</span>
                            </a>
                        @endauth
                    </div>
                @endforelse
            </div>

            @if ($questions->hasPages())
                <div class="mt-8">
                    {{ $questions->links() }}
                </div>
            @endif

        </div>
    </section>

    <section class="py-12 bg-white border-t border-slate-200">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
            <h2 class="text-2xl font-black text-slate-900 mb-6">Kategori Lainnya</h2>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach (\App\Models\Category::where('id', '!=', $category->id)->orderBy('name')->limit(4)->get() as $otherCategory)
                    <a href="{{ route('categories.show', $otherCategory->slug) }}"
                        class="bg-slate-50 rounded-xl border border-slate-200 p-6 hover:shadow-lg hover:border-slate-300 transition-all group">
                        <div class="flex items-center gap-3 mb-3">
                            <div
                                class="w-12 h-12 bg-linear-to-br from-blue-500 to-emerald-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-slate-900 group-hover:text-blue-600 transition-colors">
                                    {{ $otherCategory->name }}</h3>
                                <p class="text-xs text-slate-500">{{ $otherCategory->questions()->count() }} pertanyaan
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
