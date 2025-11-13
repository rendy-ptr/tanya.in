@extends('layouts.app')

@section('title', 'Semua Pertanyaan')

@section('content')
    <section class="bg-linear-to-br from-blue-50 to-emerald-50 border-b border-slate-200">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl py-12">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                <div class="max-w-3xl">
                    <h1 class="text-4xl lg:text-5xl font-black text-slate-900 mb-4">Semua Pertanyaan</h1>
                    <p class="text-lg text-slate-600">Jelajahi pertanyaan dari komunitas atau ajukan pertanyaan baru</p>
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
            @livewire('question-search')
        </div>
    </section>
@endsection
