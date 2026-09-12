<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'NexaGTM') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&family=JetBrains+Mono:wght@400;600;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- NexaGTM Master Design Systems Engine -->
        <link rel="stylesheet" href="{{ asset('css/design-systems.css') }}">
        <script src="{{ asset('js/design-systems.js') }}" defer></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans bg-[#0d1117] text-white min-h-screen antialiased selection:bg-[#3fb950] selection:text-black">
        <div class="relative min-h-screen flex flex-col justify-center items-center py-12 px-4 sm:px-6 lg:px-8 overflow-hidden">
            <!-- Ambient Glow Elements -->
            <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-[#3fb950]/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-20 -right-20 w-96 h-96 bg-[#163821]/40 rounded-full blur-3xl pointer-events-none"></div>

            <!-- Brand Logo -->
            <div class="relative z-10 mb-8 transition transform hover:scale-105">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="clay-badge w-12 h-12 flex items-center justify-center">
                        <img src="{{ asset('pic/logo.svg') }}" alt="NexaGTM" class="w-7 h-7 object-contain">
                    </div>
                    <span class="text-3xl font-black text-white tracking-tight">
                        Nexa<span class="text-[#3fb950]">GTM</span>
                    </span>
                </a>
            </div>

            <!-- Main Auth Card: Liquid Glass Card -->
            <div class="liquid-glass-card relative z-10 w-full sm:max-w-md px-6 py-8 sm:p-8 rounded-3xl">
                {{ $slot }}
            </div>

            <!-- Back to Home Link -->
            <div class="relative z-10 mt-8 text-center">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-widest text-[#8b949e] hover:text-[#3fb950] transition">
                    <span>←</span> {{ __('Back to NexaGTM Home') }}
                </a>
            </div>
        </div>
    </body>
</html>
