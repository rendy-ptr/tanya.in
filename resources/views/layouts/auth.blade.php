<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Tanya.in') }} - @yield('title', 'Tanya Aja, Pasti Ada Jawabannya')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <a href="{{ route('home') }}"
        class="absolute top-6 left-6 inline-flex items-center text-slate-600 hover:text-blue-600 font-medium transition-colors group">
        <svg class="w-5 h-5 mr-1.5 text-slate-500 group-hover:text-blue-600 transition-colors" fill="none"
            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        <span>Kembali Ke Beranda</span>
    </a>


    <main>
        @yield('content')
    </main>

    @include('layouts.partials.footer')
</body>

</html>
