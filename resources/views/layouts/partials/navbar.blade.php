@php
    $onQuestionsPage = request()->is('questions*');
    $onProfilePage = request()->is('profile*');
    $onCategoriesPage = request()->is('categories*');

    $menuItems = [
        [
            'label' => 'Beranda',
            'href' => $onQuestionsPage || $onProfilePage || $onCategoriesPage ? '/#hero-content' : '#hero-content',
        ],
        [
            'label' => 'Tutorial',
            'href' => $onQuestionsPage || $onProfilePage || $onCategoriesPage ? '/#tutorial' : '#tutorial',
        ],
        [
            'label' => 'Komunitas',
            'href' => $onQuestionsPage || $onProfilePage || $onCategoriesPage ? '/#komunitas' : '#komunitas',
        ],
        ['label' => 'Pertanyaan', 'href' => route('questions.index')],
        ['label' => 'Kategori', 'href' => route('categories.index')],
    ];
    $dropdownItems = [
        ['label' => 'Profile', 'href' => route('profile.show')],
        ['label' => 'Keluar', 'href' => route('auth.logout')],
    ];
@endphp
<nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-lg transition-all duration-300" id="navbar">
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
                @foreach ($menuItems as $menuItem)
                    <a href="{{ $menuItem['href'] }}"
                        class="px-4 py-2 rounded-lg text-slate-700 hover:bg-slate-100 hover:text-blue-600 font-semibold transition-colors">
                        {{ $menuItem['label'] }}
                    </a>
                @endforeach
            </div>

            <div class="flex items-center gap-3">
                @guest
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
                @endguest
                @auth
                    <a href="{{ route('questions.create') }}">
                        <button
                            class="hidden lg:flex items-center gap-2 px-5 py-2.5 bg-blue-50 text-blue-600 rounded-xl font-bold hover:bg-blue-100 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            <span>Tanya</span>
                        </button>
                    </a>

                    <div class="hidden lg:block">
                        @livewire('dropdown-user', ['dropdownItems' => $dropdownItems])
                    </div>

                @endauth

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
            @foreach ($menuItems as $menuItem)
                <a href="{{ $menuItem['href'] }}"
                    class="block px-4 py-3 rounded-lg text-slate-700 hover:bg-slate-50 font-semibold">
                    {{ $menuItem['label'] }}
                </a>
            @endforeach
            @guest
                <hr class="my-2 border-slate-200">
                <a href="{{ route('auth.login') }}"
                    class="block px-4 py-3 rounded-lg text-slate-700 hover:bg-slate-50 font-semibold">
                    Masuk
                </a>
                <a href="{{ route('auth.register') }}"
                    class="block px-4 py-3 bg-slate-900 text-white rounded-lg font-bold text-center">
                    Daftar Gratis
                </a>
            @endguest
            @auth
                <hr class="my-2 border-slate-200">
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open"
                        class="flex items-center gap-3 w-full px-4 py-3 bg-slate-50 rounded-lg border border-slate-200 hover:bg-slate-100 transition">
                        <img src="{{ 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=3b82f6&color=fff' }}"
                            alt="{{ Auth::user()->name }}" class="w-9 h-9 rounded-lg border-2 border-slate-200">
                        <div class="flex-1 text-left">
                            <p class="font-semibold text-slate-800">{{ Auth::user()->name }}</p>
                            <p class="text-sm text-slate-500">{{ Auth::user()->email }}</p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-slate-500 transition-transform"
                            :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="open" @click.outside="open = false" x-transition
                        class="absolute right-0 mt-2 w-full bg-white border border-slate-200 rounded-lg shadow-lg overflow-hidden z-50">

                        @foreach ($dropdownItems as $dropdownItem)
                            @if ($dropdownItem['label'] === 'Keluar')
                                <form method="POST" action="{{ $dropdownItem['href'] }}">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-left px-4 py-3 text-red-600 hover:bg-red-50 flex items-center gap-2">
                                        <span>{{ $dropdownItem['label'] }}</span>
                                    </button>
                                </form>
                            @else
                                <a href="{{ $dropdownItem['href'] }}"
                                    class="block px-4 py-3 text-slate-700 hover:bg-slate-50">
                                    {{ $dropdownItem['label'] }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>
