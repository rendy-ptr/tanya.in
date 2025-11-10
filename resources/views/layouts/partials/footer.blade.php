@php
    $items = [
        ['label' => 'Privacy Policy', 'href' => '#'],
        ['label' => 'Terms of Service', 'href' => '#'],
        ['label' => 'Cookies', 'href' => '#'],
    ];
@endphp

<footer class="bg-slate-900 text-white relative overflow-hidden">
    <div class="border-t border-slate-800">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl py-6">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">

                <p class="text-slate-400 text-sm text-center md:text-left">
                    &copy; {{ date('Y') }} Tanya.in. All rights reserved.
                </p>

                <div class="flex items-center gap-6 text-sm">
                    @foreach ($items as $item)
                        <a href="{{ $item['href'] }}" class="text-slate-400 hover:text-white transition-colors">
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</footer>
