<div x-data="{ open: @entangle('open').live }" @click.outside="open = false" class="relative">
    <button @click="open = !open" class="flex items-center gap-2 p-1 rounded-xl hover:bg-slate-100 transition-colors">
        <img src="{{ 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=3b82f6&color=fff' }}"
            alt="{{ Auth::user()->name }}" class="w-9 h-9 rounded-lg border-2 border-slate-200">

        <svg class="w-4 h-4 text-slate-600 hidden lg:block transform transition-transform duration-300"
            :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="open" x-transition.origin.top.right
        class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-2xl border border-slate-200 z-50 transition-all">
        <div class="px-4 py-3 border-b border-slate-200">
            <p class="text-sm font-bold text-slate-900">{{ Auth::user()->name }}</p>
            <p class="text-xs text-slate-500 truncate">{{ Auth::user()->email }}</p>
        </div>
        @foreach ($dropdownItems as $dropdownItem)
            @if ($dropdownItem['label'] === 'Keluar')
                <form method="POST" action="{{ $dropdownItem['href'] }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-4 py-3 text-red-600 hover:bg-red-50 flex items-center gap-2 rounded-b-xl">
                        <span>{{ $dropdownItem['label'] }}</span>
                    </button>
                </form>
            @else
                <a href="{{ $dropdownItem['href'] }}" class="block px-4 py-3 text-slate-700 hover:bg-slate-50">
                    {{ $dropdownItem['label'] }}
                </a>
            @endif
        @endforeach
    </div>
</div>
