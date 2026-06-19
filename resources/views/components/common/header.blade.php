<div class="fixed top-6 inset-x-0 z-[100] px-6 lg:px-12 pointer-events-none">
  <nav class="max-w-7xl mx-auto bg-[#0d1117]/70 backdrop-blur-md border border-[#3fb950]/30 px-8 py-3 flex items-center justify-between rounded-full shadow-[0_10px_30px_rgba(0,0,0,0.5)] pointer-events-auto transition-all duration-500 hover:bg-[#0d1117]/80 hover:border-[#3fb950]/50">
    
    {{-- LOGO --}}
    <div class="flex items-center group cursor-pointer">
      <div class="w-10 h-10 bg-[#3fb950] rounded-full flex items-center justify-center mr-3 shadow-[0_0_15px_rgba(63,185,80,0.3)] group-hover:rotate-[360deg] transition-transform duration-1000">
        <img src="{{ asset('pic/logo.png') }}" alt="NexaGTM Logo" class="w-6 h-6">
      </div>
      <h1 class="text-xl font-bold text-white ">
        Nexa<span class="font-black text-[#3fb950]">GTM</span>
      </h1>
    </div>

{{-- NAV LINKS --}}
    <ul class="hidden lg:flex items-center space-x-1 text-[11px] font-bold uppercase tracking-[0.2em] text-[#8a9e8a]">
      <li>
        <a href="{{ route('home') }}" class="relative px-6 py-2 transition-all duration-300 group {{ request()->routeIs('home') ? 'text-white' : 'hover:text-white' }}">
          Home
          <span class="absolute bottom-0 left-1/2 -translate-x-1/2 h-[2px] bg-[#3fb950] transition-all duration-300 {{ request()->routeIs('home') ? 'w-4' : 'w-0 group-hover:w-4' }}"></span>
        </a>
      </li>
      <li>
        <a href="{{ route('nexagtm.about') }}" class="relative px-6 py-2 transition-all duration-300 group {{ request()->routeIs('nexagtm.about') ? 'text-white' : 'hover:text-white' }}">
          About
          <span class="absolute bottom-0 left-1/2 -translate-x-1/2 h-[2px] bg-[#3fb950] transition-all duration-300 {{ request()->routeIs('nexagtm.about') ? 'w-4' : 'w-0 group-hover:w-4' }}"></span>
        </a>
      </li>
      <li>
        <a href="{{ route('nexagtm.price') }}" class="relative px-6 py-2 transition-all duration-300 group {{ request()->routeIs('nexagtm.price') ? 'text-white' : 'hover:text-white' }}">
          Pricing
          <span class="absolute bottom-0 left-1/2 -translate-x-1/2 h-[2px] bg-[#3fb950] transition-all duration-300 {{ request()->routeIs('nexagtm.price') ? 'w-4' : 'w-0 group-hover:w-4' }}"></span>
        </a>
      </li>      
      <li>
        {{-- For anchor links like #case-studies, you can manually handle active states or leave as hover --}}
        <a href="{{ route('nexagtm.gtm-playbooks') }}" class="relative px-6 py-2 transition-all duration-300 group {{ request()->routeIs('nexagtm.gtm-playbooks') ? 'text-white' : 'hover:text-white' }}">
          Playbooks
          <span class="absolute bottom-0 left-1/2 -translate-x-1/2 h-[2px] bg-[#3fb950] transition-all duration-300 {{ request()->routeIs('nexagtm.gtm-playbooks') ? 'w-4' : 'w-0 group-hover:w-4' }}"></span>
        </a>
      </li>
      <li>
        <a href="{{ route('nexagtm.contact') }}" class="relative px-6 py-2 transition-all duration-300 group {{ request()->routeIs('nexagtm.contact') ? 'text-white' : 'hover:text-white' }}">
          Contact
          <span class="absolute bottom-0 left-1/2 -translate-x-1/2 h-[2px] bg-[#3fb950] transition-all duration-300 {{ request()->routeIs('nexagtm.contact') ? 'w-4' : 'w-0 group-hover:w-4' }}"></span>
        </a>
      </li>      
    </ul>

    <!-- Mobile hamburger -->
    <button id="mobile-menu-button" class="lg:hidden flex items-center ml-3 p-2 rounded-md text-[#cbd5e1] hover:text-white" aria-label="Open mobile menu">
      <svg id="hamburger-open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
      <svg id="hamburger-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
    </button>

    <div class="hidden lg:flex items-center">
      <a href="https://calendly.com/hammad1122/new-meeting" target="_blank" class="relative group overflow-hidden px-8 py-3 bg-[#3fb950] text-white text-[10px] font-bold uppercase tracking-[0.2em] rounded-full transition-all duration-300 hover:shadow-[0_0_20px_rgba(63,185,80,0.6)] hover:scale-105 flex items-center gap-2">
        <!-- Background hover effect -->
        <span class="absolute inset-0 w-full h-full bg-white/10 translate-x-full group-hover:translate-x-0 transition-transform duration-500"></span>
        <!-- Calendar SVG -->
        <svg class="w-3 h-3 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/>
        </svg>
        <!-- Text -->
        <span class="relative z-10">Book a Call</span>
      </a>
    </div>

  </div>

  <!-- Mobile menu (hidden on large screens) -->
  <div id="mobile-menu" class="lg:hidden hidden fixed inset-x-4 top-20 z-40 bg-[#0d1117]/95 backdrop-blur-md rounded-xl border border-[#3fb950]/20 p-6 shadow-2xl">
    <ul class="flex flex-col space-y-4 text-sm font-bold uppercase tracking-wider text-[#cbd5e1]">
      <li><a href="{{ route('home') }}" class="block px-3 py-2 rounded hover:text-white" onclick="toggleMobileMenu(false)">Home</a></li>
      <li><a href="{{ route('nexagtm.about') }}" class="block px-3 py-2 rounded hover:text-white" onclick="toggleMobileMenu(false)">Services</a></li>
      <li><a href="{{ route('nexagtm.price') }}" class="block px-3 py-2 rounded hover:text-white" onclick="toggleMobileMenu(false)">Pricing</a></li>
      <li><a href="{{ route('nexagtm.gtm-playbooks') }}" class="block px-3 py-2 rounded hover:text-white" onclick="toggleMobileMenu(false)">Playbooks</a></li>
      <li><a href="{{ route('nexagtm.contact') }}" class="block px-3 py-2 rounded hover:text-white" onclick="toggleMobileMenu(false)">Contact</a></li>
      <li class="pt-2 border-t border-[#2a3b45] mt-2">
        <a href="https://calendly.com/itxaman-786/30min" target="_blank" class="inline-block w-full text-center bg-[#3fb950] text-black font-bold px-4 py-2 rounded">Book a Call</a>
      </li>
    </ul>
  </div>

  <script>
    function toggleMobileMenu(show) {
      const menu = document.getElementById('mobile-menu');
      const openIcon = document.getElementById('hamburger-open');
      const closeIcon = document.getElementById('hamburger-close');
      if (typeof show === 'boolean') {
        if (show) { menu.classList.remove('hidden'); openIcon.classList.add('hidden'); closeIcon.classList.remove('hidden'); }
        else { menu.classList.add('hidden'); openIcon.classList.remove('hidden'); closeIcon.classList.add('hidden'); }
        return;
      }
      const isHidden = menu.classList.contains('hidden');
      toggleMobileMenu(isHidden);
    }

    document.getElementById('mobile-menu-button').addEventListener('click', function(e){ toggleMobileMenu(); });
    // Hide mobile menu on larger screens
    window.addEventListener('resize', function(){ if (window.innerWidth >= 1024) toggleMobileMenu(false); });
  </script>

  </nav>
</div>