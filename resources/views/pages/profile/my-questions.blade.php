@extends('layouts.app')

@section('title', 'Pertanyaan Saya')

@section('content')
    <section class="bg-linear-to-br from-blue-50 to-emerald-50 border-b border-slate-200">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl py-12">

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

            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                <div class="flex items-center gap-4">
                    <img src="{{ 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=3b82f6&color=fff' }}"
                        alt="{{ $user->name }}" class="w-16 h-16 rounded-xl shadow-lg">
                    <div>
                        <h1 class="text-4xl lg:text-5xl font-black text-slate-900 mb-2">Pertanyaan Saya</h1>
                        <p class="text-lg text-slate-600">Total {{ $questions->total() }} pertanyaan</p>
                    </div>
                </div>

                <a href="{{ route('questions.create') }}"
                    class="inline-flex items-center gap-2 px-6 py-3 bg-slate-900 text-white rounded-xl font-bold hover:bg-slate-800 transition-all shadow-lg hover:shadow-xl hover:scale-105">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Pertanyaan Baru</span>
                </a>
            </div>
        </div>
    </section>

    <section class="py-12 bg-slate-50 min-h-screen">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">

            <div class="grid sm:grid-cols-3 gap-4 mb-8">
                <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-sm">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-2xl font-black text-slate-900">{{ $questions->total() }}</div>
                            <div class="text-sm text-slate-600">Total Pertanyaan</div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-sm">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-emerald-50 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-2xl font-black text-slate-900">
                                {{ $user->questions()->has('answers')->count() }}</div>
                            <div class="text-sm text-slate-600">Terjawab</div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-sm">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-amber-50 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-2xl font-black text-slate-900">
                                {{ $user->questions()->doesntHave('answers')->count() }}</div>
                            <div class="text-sm text-slate-600">Belum Terjawab</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                @forelse($questions as $question)
                    <article
                        class="bg-white rounded-xl border border-slate-200 hover:shadow-lg hover:border-slate-300 transition-all duration-300 group">
                        <div class="p-6">
                            <div class="flex gap-6">
                                <div class="hidden sm:flex flex-col items-center gap-3 text-center min-w-20">
                                    <div>
                                        <div class="text-2xl font-black text-slate-900">{{ $question->answers->count() }}
                                        </div>
                                        <div class="text-xs text-slate-500 font-medium">Jawaban</div>
                                    </div>
                                </div>

                                <div class="flex-1 min-w-0">

                                    <div class="mb-3">
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 bg-blue-50 text-blue-700 rounded-lg text-xs font-bold">
                                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" />
                                            </svg>
                                            {{ $question->category->name }}
                                        </span>

                                        @if ($question->answers_count === 0)
                                            <span
                                                class="inline-flex items-center gap-1.5 px-3 py-1 bg-amber-50 text-amber-700 rounded-lg text-xs font-bold ml-2">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                Belum Terjawab
                                            </span>
                                        @endif
                                    </div>


                                    <h3
                                        class="text-xl font-bold text-slate-900 group-hover:text-blue-600 transition-colors">
                                        {{ $question->title }}
                                    </h3>


                                    <p class="text-slate-600 mb-4 line-clamp-2">
                                        {{ Str::limit($question->content, 200) }}
                                    </p>

                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-3 text-sm">
                                            <div class="flex items-center gap-2">
                                                <img src="{{ 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=3b82f6&color=fff' }}"
                                                    alt="{{ $user->name }}" class="w-6 h-6 rounded-full">
                                                <span
                                                    class="font-semibold text-slate-900">{{ $user->name }}</span>
                                            </div>
                                            <span class="text-slate-400">•</span>
                                            <span
                                                class="text-slate-500">{{ $question->created_at->diffForHumans() }}</span>
                                        </div>

                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('questions.show', $question->slug) }}"
                                                class="inline-flex items-center gap-2 px-4 py-2 bg-slate-100 text-slate-700 rounded-lg text-sm font-semibold hover:bg-slate-200 transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                <span>Lihat</span>
                                            </a>
                                            <a href="{{ route('questions.edit', $question->slug) }}"
                                                class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-700 rounded-lg text-sm font-semibold hover:bg-blue-100 transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                <span>Edit</span>
                                            </a>
                                            <form action="{{ route('questions.destroy', $question->slug) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus pertanyaan ini?')"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex items-center gap-2 px-4 py-2 bg-red-50 text-red-700 rounded-lg text-sm font-semibold hover:bg-red-100 transition-colors">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    <span>Hapus</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
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
                        <p class="text-slate-600 mb-6">Mulai ajukan pertanyaan pertama Anda!</p>
                        <a href="{{ route('questions.create') }}"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-slate-900 text-white rounded-xl font-bold hover:bg-slate-800 transition-all shadow-lg hover:shadow-xl hover:scale-105">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            <span>Ajukan Pertanyaan</span>
                        </a>
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
@endsection
