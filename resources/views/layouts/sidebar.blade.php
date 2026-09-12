<!-- Mobile Backdrop -->
<div x-show="sidebarOpen" 
     x-transition:enter="transition-opacity ease-linear duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition-opacity ease-linear duration-300"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     @click="sidebarOpen = false"
     class="fixed inset-0 bg-black/80 z-40 lg:hidden backdrop-blur-sm"
     style="display: none;"
     aria-hidden="true">
</div>

<!-- Sidebar Drawer -->
<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
       class="app-rail fixed inset-y-0 left-0 z-50 w-64 xl:w-72 bg-[#161b22] border-r border-[#30363d] flex flex-col justify-between transition-transform duration-300 ease-in-out lg:static lg:inset-auto lg:z-auto lg:translate-x-0 lg:h-full">
    
    <!-- Top Section: Brand & Nav Links -->
    <div class="flex-1 flex flex-col min-h-0 overflow-y-auto">
        
        <!-- Brand Header -->
        <div class="h-16 px-6 flex items-center justify-between border-b border-[#30363d] bg-[#0d1117]/50">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                <div class="w-9 h-9 bg-[#3fb950] rounded-xl flex items-center justify-center shadow-[0_0_15px_rgba(63,185,80,0.35)] group-hover:rotate-12 transition-transform duration-300">
                    <img src="{{ asset('pic/logo.png') }}" alt="NexaGTM" class="w-5 h-5 object-contain" onerror="this.onerror=null; this.src='{{ asset('pic/logo.svg') }}'">
                </div>
                <div class="flex flex-col">
                    <span class="text-lg font-black text-white tracking-tight leading-none">
                        Nexa<span class="text-[#3fb950]">GTM</span>
                    </span>
                    <span class="text-[9px] font-bold uppercase tracking-widest text-[#8a9e8a] mt-0.5">Portal</span>
                </div>
            </a>

            <!-- Mobile Close Button -->
            <button @click="sidebarOpen = false" class="lg:hidden p-1.5 rounded-lg text-[#8b949e] hover:text-white hover:bg-[#21262d] focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Workspace Pill Card -->
        <div class="p-4 border-b border-[#30363d]/60">
            <div class="p-3 rounded-xl bg-[#0d1117] border border-[#30363d] flex items-center gap-3 shadow-inner">
                <div class="w-8 h-8 rounded-lg bg-[#3fb950]/15 border border-[#3fb950]/30 text-[#3fb950] flex items-center justify-center font-bold text-xs uppercase">
                    {{ substr(Auth::user()->company ?: Auth::user()->name, 0, 2) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-xs font-bold text-white truncate">
                        {{ Auth::user()->company ?: (Auth::user()->name . '\'s Workspace') }}
                    </p>
                    <div class="flex items-center gap-1.5 mt-0.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#3fb950] animate-pulse"></span>
                        <span class="text-[10px] text-[#8a9e8a] font-mono uppercase">Engine Active</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Links -->
        <nav class="flex-1 px-3 py-4 space-y-6">
            
            <!-- Group 1: Main Platform -->
            <div>
                <p class="px-3 text-[10px] font-extrabold uppercase tracking-widest text-[#8b949e] mb-2">
                    Core Platform
                </p>
                <div class="space-y-1">
                    
                    <!-- Dashboard Link -->
                    <a href="{{ route('dashboard') }}" 
                       class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-[#3fb950]/15 text-[#3fb950] border-l-4 border-[#3fb950] shadow-[0_0_15px_rgba(63,185,80,0.1)]' : 'text-[#c9d1d9] hover:text-white hover:bg-[#21262d] border-l-4 border-transparent' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('dashboard') ? 'text-[#3fb950]' : 'text-[#8b949e]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <span>Dashboard</span>
                    </a>

                    <!-- Book a Call Link -->
                    <a href="{{ route('nexagtm.book-call') }}" 
                       class="flex items-center justify-between px-3 py-2.5 rounded-xl text-xs font-bold transition-all duration-200 {{ request()->routeIs('nexagtm.book-call') ? 'bg-[#3fb950]/15 text-[#3fb950] border-l-4 border-[#3fb950] shadow-[0_0_15px_rgba(63,185,80,0.1)]' : 'text-[#c9d1d9] hover:text-white hover:bg-[#21262d] border-l-4 border-transparent' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 {{ request()->routeIs('nexagtm.book-call') ? 'text-[#3fb950]' : 'text-[#8b949e]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>Book Strategy Call</span>
                        </div>
                        <span class="text-[9px] px-1.5 py-0.5 rounded-full bg-[#3fb950]/20 text-[#3fb950] font-mono font-bold uppercase">Free</span>
                    </a>

                    <!-- Playbooks Link -->
                    <a href="{{ route('nexagtm.gtm-playbooks') }}" 
                       class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition-all duration-200 {{ request()->routeIs('nexagtm.gtm-playbooks') ? 'bg-[#3fb950]/15 text-[#3fb950] border-l-4 border-[#3fb950] shadow-[0_0_15px_rgba(63,185,80,0.1)]' : 'text-[#c9d1d9] hover:text-white hover:bg-[#21262d] border-l-4 border-transparent' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('nexagtm.gtm-playbooks') ? 'text-[#3fb950]' : 'text-[#8b949e]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        <span>GTM Playbooks</span>
                    </a>

                    <!-- Testimonials Link -->
                    <a href="{{ route('dashboard.testimonials') }}" 
                       class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition-all duration-200 {{ request()->routeIs('dashboard.testimonials*') ? 'bg-[#3fb950]/15 text-[#3fb950] border-l-4 border-[#3fb950] shadow-[0_0_15px_rgba(63,185,80,0.1)]' : 'text-[#c9d1d9] hover:text-white hover:bg-[#21262d] border-l-4 border-transparent' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('dashboard.testimonials*') ? 'text-[#3fb950]' : 'text-[#8b949e]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        <span>Testimonials</span>
                    </a>

                </div>
            </div>

            <!-- Group 2: Growth & Services -->
            <div>
                <p class="px-3 text-[10px] font-extrabold uppercase tracking-widest text-[#8b949e] mb-2">
                    Services & Billing
                </p>
                <div class="space-y-1">
                    
                    <a href="{{ route('nexagtm.price') }}" 
                       class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition-all duration-200 {{ request()->routeIs('nexagtm.price') ? 'bg-[#3fb950]/15 text-[#3fb950] border-l-4 border-[#3fb950]' : 'text-[#c9d1d9] hover:text-white hover:bg-[#21262d] border-l-4 border-transparent' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('nexagtm.price') ? 'text-[#3fb950]' : 'text-[#8b949e]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                        </svg>
                        <span>Pricing & Plans</span>
                    </a>

                    <a href="{{ route('nexagtm.contact') }}" 
                       class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition-all duration-200 {{ request()->routeIs('nexagtm.contact') ? 'bg-[#3fb950]/15 text-[#3fb950] border-l-4 border-[#3fb950]' : 'text-[#c9d1d9] hover:text-white hover:bg-[#21262d] border-l-4 border-transparent' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('nexagtm.contact') ? 'text-[#3fb950]' : 'text-[#8b949e]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        <span>Contact Agency</span>
                    </a>

                    <a href="{{ route('home') }}" target="_blank"
                       class="flex items-center justify-between px-3 py-2.5 rounded-xl text-xs font-bold text-[#8b949e] hover:text-white hover:bg-[#21262d] transition-all duration-200 border-l-4 border-transparent">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 text-[#8b949e]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                            <span>Live Marketing Site</span>
                        </div>
                        <svg class="w-3.5 h-3.5 text-[#8b949e]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>

                </div>
            </div>

            <!-- Group 3: Account Settings -->
            <div>
                <p class="px-3 text-[10px] font-extrabold uppercase tracking-widest text-[#8b949e] mb-2">
                    Account
                </p>
                <div class="space-y-1">
                    <a href="{{ route('profile.edit') }}" 
                       class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition-all duration-200 {{ request()->routeIs('profile.edit') ? 'bg-[#3fb950]/15 text-[#3fb950] border-l-4 border-[#3fb950]' : 'text-[#c9d1d9] hover:text-white hover:bg-[#21262d] border-l-4 border-transparent' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('profile.edit') ? 'text-[#3fb950]' : 'text-[#8b949e]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>Profile & Security</span>
                    </a>
                </div>
            </div>

        </nav>

    </div>

    <!-- Bottom User Profile Footer Card -->
    <div class="p-4 border-t border-[#30363d] bg-[#0d1117]/60">
        <div class="flex items-center justify-between gap-3">
            <div class="flex items-center gap-2.5 min-w-0">
                <div class="w-9 h-9 rounded-full bg-[#3fb950]/20 text-[#3fb950] border border-[#3fb950]/40 flex items-center justify-center font-black text-sm uppercase flex-shrink-0">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div class="min-w-0">
                    <p class="text-xs font-bold text-white truncate">{{ Auth::user()->name }}</p>
                    <p class="text-[11px] text-[#8a9e8a] truncate">{{ Auth::user()->email }}</p>
                </div>
            </div>

            <!-- Logout Form -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" title="Log Out" class="p-2 rounded-lg text-[#8b949e] hover:text-red-400 hover:bg-red-500/10 border border-transparent hover:border-red-500/20 transition-all focus:outline-none cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>

</aside>
