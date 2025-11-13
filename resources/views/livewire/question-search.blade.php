<div>
    <div class="bg-white rounded-xl border border-slate-200 p-6 mb-6 shadow-sm">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input type="text" wire:model.live.debounce.300ms="search"
                class="w-full pl-12 pr-12 py-4 bg-slate-50 border-2 border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-slate-900 focus:ring-2 focus:ring-slate-900/20 transition-all text-lg"
                placeholder="Cari pertanyaan berdasarkan judul...">

            @if ($search)
                <button wire:click="$set('search', '')"
                    class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-600 transition-colors"
                    title="Clear search">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            @endif
        </div>

        @if ($search)
            <div class="mt-3 flex items-center gap-2 text-sm">
                <span class="text-slate-600">Hasil pencarian untuk:</span>
                <span
                    class="inline-flex items-center gap-1 px-3 py-1 bg-blue-50 text-blue-700 rounded-lg font-semibold">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    "{{ $search }}"
                    <button wire:click="$set('search', '')" class="hover:text-blue-900">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </span>
            </div>
        @endif
    </div>

    @if ($questions->total() > 0)
        <div class="mb-4 text-sm text-slate-600">
            Menampilkan <span class="font-bold text-slate-900">{{ $questions->total() }}</span> pertanyaan
        </div>
    @endif

    <div class="space-y-4">
        @forelse($questions as $question)
            <article
                class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg transition-all duration-300 group cursor-pointer">
                <a href="{{ route('questions.show', $question->slug) }}" class="block p-6">
                    <div class="flex gap-6">

                        <div class="hidden sm:flex flex-col items-center gap-3 text-center min-w-20">
                            <div>
                                <div class="text-2xl font-black text-slate-900">{{ $question->answers->count() }}</div>
                                <div class="text-xs text-slate-500 font-medium">Jawaban</div>
                            </div>
                        </div>

                        <div class="flex-1 min-w-0">

                            <div class="mb-3">
                                <span
                                    class="inline-flex items-center gap-1.5 px-3 py-1 bg-blue-50 text-blue-700 rounded-lg text-xs font-bold hover:bg-blue-100 transition-colors">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" />
                                    </svg>
                                    {{ $question->category->name }}
                                </span>
                            </div>

                            <h3
                                class="text-xl font-bold text-slate-900 mb-2 group-hover:text-blue-600 transition-colors">
                                @if ($search)
                                    {!! preg_replace(
                                        '/(' . preg_quote($search, '/') . ')/i',
                                        '<mark class="bg-yellow-200 px-1 rounded">$1</mark>',
                                        e($question->title),
                                    ) !!}
                                @else
                                    {{ $question->title }}
                                @endif
                            </h3>


                            <p class="text-slate-600 mb-4 line-clamp-2">
                                {{ Str::limit($question->content, 200) }}
                            </p>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3 text-sm">
                                    <div class="flex items-center gap-2">
                                        <img src="{{ 'https://ui-avatars.com/api/?name=' . urlencode($question->user->name) . '&background=3b82f6&color=fff' }}"
                                            alt="{{ $question->user->name }}" class="w-6 h-6 rounded-full">
                                        <span class="font-semibold text-slate-900">{{ $question->user->name }}</span>
                                    </div>
                                    <span class="text-slate-400">•</span>
                                    <span class="text-slate-500">{{ $question->created_at->diffForHumans() }}</span>
                                </div>

                                <div class="sm:hidden flex items-center gap-2 text-sm text-slate-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                    <span class="font-semibold">{{ $question->answers->count() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </article>
        @empty
            <div class="text-center py-16">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-slate-100 rounded-full mb-6">
                    <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Belum Ada Pertanyaan</h3>
                <p class="text-slate-600 mb-6">Jadilah yang pertama mengajukan pertanyaan!</p>
                @auth
                    <a href="{{ route('questions.create') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-slate-900 text-white rounded-xl font-bold hover:bg-slate-800 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Ajukan Pertanyaan</span>
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
