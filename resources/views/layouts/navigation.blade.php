<nav x-data="{ open: false }" class="glass-nav sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                        <div class="clay-badge w-9 h-9 flex items-center justify-center group-hover:rotate-12 transition-transform duration-300">
                            <img src="{{ asset('pic/logo.png') }}" alt="NexaGTM" class="w-5 h-5 object-contain" onerror="this.onerror=null; this.src='{{ asset('pic/logo.svg') }}'">
                        </div>
                        <span class="text-xl font-black text-white tracking-tight">
                            Nexa<span class="text-[#3fb950]">GTM</span>
                        </span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-1 sm:-my-px sm:ms-8 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('nexagtm.gtm-playbooks')" :active="request()->routeIs('nexagtm.gtm-playbooks')">
                        {{ __('Playbooks') }}
                    </x-nav-link>
                    <x-nav-link :href="route('nexagtm.price')" :active="request()->routeIs('nexagtm.price')">
                        {{ __('Pricing') }}
                    </x-nav-link>
                    <x-nav-link :href="route('nexagtm.contact')" :active="request()->routeIs('nexagtm.contact')">
                        {{ __('Contact') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Right Actions & Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 sm:space-x-4">
                <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold uppercase tracking-wider text-[#8b949e] hover:text-white hover:bg-[#21262d] border border-transparent hover:border-[#30363d] transition">
                    <span>Website</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-2.5 px-3 py-1.5 border border-[#30363d] text-xs font-semibold rounded-full text-gray-200 bg-[#21262d] hover:bg-[#30363d] hover:border-[#3fb950]/50 focus:outline-none transition ease-in-out duration-150 cursor-pointer shadow-sm">
                            <div class="w-6 h-6 rounded-full bg-[#3fb950]/20 text-[#3fb950] border border-[#3fb950]/40 flex items-center justify-center text-xs font-bold uppercase">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <span class="max-w-[120px] truncate">{{ Auth::user()->name }}</span>

                            <svg class="fill-current h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-2.5 border-b border-[#30363d]/80">
                            <p class="text-xs font-bold text-white truncate">{{ Auth::user()->name }}</p>
                            <p class="text-[11px] text-gray-400 truncate">{{ Auth::user()->email }}</p>
                        </div>

                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile & Settings') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class="text-red-400 hover:text-red-300">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger Button -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-lg text-gray-400 hover:text-white hover:bg-[#21262d] focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-[#30363d] bg-[#161b22]/98 px-2 pt-2 pb-4">
        <div class="space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('nexagtm.gtm-playbooks')" :active="request()->routeIs('nexagtm.gtm-playbooks')">
                {{ __('Playbooks') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('nexagtm.price')" :active="request()->routeIs('nexagtm.price')">
                {{ __('Pricing') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('nexagtm.contact')" :active="request()->routeIs('nexagtm.contact')">
                {{ __('Contact') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('home')">
                {{ __('Website') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-[#30363d] mt-3">
            <div class="px-4">
                <div class="font-bold text-sm text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-xs text-gray-400">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile & Settings') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            class="text-red-400">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
