@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
    <section class="bg-linear-to-br from-blue-50 to-emerald-50 border-b border-slate-200">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl py-12">
            <div class="flex items-center justify-between">
                <div class="max-w-3xl">
                    <h1 class="text-4xl lg:text-5xl font-black text-slate-900 mb-4">Kategori</h1>
                    <p class="text-lg text-slate-600 mb-6">Jelajahi pertanyaan berdasarkan kategori</p>
                </div>

                @auth
                    <a href="{{ route('categories.create') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-slate-900 text-white rounded-xl font-bold hover:bg-slate-800 transition-all shadow-lg hover:shadow-xl hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Tambah Kategori</span>
                    </a>
                @endauth
            </div>
        </div>
    </section>

    <section class="py-12 bg-slate-50 min-h-screen">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse($categories as $category)
                    <div
                        class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg transition-all duration-300 group">
                        <div class="flex items-start justify-between mb-4">
                            <div
                                class="w-12 h-12 bg-linear-to-br from-blue-500 to-emerald-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" />
                                </svg>
                            </div>

                            @auth
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('categories.edit', $category->slug) }}"
                                        class="text-slate-400 hover:text-blue-600 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('categories.destroy', $category->slug) }}" method="POST"
                                        id="delete-category">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-slate-400 hover:text-red-600 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            @endauth
                        </div>

                        <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-blue-600 transition-colors">
                            {{ $category->name }}
                        </h3>

                        @if ($category->description)
                            <p class="text-sm text-slate-600 mb-4 line-clamp-2">{{ $category->description }}</p>
                        @endif

                        <div class="flex items-center justify-between pt-4 border-t border-slate-200">
                            <span class="text-sm text-slate-500">
                                <span class="font-bold text-slate-900">{{ $category->questions_count }}</span> pertanyaan
                            </span>
                            <a href="{{ route('categories.show', $category->slug) }}"
                                class="text-sm text-blue-600 hover:text-blue-700 font-semibold">
                                Lihat →
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-slate-100 rounded-full mb-6">
                            <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Belum Ada Kategori</h3>
                        <p class="text-slate-600 mb-6">Jadilah yang pertama membuat kategori!</p>
                        @auth
                            <a href="{{ route('categories.create') }}"
                                class="inline-flex items-center gap-2 px-6 py-3 bg-slate-900 text-white rounded-xl font-bold hover:bg-slate-800 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                <span>Tambah Kategori</span>
                            </a>
                        @endauth
                    </div>
                @endforelse
            </div>

            @if ($categories->hasPages())
                <div class="mt-12">
                    {{ $categories->links() }}
                </div>
            @endif

        </div>
    </section>
@endsection
