@extends('layouts.app')

@section('title', 'Profile - ' . $user->name)

@section('content')
    <section class="py-12 bg-slate-50 min-h-screen">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl">

            <div class="mb-8">
                <h1 class="text-3xl lg:text-4xl font-black text-slate-900 mb-2">Profile Saya</h1>
                <p class="text-slate-600">Kelola informasi profile dan pengaturan akun Anda</p>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm mb-6">
                <div class="h-32 bg-linear-to-r from-blue-500 to-emerald-500"></div>


                <div class="px-8 pb-8">

                    <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between -mt-16 mb-6">
                        <div class="flex items-end gap-4 mb-4 sm:mb-0">
                            <img src="{{ 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=3b82f6&color=fff' }}"
                                alt="{{ $user->name }}"
                                class="w-32 h-32 rounded-2xl border-4 border-white shadow-xl object-cover">
                            <div class="pb-2">
                                <h2 class="text-md lg:text-2xl font-black text-slate-900">{{ $user->name }}</h2>
                                <p class="text-slate-600">{{ $user->email }}</p>
                            </div>
                        </div>

                        <a href="{{ route('profile.edit') }}"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-slate-900 text-white rounded-xl font-bold hover:bg-slate-800 transition-all shadow-lg hover:shadow-xl hover:scale-105">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            <span>Edit Profile</span>
                        </a>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6 pt-6 border-t border-slate-200">

                        <div class="md:col-span-2">
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h7" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm font-semibold text-slate-500 mb-1">Bio</div>
                                    <div class="text-slate-900">
                                        {{ $user->bio ?? 'Belum ada bio' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="flex items-start gap-3">
                                <div
                                    class="w-10 h-10 bg-emerald-50 rounded-lg flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm font-semibold text-slate-500 mb-1">Email</div>
                                    <div class="text-slate-900 break-all">{{ $user->email }}</div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="flex items-start gap-3">
                                <div
                                    class="w-10 h-10 bg-purple-50 rounded-lg flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm font-semibold text-slate-500 mb-1">Umur</div>
                                    <div class="text-slate-900">
                                        {{ $user->age ? $user->age . ' tahun' : 'Belum diisi' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <div class="flex items-start gap-3">
                                <div
                                    class="w-10 h-10 bg-amber-50 rounded-lg flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm font-semibold text-slate-500 mb-1">Alamat</div>
                                    <div class="text-slate-900">
                                        {{ $user->address ?? 'Belum diisi' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <div class="grid sm:grid-cols-3 gap-4 mb-6">
                <div class="bg-white rounded-xl border border-slate-200 p-6">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-2xl font-black text-slate-900">{{ $user->questions()->count() }}</div>
                            <div class="text-sm text-slate-600">Pertanyaan</div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-slate-200 p-6">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-emerald-50 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-2xl font-black text-slate-900">{{ $user->answers()->count() }}</div>
                            <div class="text-sm text-slate-600">Jawaban</div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-slate-200 p-6">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-purple-50 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm text-slate-600">Bergabung</div>
                            <div class="text-sm font-bold text-slate-900">{{ $user->created_at->format('M Y') }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-black text-slate-900">Pertanyaan Saya</h3>
                    <a href="{{ route('profile.my-questions') }}" class="text-blue-600 hover:text-blue-700 font-semibold text-sm">Lihat Semua</a>
                </div>

                @forelse($user->questions()->latest()->take(5)->get() as $question)
                    <a href="{{ route('questions.show', $question->slug) }}"
                        class="block p-4 rounded-lg hover:bg-slate-50 transition-colors mb-3 last:mb-0">
                        <div class="flex items-start justify-between gap-4">
                            <div class="flex-1 min-w-0">
                                <h4 class="font-bold text-slate-900 mb-1 truncate">{{ $question->title }}</h4>
                                <div class="flex items-center gap-3 text-sm text-slate-500">
                                    <span>{{ $question->answers->count() }} jawaban</span>
                                    <span>•</span>
                                    <span>{{ $question->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-lg text-xs font-bold shrink-0">
                                {{ $question->category->name }}
                            </span>
                        </div>
                    </a>
                @empty
                    <div class="text-center py-8">
                        <p class="text-slate-600">Belum ada pertanyaan</p>
                    </div>
                @endforelse
            </div>

        </div>
    </section>
@endsection
