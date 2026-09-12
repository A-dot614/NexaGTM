<header class="app-topbar sticky top-0 z-30 h-16 shrink-0 bg-[#0d1117]/85 backdrop-blur-md border-b border-[#30363d] px-4 sm:px-6 lg:px-8 flex items-center justify-between gap-4 transition-all">
    
    <!-- Left: Mobile Trigger + Brand + Breadcrumb Title -->
    <div class="flex items-center gap-3 sm:gap-4 min-w-0">
        <!-- Mobile Sidebar Toggle -->
        <button @click="sidebarOpen = true" 
                type="button" 
                class="lg:hidden p-2 rounded-xl text-[#8b949e] hover:text-white hover:bg-[#21262d] border border-[#30363d] focus:outline-none transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <!-- Logo Chip (Desktop) -->
        <a href="{{ route('dashboard') }}" class="hidden md:flex items-center gap-2 shrink-0 group">
            <span class="w-7 h-7 rounded-lg bg-[#3fb950] flex items-center justify-center shadow-[0_0_12px_rgba(63,185,80,0.35)] group-hover:rotate-12 transition-transform duration-300">
                <img src="{{ asset('pic/logo.svg') }}" alt="NexaGTM" class="w-4 h-4 object-contain">
            </span>
            <span class="text-sm font-black tracking-tight text-white leading-none">Nexa<span class="text-[#3fb950]">GTM</span></span>
        </a>

        <!-- Breadcrumb / Page Title -->
        <div class="flex items-center gap-2 min-w-0 text-xs sm:text-sm">
            <span class="text-[#8b949e] hidden md:inline-block">Portal</span>
            <span class="text-[#30363d] hidden md:inline-block">/</span>
            <h1 class="font-bold text-white truncate">
                {!! $title ?? 'Dashboard Overview' !!}
            </h1>
        </div>
    </div>

    <!-- Right: Today's Date, Status & User Actions (Single Row) -->
    <div class="flex items-center gap-2.5 sm:gap-4 shrink-0">
        
        <!-- Today's Date (Wide desktops only to keep the single row tight) -->
        <div class="hidden xl:flex items-center gap-2 px-3 py-1.5 rounded-full bg-[#161b22]/60 border border-[#30363d]/70 text-xs font-mono font-semibold text-[#8a9e8a]">
            <span class="skeuo-led inline-block"></span>
            <span>{{ now()->format('l, F j, Y') }}</span>
        </div>

        <!-- Live Engine Status Badge (Desktop) -->
        <div class="hidden md:flex items-center gap-2 px-3 py-1.5 rounded-full bg-[#004b23]/30 border border-[#3fb950]/30 text-xs font-semibold text-[#3fb950]">
            <span class="relative flex h-2 w-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#3fb950] opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-[#3fb950]"></span>
            </span>
            <span>Engine Active</span>
        </div>

        <!-- User Profile Dropdown -->
        <div class="relative" x-data="{ userMenuOpen: false }">
            <button @click="userMenuOpen = !userMenuOpen" 
                    type="button" 
                    class="flex items-center gap-2.5 p-1 sm:px-3 sm:py-1.5 rounded-full bg-[#161b22] border border-[#30363d] hover:border-[#3fb950]/50 hover:bg-[#21262d] transition focus:outline-none cursor-pointer">
                <div class="w-7 h-7 rounded-full bg-[#3fb950]/20 text-[#3fb950] border border-[#3fb950]/40 flex items-center justify-center font-bold text-xs uppercase flex-shrink-0">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <span class="text-xs font-bold text-white hidden md:inline-block max-w-[100px] truncate">
                    {{ Auth::user()->name }}
                </span>
                <svg class="w-3.5 h-3.5 text-[#8b949e] hidden sm:inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            <!-- User Menu Flyout -->
            <div x-show="userMenuOpen" 
                 @click.away="userMenuOpen = false"
                 x-transition:enter="transition ease-out duration-150"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-100"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="absolute right-0 mt-2 w-56 rounded-2xl bg-[#161b22] border border-[#30363d] shadow-2xl py-2 z-50"
                 style="display: none;">
                
                <div class="px-4 py-2.5 border-b border-[#30363d]">
                    <p class="text-xs font-bold text-white truncate">{{ Auth::user()->name }}</p>
                    <p class="text-[11px] text-[#8a9e8a] truncate">{{ Auth::user()->email }}</p>
                </div>

                <div class="py-1">
                    <a href="{{ route('profile.edit') }}" 
                       class="flex items-center gap-2.5 px-4 py-2 text-xs font-semibold text-[#c9d1d9] hover:text-white hover:bg-[#21262d] transition">
                        <svg class="w-4 h-4 text-[#8a9e8a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <span>Profile & Security</span>
                    </a>

                    <a href="{{ route('home') }}" target="_blank"
                       class="flex items-center gap-2.5 px-4 py-2 text-xs font-semibold text-[#c9d1d9] hover:text-white hover:bg-[#21262d] transition">
                        <svg class="w-4 h-4 text-[#8a9e8a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                        <span>Visit Website</span>
                    </a>
                </div>

                <div class="pt-1 border-t border-[#30363d]">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" 
                                class="w-full flex items-center gap-2.5 px-4 py-2 text-xs font-semibold text-red-400 hover:text-red-300 hover:bg-red-500/10 transition cursor-pointer">
                            <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            <span>Log Out</span>
                        </button>
                    </form>
                </div>

            </div>
        </div>

    </div>

</header>