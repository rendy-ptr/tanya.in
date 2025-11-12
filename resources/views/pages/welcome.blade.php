@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <section class="relative bg-white overflow-hidden" id="hero-content">

        <div class="absolute inset-0 bg-dot-pattern opacity-30"></div>

        <div class="absolute top-20 right-20 w-96 h-96 bg-blue-200 rounded-full blur-3xl opacity-40 animate-blob"></div>
        <div
            class="absolute bottom-20 left-20 w-96 h-96 bg-emerald-200 rounded-full blur-3xl opacity-40 animate-blob animation-delay-2000">
        </div>
        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-purple-200 rounded-full blur-3xl opacity-20 animate-blob animation-delay-4000">
        </div>

        <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl py-20 lg:py-32">
            <div class="max-w-7xl mx-auto">

                <div class="flex items-center gap-3 mb-8 animate-fade-in">
                    <div
                        class="flex items-center gap-2 px-4 py-2 bg-blue-50 rounded-full hover:bg-blue-100 transition-colors cursor-pointer group">
                        <span class="relative flex h-2 w-2">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                        </span>
                        <span class="text-sm font-semibold text-blue-700">Komunitas Aktif</span>
                    </div>
                    <span class="text-slate-400">•</span>
                    <span class="text-sm text-slate-600 animate-pulse">1000+ Pertanyaan Terjawab Hari Ini</span>
                </div>

                <div class="space-y-6 mb-12 animate-slide-up">
                    <h1
                        class="text-5xl sm:text-6xl lg:text-7xl xl:text-8xl font-black leading-none text-slate-900 tracking-tight">
                        <span
                            class="inline-block hover:text-blue-600 transition-colors duration-300 cursor-default">Tanya</span>
                        <span
                            class="inline-block hover:text-emerald-600 transition-colors duration-300 cursor-default">Apa</span>
                        <span
                            class="inline-block hover:text-purple-600 transition-colors duration-300 cursor-default">Saja</span>,
                        <br>
                        <span class="relative inline-block mt-2 group cursor-default">
                            <span
                                class="relative z-10 inline-block hover:scale-105 transition-transform duration-300">Jawaban
                                Pasti Ada</span>
                            <span
                                class="absolute bottom-3 left-0 w-full h-4 bg-linear-to-r from-blue-400 via-emerald-400 to-purple-400 -rotate-1 opacity-30 group-hover:opacity-50 transition-opacity duration-300 animate-shimmer"></span>
                            <span
                                class="absolute bottom-0 left-0 w-0 h-1 bg-linear-to-r from-blue-500 to-emerald-500 group-hover:w-full transition-all duration-500"></span>
                        </span>
                    </h1>

                    <div class="relative">
                        <p class="text-xl sm:text-2xl text-slate-600 leading-relaxed max-w-3xl">
                            Platform tanya jawab modern untuk berbagi pengetahuan.
                            <span class="inline-block">
                                <span class="text-slate-900 font-semibold relative">
                                    Gratis
                                    <svg class="absolute -bottom-1 left-0 w-full" height="4" viewBox="0 0 100 4"
                                        preserveAspectRatio="none">
                                        <path d="M0,2 Q25,0 50,2 T100,2" fill="none" stroke="#3b82f6" stroke-width="2"
                                            class="animate-draw-line" />
                                    </svg>
                                </span>
                            </span>,
                            <span class="inline-block">
                                <span class="text-slate-900 font-semibold relative">
                                    mudah
                                    <svg class="absolute -bottom-1 left-0 w-full" height="4" viewBox="0 0 100 4"
                                        preserveAspectRatio="none">
                                        <path d="M0,2 Q25,0 50,2 T100,2" fill="none" stroke="#10b981" stroke-width="2"
                                            class="animate-draw-line" />
                                    </svg>
                                </span>
                            </span>, dan
                            <span class="inline-block">
                                <span class="text-slate-900 font-semibold relative">
                                    efektif
                                    <svg class="absolute -bottom-1 left-0 w-full" height="4" viewBox="0 0 100 4"
                                        preserveAspectRatio="none">
                                        <path d="M0,2 Q25,0 50,2 T100,2" fill="none" stroke="#a855f7" stroke-width="2"
                                            class="animate-draw-line" />
                                    </svg>
                                </span>
                            </span>.
                        </p>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 mb-16 animate-fade-in stagger-2">
                    <a href="#"
                        class="group relative inline-flex items-center justify-center px-8 py-4 bg-slate-900 text-white rounded-xl font-bold text-lg overflow-hidden hover:bg-slate-800 transition-all duration-300 shadow-lg hover:shadow-2xl hover:scale-105">
                        <div
                            class="absolute inset-0 w-full h-full bg-linear-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                        </div>

                        <span class="relative">Mulai Bertanya</span>
                        <svg class="relative w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                    <a href="#tutorial"
                        class="group inline-flex items-center justify-center px-8 py-4 border-2 border-slate-900 text-slate-900 rounded-xl font-bold text-lg hover:bg-slate-900 hover:text-white transition-all duration-300 hover:scale-105">
                        <svg class="w-5 h-5 mr-2 group-hover:animate-bounce" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                        <span>Pelajari Lebih Lanjut</span>
                    </a>
                </div>

                <div
                    class="grid grid-cols-1 sm:grid-cols-3 gap-8 pt-12 border-t-2 border-slate-900 animate-fade-in stagger-3">
                    <div class="group cursor-pointer transform hover:scale-105 transition-all duration-300">
                        <div
                            class="text-4xl lg:text-5xl font-black text-slate-900 mb-2 group-hover:text-blue-600 transition-colors counter-animate">
                            1000+</div>
                        <div class="text-slate-600 font-medium flex items-center gap-2">
                            <span>Pertanyaan Terjawab</span>
                            <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                        <div class="mt-2 h-1 bg-slate-200 rounded-full overflow-hidden">
                            <div
                                class="h-full bg-linear-to-r from-blue-500 to-blue-600 rounded-full transform origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-1000">
                            </div>
                        </div>
                    </div>

                    <div class="group cursor-pointer transform hover:scale-105 transition-all duration-300">
                        <div
                            class="text-4xl lg:text-5xl font-black text-slate-900 mb-2 group-hover:text-emerald-600 transition-colors counter-animate">
                            500+</div>
                        <div class="text-slate-600 font-medium flex items-center gap-2">
                            <span>Pengguna Aktif</span>
                            <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                        <div class="mt-2 h-1 bg-slate-200 rounded-full overflow-hidden">
                            <div
                                class="h-full bg-linear-to-r from-emerald-500 to-emerald-600 rounded-full transform origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-1000">
                            </div>
                        </div>
                    </div>

                    <div class="group cursor-pointer transform hover:scale-105 transition-all duration-300">
                        <div
                            class="text-4xl lg:text-5xl font-black text-slate-900 mb-2 group-hover:text-purple-600 transition-colors counter-animate">
                            50+</div>
                        <div class="text-slate-600 font-medium flex items-center gap-2">
                            <span>Kategori Topik</span>
                            <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                        <div class="mt-2 h-1 bg-slate-200 rounded-full overflow-hidden">
                            <div
                                class="h-full bg-linear-to-r from-purple-500 to-purple-600 rounded-full transform origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-1000">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl pb-20">
            <div class="max-w-7xl mx-auto">
                <div class="grid md:grid-cols-3 gap-6 lg:gap-8">

                    <article
                        class="observe-fade group relative bg-linear-to-br from-blue-50 to-white rounded-2xl p-8 border border-blue-100 hover-lift cursor-pointer overflow-hidden">
                        <div
                            class="absolute inset-0 bg-linear-to-br from-blue-100 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>

                        <div
                            class="absolute top-4 right-4 w-16 h-16 bg-blue-500 rounded-2xl flex items-center justify-center group-hover:rotate-12 group-hover:scale-110 transition-all duration-500 shadow-lg group-hover:shadow-2xl animate-float-slow">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>

                        <div class="relative">
                            <div class="mb-4">
                                <span
                                    class="inline-block px-3 py-1 bg-blue-100 text-blue-700 text-xs font-bold rounded-full group-hover:bg-blue-200 transition-colors">CEPAT</span>
                            </div>
                            <h3 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-blue-600 transition-colors">
                                Respons Kilat</h3>
                            <p class="text-slate-600 leading-relaxed mb-4">Dapatkan jawaban dalam hitungan menit dari
                                komunitas yang selalu siap membantu</p>
                            <div
                                class="flex items-center gap-2 text-blue-600 font-semibold opacity-0 group-hover:opacity-100 transform translate-x-0 group-hover:translate-x-2 transition-all duration-300">
                                <span>Coba Sekarang</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </div>
                        </div>
                    </article>

                    <article
                        class="observe-fade group relative bg-linear-to-br from-emerald-50 to-white rounded-2xl p-8 border border-emerald-100 hover-lift cursor-pointer overflow-hidden stagger-1">
                        <div
                            class="absolute inset-0 bg-linear-to-br from-emerald-100 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>

                        <div
                            class="absolute top-4 right-4 w-16 h-16 bg-emerald-500 rounded-2xl flex items-center justify-center group-hover:rotate-12 group-hover:scale-110 transition-all duration-500 shadow-lg group-hover:shadow-2xl animate-float-medium">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>

                        <div class="relative">
                            <div class="mb-4">
                                <span
                                    class="inline-block px-3 py-1 bg-emerald-100 text-emerald-700 text-xs font-bold rounded-full group-hover:bg-emerald-200 transition-colors">KOMUNITAS</span>
                            </div>
                            <h3
                                class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-emerald-600 transition-colors">
                                Ribuan Member</h3>
                            <p class="text-slate-600 leading-relaxed mb-4">Bergabung dengan komunitas yang saling membantu
                                dan berbagi pengetahuan</p>

                            <div
                                class="flex items-center gap-2 text-emerald-600 font-semibold opacity-0 group-hover:opacity-100 transform translate-x-0 group-hover:translate-x-2 transition-all duration-300">
                                <span>Lihat Komunitas</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </div>
                        </div>
                    </article>

                    <article
                        class="observe-fade group relative bg-linear-to-br from-amber-50 to-white rounded-2xl p-8 border border-amber-100 hover-lift cursor-pointer overflow-hidden stagger-2">
                        <div
                            class="absolute inset-0 bg-linear-to-br from-amber-100 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>

                        <div
                            class="absolute top-4 right-4 w-16 h-16 bg-amber-500 rounded-2xl flex items-center justify-center group-hover:rotate-12 group-hover:scale-110 transition-all duration-500 shadow-lg group-hover:shadow-2xl animate-float-slow">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>

                        <div class="relative">
                            <div class="mb-4">
                                <span
                                    class="inline-block px-3 py-1 bg-amber-100 text-amber-700 text-xs font-bold rounded-full group-hover:bg-amber-200 transition-colors">BERAGAM</span>
                            </div>
                            <h3
                                class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-amber-600 transition-colors">
                                50+ Kategori</h3>
                            <p class="text-slate-600 leading-relaxed mb-4">Dari teknologi hingga lifestyle, temukan jawaban
                                untuk semua topik</p>

                            <div
                                class="flex items-center gap-2 text-amber-600 font-semibold opacity-0 group-hover:opacity-100 transform translate-x-0 group-hover:translate-x-2 transition-all duration-300">
                                <span>Jelajahi Kategori</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </div>
                        </div>
                    </article>

                </div>
            </div>
        </div>
    </section>

    <section id="tutorial" class="section-padding bg-slate-50 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-200 rounded-full blur-3xl opacity-20 animate-float-slow">
        </div>
        <div
            class="absolute bottom-0 left-0 w-96 h-96 bg-emerald-200 rounded-full blur-3xl opacity-20 animate-float-medium">
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl relative">
            <div class="max-w-7xl mx-auto">

                <div class="text-center mb-20 observe-fade">
                    <span
                        class="inline-block px-4 py-2 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-700 mb-6 hover:shadow-lg transition-shadow cursor-default">
                        Cara Kerja
                    </span>
                    <h2 class="text-4xl lg:text-5xl xl:text-6xl font-black text-slate-900 mb-6">
                        <span class="inline-block hover:text-blue-600 transition-colors cursor-default">Tiga</span>
                        <span class="inline-block hover:text-emerald-600 transition-colors cursor-default">Langkah</span>
                        <span class="inline-block hover:text-purple-600 transition-colors cursor-default">Mudah</span>
                    </h2>
                    <p class="text-xl text-slate-600 max-w-2xl mx-auto">
                        Mulai berbagi pengetahuan hanya dalam tiga langkah sederhana
                    </p>
                </div>

                <div class="space-y-24">

                    <div class="grid md:grid-cols-12 gap-8 lg:gap-12 items-center observe-fade">
                        <div class="md:col-span-5 space-y-6">
                            <div
                                class="inline-flex items-center justify-center w-20 h-20 bg-linear-to-br from-blue-500 to-blue-600 text-white rounded-3xl font-black text-3xl shadow-xl hover:scale-110 hover:rotate-6 transition-all duration-300 cursor-pointer">
                                1
                            </div>
                            <h3
                                class="text-3xl lg:text-4xl font-bold text-slate-900 hover:text-blue-600 transition-colors cursor-default">
                                Ajukan Pertanyaan</h3>
                            <p class="text-lg text-slate-600 leading-relaxed">
                                Tulis pertanyaan Anda dengan jelas, tambahkan kategori yang sesuai, dan bagikan ke komunitas
                            </p>
                            <ul class="space-y-3">
                                <li
                                    class="flex items-start gap-3 group cursor-default opacity-0 animate-fade-in stagger-1">
                                    <div
                                        class="w-6 h-6 bg-blue-100 rounded-lg flex items-center justify-center shrink-0 group-hover:bg-blue-200 transition-colors">
                                        <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" />
                                        </svg>
                                    </div>
                                    <span class="text-slate-700">Editor teks yang mudah digunakan</span>
                                </li>
                                <li
                                    class="flex items-start gap-3 group cursor-default opacity-0 animate-fade-in stagger-2">
                                    <div
                                        class="w-6 h-6 bg-blue-100 rounded-lg flex items-center justify-center shrink-0 group-hover:bg-blue-200 transition-colors">
                                        <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" />
                                        </svg>
                                    </div>
                                    <span class="text-slate-700">Upload gambar untuk penjelasan lebih detail</span>
                                </li>
                                <li
                                    class="flex items-start gap-3 group cursor-default opacity-0 animate-fade-in stagger-3">
                                    <div
                                        class="w-6 h-6 bg-blue-100 rounded-lg flex items-center justify-center shrink-0 group-hover:bg-blue-200 transition-colors">
                                        <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" />
                                        </svg>
                                    </div>
                                    <span class="text-slate-700">Pilih kategori yang tepat</span>
                                </li>
                            </ul>
                        </div>
                        <div class="md:col-span-7">
                            <div
                                class="relative bg-white rounded-3xl border-2 border-slate-200 p-6 lg:p-8 shadow-2xl hover:shadow-3xl transition-all duration-500 hover:-translate-y-2 group">
                                <div
                                    class="absolute inset-0 bg-linear-to-br from-blue-500/0 to-blue-500/0 group-hover:from-blue-500/5 group-hover:to-blue-500/10 rounded-3xl transition-all duration-500">
                                </div>

                                <div class="relative space-y-4">
                                    <div
                                        class="flex items-start gap-4 group/card cursor-pointer hover:bg-blue-50 p-4 rounded-xl transition-colors">
                                        <div
                                            class="w-12 h-12 bg-linear-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold hover:scale-110 transition-transform">
                                            JK
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-slate-900 mb-2 text-lg">Bagaimana cara belajar
                                                Laravel untuk pemula?</h4>
                                            <p class="text-sm text-slate-600 mb-3 leading-relaxed">Saya ingin mulai belajar
                                                Laravel tapi bingung harus mulai dari mana. Apakah ada roadmap atau tutorial
                                                yang direkomendasikan?</p>
                                            <div class="flex items-center gap-2 flex-wrap">
                                                <span
                                                    class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full hover:bg-blue-200 transition-colors cursor-pointer">Laravel</span>
                                                <span
                                                    class="px-3 py-1 bg-emerald-100 text-emerald-700 text-xs font-semibold rounded-full hover:bg-emerald-200 transition-colors cursor-pointer">Pemula</span>
                                                <span
                                                    class="px-3 py-1 bg-purple-100 text-purple-700 text-xs font-semibold rounded-full hover:bg-purple-200 transition-colors cursor-pointer">PHP</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-12 gap-8 lg:gap-12 items-center observe-fade">
                        <div class="md:col-span-5 md:order-2 space-y-6">
                            <div
                                class="inline-flex items-center justify-center w-20 h-20 bg-linear-to-br from-emerald-500 to-emerald-600 text-white rounded-3xl font-black text-3xl shadow-xl hover:scale-110 hover:rotate-6 transition-all duration-300 cursor-pointer">
                                2
                            </div>
                            <h3
                                class="text-3xl lg:text-4xl font-bold text-slate-900 hover:text-emerald-600 transition-colors cursor-default">
                                Terima Jawaban</h3>
                            <p class="text-lg text-slate-600 leading-relaxed">
                                Komunitas akan membantu menjawab pertanyaan Anda dengan berbagai perspektif dan solusi
                            </p>
                            <ul class="space-y-3">
                                <li
                                    class="flex items-start gap-3 group cursor-default opacity-0 animate-fade-in stagger-2">
                                    <div
                                        class="w-6 h-6 bg-emerald-100 rounded-lg flex items-center justify-center shrink-0 group-hover:bg-emerald-200 transition-colors">
                                        <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" />
                                        </svg>
                                    </div>
                                    <span class="text-slate-700">Berbagai perspektif dari expert</span>
                                </li>
                                <li
                                    class="flex items-start gap-3 group cursor-default opacity-0 animate-fade-in stagger-3">
                                    <div
                                        class="w-6 h-6 bg-emerald-100 rounded-lg flex items-center justify-center shrink-0 group-hover:bg-emerald-200 transition-colors">
                                        <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" />
                                        </svg>
                                    </div>
                                    <span class="text-slate-700">Diskusi lanjutan untuk klarifikasi</span>
                                </li>
                            </ul>
                        </div>
                        <div class="md:col-span-7 md:order-1">
                            <div
                                class="relative bg-white rounded-3xl border-2 border-slate-200 p-6 lg:p-8 shadow-2xl hover:shadow-3xl transition-all duration-500 hover:-translate-y-2 group">
                                <div
                                    class="absolute inset-0 bg-linear-to-br from-emerald-500/0 to-emerald-500/0 group-hover:from-emerald-500/5 group-hover:to-emerald-500/10 rounded-3xl transition-all duration-500">
                                </div>

                                <div class="relative space-y-4">
                                    <div
                                        class="flex items-start gap-4 p-5 bg-linear-to-br from-emerald-50 to-white rounded-2xl border border-emerald-200 hover:shadow-lg transition-all duration-300 cursor-pointer group/answer">
                                        <div
                                            class="w-10 h-10 bg-linear-to-br from-emerald-500 to-emerald-600 rounded-full flex items-center justify-center shrink-0 text-white font-bold group-hover/answer:scale-110 transition-transform">
                                            JD
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex items-center gap-2 mb-2">
                                                <span class="font-bold text-slate-900">John Doe</span>
                                                <span
                                                    class="px-2 py-0.5 bg-amber-100 text-amber-700 text-xs font-bold rounded">Expert</span>
                                                <span class="text-xs text-slate-500">2 menit lalu</span>
                                            </div>
                                            <p class="text-sm text-slate-700 mb-3 leading-relaxed">Mulai dari dokumentasi
                                                official Laravel. Install via Composer, lalu pelajari routing dan
                                                controllers dulu. Setelah itu baru masuk ke Eloquent dan Blade...</p>
                                            <div class="flex items-center gap-4 text-xs">
                                                <button
                                                    class="flex items-center gap-1 text-emerald-600 hover:text-emerald-700 font-semibold transition-colors">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                                    </svg>
                                                    <span>12</span>
                                                </button>
                                                <button
                                                    class="text-slate-500 hover:text-slate-700 font-semibold transition-colors">
                                                    Balas
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="flex items-start gap-4 p-5 bg-slate-50 rounded-2xl hover:shadow-lg transition-all duration-300 cursor-pointer group/answer">
                                        <div
                                            class="w-10 h-10 bg-linear-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center shrink-0 text-white font-bold group-hover/answer:scale-110 transition-transform">
                                            AS
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex items-center gap-2 mb-2">
                                                <span class="font-bold text-slate-900">Alice Smith</span>
                                                <span class="text-xs text-slate-500">5 menit lalu</span>
                                            </div>
                                            <p class="text-sm text-slate-700 mb-3 leading-relaxed">Saya rekomendasikan
                                                Laracasts untuk belajar. Video tutorialnya bagus untuk pemula dan ada
                                                subtitle Indonesia juga...</p>
                                            <div class="flex items-center gap-4 text-xs">
                                                <button
                                                    class="flex items-center gap-1 text-slate-600 hover:text-emerald-600 font-semibold transition-colors">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                                    </svg>
                                                    <span>8</span>
                                                </button>
                                                <button
                                                    class="text-slate-500 hover:text-slate-700 font-semibold transition-colors">
                                                    Balas
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-12 gap-8 lg:gap-12 items-center observe-fade">
                        <div class="md:col-span-5 space-y-6">
                            <div
                                class="inline-flex items-center justify-center w-20 h-20 bg-linear-to-br from-amber-500 to-amber-600 text-white rounded-3xl font-black text-3xl shadow-xl hover:scale-110 hover:rotate-6 transition-all duration-300 cursor-pointer">
                                3
                            </div>
                            <h3
                                class="text-3xl lg:text-4xl font-bold text-slate-900 hover:text-amber-600 transition-colors cursor-default">
                                Berkembang Bersama</h3>
                            <p class="text-lg text-slate-600 leading-relaxed">
                                Tandai jawaban terbaik, beri upvote, dan bantu orang lain dengan berbagi pengetahuan Anda
                            </p>
                            <ul class="space-y-3">
                                <li
                                    class="flex items-start gap-3 group cursor-default opacity-0 animate-fade-in stagger-3">
                                    <div
                                        class="w-6 h-6 bg-amber-100 rounded-lg flex items-center justify-center shrink-0 group-hover:bg-amber-200 transition-colors">
                                        <svg class="w-4 h-4 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" />
                                        </svg>
                                    </div>
                                    <span class="text-slate-700">Bantu orang lain dengan menjawab</span>
                                </li>
                                <li
                                    class="flex items-start gap-3 group cursor-default opacity-0 animate-fade-in stagger-4">
                                    <div
                                        class="w-6 h-6 bg-amber-100 rounded-lg flex items-center justify-center shrink-0 group-hover:bg-amber-200 transition-colors">
                                        <svg class="w-4 h-4 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" />
                                        </svg>
                                    </div>
                                    <span class="text-slate-700">Dapatkan koneksi berharga</span>
                                </li>
                                <li
                                    class="flex items-start gap-3 group cursor-default opacity-0 animate-fade-in stagger-5">
                                    <div
                                        class="w-6 h-6 bg-amber-100 rounded-lg flex items-center justify-center shrink-0 group-hover:bg-amber-200 transition-colors">
                                        <svg class="w-4 h-4 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" />
                                        </svg>
                                    </div>
                                    <span class="text-slate-700">Jadilah bagian dari komunitas belajar</span>
                                </li>
                            </ul>
                        </div>
                        <div class="md:col-span-7">
                            <div
                                class="relative bg-white rounded-3xl border-2 border-slate-200 p-6 lg:p-8 shadow-2xl hover:shadow-3xl transition-all duration-500 hover:-translate-y-2 group">
                                <div
                                    class="absolute inset-0 bg-linear-to-br from-amber-500/0 to-amber-500/0 group-hover:from-amber-500/5 group-hover:to-amber-500/10 rounded-3xl transition-all duration-500">
                                </div>

                                <div class="relative">
                                    <div class="flex items-center justify-between mb-6">
                                        <div class="flex items-center gap-3">
                                            <button
                                                class="group/btn flex items-center gap-2 px-5 py-3 bg-linear-to-r from-emerald-50 to-emerald-100 text-emerald-600 rounded-xl hover:from-emerald-100 hover:to-emerald-200 transition-all font-bold shadow-lg hover:shadow-xl hover:scale-105">
                                                <svg class="w-5 h-5 group-hover/btn:scale-110 transition-transform"
                                                    fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                                </svg>
                                                <span class="font-bold">12</span>
                                            </button>
                                            <button
                                                class="group/btn flex items-center gap-2 px-5 py-3 bg-linear-to-r from-amber-50 to-amber-100 text-amber-600 rounded-xl hover:from-amber-100 hover:to-amber-200 transition-all font-bold shadow-lg hover:shadow-xl hover:scale-105">
                                                <svg class="w-5 h-5 group-hover/btn:rotate-12 transition-transform"
                                                    fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                                <span class="font-bold">Terbaik</span>
                                            </button>
                                        </div>
                                        <span
                                            class="px-4 py-2 bg-linear-to-r from-green-100 to-emerald-100 text-green-700 text-sm font-bold rounded-xl flex items-center gap-2 shadow-lg animate-pulse">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" />
                                            </svg>
                                            <span>Terselesaikan</span>
                                        </span>
                                    </div>

                                    <div
                                        class="p-6 bg-linear-to-br from-blue-50 via-emerald-50 to-purple-50 rounded-2xl border border-blue-100 hover:shadow-lg transition-all cursor-pointer">
                                        <div class="flex items-start gap-4 mb-4">
                                            <div
                                                class="w-12 h-12 bg-linear-to-br from-orange-500 to-amber-500 rounded-full flex items-center justify-center text-white font-bold hover:scale-110 transition-transform">
                                                JK
                                            </div>
                                            <div class="flex-1">
                                                <p class="text-slate-700 font-medium leading-relaxed">
                                                    Terima kasih banyak! Jawaban dari <span
                                                        class="text-blue-600 font-bold">@johndoe</span> sangat membantu.
                                                    Sekarang saya sudah mulai belajar Laravel dan membuat project pertama
                                                    saya!
                                                </p>
                                            </div>
                                        </div>

                                        <div
                                            class="flex items-center gap-6 text-sm text-slate-600 pt-4 border-t border-slate-200">
                                            <div class="flex items-center gap-2">
                                                <svg class="w-5 h-5 text-blue-500" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    <path fill-rule="evenodd"
                                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" />
                                                </svg>
                                                <span class="font-semibold">245 views</span>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <svg class="w-5 h-5 text-emerald-500" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                                                </svg>
                                                <span class="font-semibold">12 answers</span>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <svg class="w-5 h-5 text-purple-500" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" />
                                                </svg>
                                                <span class="font-semibold">2 hours ago</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <section
        class="relative bg-linear-to-br from-slate-900 via-slate-800 to-slate-900 text-white overflow-hidden py-20 lg:py-32"
        id="komunitas">
        <div class="absolute inset-0 bg-grid-white opacity-5"></div>

        <div class="absolute top-0 left-0 w-96 h-96 bg-blue-500 rounded-full blur-3xl opacity-20 animate-blob"></div>
        <div
            class="absolute bottom-0 right-0 w-96 h-96 bg-emerald-500 rounded-full blur-3xl opacity-20 animate-blob animation-delay-2000">
        </div>
        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-purple-500 rounded-full blur-3xl opacity-10 animate-blob animation-delay-4000">
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl relative">
            <div class="max-w-4xl mx-auto text-center space-y-8 observe-fade">

                <div
                    class="inline-flex items-center gap-2 px-5 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full hover:bg-white/20 transition-all cursor-pointer group">
                    <svg class="w-5 h-5 text-emerald-400 group-hover:rotate-12 transition-transform" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" />
                    </svg>
                    <span class="text-sm font-bold">100% Gratis Selamanya</span>
                </div>

                <h2 class="text-4xl lg:text-5xl xl:text-6xl font-black leading-tight">
                    <span class="inline-block hover:scale-105 transition-transform cursor-default text-white">Siap</span>
                    <span
                        class="inline-block hover:scale-105 transition-transform cursor-default text-white">Bergabung</span>
                    <span class="inline-block hover:scale-105 transition-transform cursor-default text-white">dengan</span>
                    <br>
                    <span
                        class="inline-block bg-linear-to-r from-blue-400 via-emerald-400 to-purple-400 bg-clip-text text-transparent animate-gradient-text">
                        Komunitas Tanya.in?
                    </span>
                </h2>

                <p class="text-xl lg:text-2xl text-slate-300 max-w-2xl mx-auto leading-relaxed">
                    Ribuan orang sudah menemukan jawaban mereka di sini. Sekarang giliran Anda!
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center pt-6">
                    <a href="{{ route('auth.register') }}"
                        class="group relative inline-flex items-center justify-center px-8 py-5 bg-white text-slate-900 rounded-2xl font-bold text-lg overflow-hidden hover:scale-105 transition-all shadow-2xl hover:shadow-3xl">
                        <div
                            class="absolute inset-0 w-full h-full bg-linear-to-r from-transparent via-blue-200/50 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                        </div>

                        <span class="relative">Daftar Sekarang</span>
                        <svg class="relative w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                    <a href="{{ route('auth.register') }}"
                        class="group inline-flex items-center justify-center px-8 py-5 border-2 border-white text-white rounded-2xl font-bold text-lg hover:bg-white hover:text-slate-900 transition-all hover:scale-105">
                        <span>Sudah Punya Akun?</span>
                    </a>
                </div>

                <div class="flex flex-wrap justify-center items-center gap-8 pt-12 text-slate-400">
                    <div class="flex items-center gap-2 group cursor-pointer hover:text-emerald-400 transition-colors">
                        <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" />
                        </svg>
                        <span class="font-semibold">Gratis Forever</span>
                    </div>
                    <div class="flex items-center gap-2 group cursor-pointer hover:text-emerald-400 transition-colors">
                        <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" />
                        </svg>
                        <span class="font-semibold">Tanpa Iklan</span>
                    </div>
                    <div class="flex items-center gap-2 group cursor-pointer hover:text-emerald-400 transition-colors">
                        <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" />
                        </svg>
                        <span class="font-semibold">Privasi Terjaga</span>
                    </div>
                    <div class="flex items-center gap-2 group cursor-pointer hover:text-emerald-400 transition-colors">
                        <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" />
                        </svg>
                        <span class="font-semibold">Komunitas Aktif</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
