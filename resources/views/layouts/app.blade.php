<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <script>document.documentElement.setAttribute('data-design-mode', 'liquid-glass');</script>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'NexaGTM') }} Portal</title>

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
    <body class="font-sans bg-[#0d1117] text-[#e6edf3] h-screen overflow-hidden antialiased selection:bg-[#3fb950] selection:text-black">
        
        <div x-data="{ sidebarOpen: false }" class="h-full flex overflow-hidden">
            
            <!-- Sidebar (In-flow on Desktop, Fixed Slide-over on Mobile) -->
            @include('layouts.sidebar')

            <!-- Main Content Shell -->
            <div class="flex-1 flex flex-col min-w-0 overflow-hidden transition-all duration-300">
                
                <!-- Top Dashboard Header (Sticky, Single Row) -->
                @include('layouts.header')

                <!-- Main Page Content (Scrolls independently, sidebar stays fixed) -->
                <main class="flex-1 overflow-y-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $slot }}

                    <!-- Minimal Dashboard Footer -->
                    <footer class="py-6 mt-10 border-t border-[#30363d]/40 text-center text-xs text-[#8b949e]">
                        &copy; {{ date('Y') }} NexaGTM. Enterprise Outbound &amp; Pipeline Engine.
                    </footer>
                </main>

            </div>

        </div>

    </body>
</html>
