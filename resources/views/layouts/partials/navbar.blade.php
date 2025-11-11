@php
    $items = [
        ['label' => 'Beranda', 'href' => '#hero-content'],
        ['label' => 'Tutorial', 'href' => '#tutorial'],
        ['label' => 'Komunitas', 'href' => '#komunitas'],
        ['label' => 'Pertanyaan', 'href' => '#'],
    ];
@endphp
<nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-lg border-b border-slate-200 transition-all duration-300"
    id="navbar">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="flex items-center justify-between h-16 lg:h-20">

            <a href="#hero-content" class="flex items-center gap-3 group">
                <div class="relative">
                    <div
                        class="w-10 h-10 lg:w-12 lg:h-12 bg-linear-to-br from-blue-500 to-emerald-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-all duration-300 shadow-lg group-hover:shadow-xl">
                        <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
                        </svg>
                    </div>
                    <span class="absolute inset-0 rounded-xl bg-blue-400 opacity-20"></span>
                </div>
                <div class="flex flex-col">
                    <span
                        class="text-xl lg:text-2xl font-black text-slate-900 group-hover:text-blue-600 transition-colors">Tanya.in</span>
                    <span class="text-xs text-slate-500 font-medium -mt-1 hidden sm:block">Tanya Aja Pasti Ada</span>
                </div>
            </a>

            <div class="hidden lg:flex items-center gap-1">
                @foreach ($items as $item)
                    <a href="{{ $item['href'] }}"
                        class="px-4 py-2 rounded-lg text-slate-700 hover:bg-slate-100 hover:text-blue-600 font-semibold transition-colors">
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </div>

            <div class="flex items-center gap-3">
                @guest
                    <button class="lg:hidden p-2 rounded-lg hover:bg-slate-100 transition-colors">
                        <svg class="w-5 h-5 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>

                    <div class="hidden lg:flex items-center gap-3">
                        <a href="{{ route('auth.login') }}"
                            class="px-5 py-2.5 text-slate-700 hover:text-blue-600 font-semibold transition-colors">
                            Masuk
                        </a>
                        <a href="{{ route('auth.register') }}"
                            class="group px-6 py-2.5 bg-slate-900 text-white rounded-xl font-bold hover:bg-slate-800 transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105 flex items-center gap-2">
                            <span>Daftar Gratis</span>
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    </div>

                    <a href="{{ route('auth.register') }}"
                        class="lg:hidden px-4 py-2 bg-slate-900 text-white rounded-lg font-bold text-sm">
                        Daftar
                    </a>
                @else
                    <button
                        class="hidden lg:flex items-center gap-2 px-5 py-2.5 bg-blue-50 text-blue-600 rounded-xl font-bold hover:bg-blue-100 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Tanya</span>
                    </button>

                    <button class="relative p-2 rounded-lg hover:bg-slate-100 transition-colors">
                        <svg class="w-6 h-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>

                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center gap-2 p-1 rounded-xl hover:bg-slate-100 transition-colors">
                            <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=3b82f6&color=fff' }}"
                                alt="{{ Auth::user()->name }}" class="w-9 h-9 rounded-lg border-2 border-slate-200">
                            <svg class="w-4 h-4 text-slate-600 hidden lg:block" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-2xl border border-slate-200 py-2 z-50"
                            style="display: none;">
                            <div class="px-4 py-3 border-b border-slate-200">
                                <p class="text-sm font-bold text-slate-900">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-slate-500 truncate">{{ Auth::user()->email }}</p>
                            </div>
                            <a href="#"
                                class="flex items-center gap-3 px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span>Profile Saya</span>
                            </a>
                            <a href="#"
                                class="flex items-center gap-3 px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Pertanyaan Saya</span>
                            </a>
                            <a href="#"
                                class="flex items-center gap-3 px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>Pengaturan</span>
                            </a>
                            <hr class="my-2 border-slate-200">
                            <form method="POST" action="#">
                                @csrf
                                <button type="submit"
                                    class="flex items-center gap-3 px-4 py-2 text-sm text-red-600 hover:bg-red-50 w-full text-left">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    <span>Keluar</span>
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest
                <button class="lg:hidden p-2 rounded-lg hover:bg-slate-100 transition-colors" id="mobile-menu-button">
                    <svg id="menu-icon" class="w-6 h-6 text-slate-700" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="close-icon" class="w-6 h-6 text-slate-700 hidden" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <div class="lg:hidden hidden border-t border-slate-200 bg-white" id="mobile-menu">
        <div class="container mx-auto px-4 py-4 space-y-2">
            @foreach ($items as $item)
                <a href="{{ $item['href'] }}"
                    class="block px-4 py-3 rounded-lg text-slate-700 hover:bg-slate-50 font-semibold">
                    {{ $item['label'] }}
                </a>
            @endforeach
            @guest
                <hr class="my-2 border-slate-200">
                <a href="#" class="block px-4 py-3 rounded-lg text-slate-700 hover:bg-slate-50 font-semibold">
                    Masuk
                </a>
                <a href="{{ route('auth.register') }}"
                    class="block px-4 py-3 bg-slate-900 text-white rounded-lg font-bold text-center">
                    Daftar Gratis
                </a>
            @endguest
        </div>
    </div>
</nav>
