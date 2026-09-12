<header class="fixed top-5 inset-x-0 z-[100] px-4 sm:px-8 pointer-events-none">
  <div class="max-w-7xl mx-auto flex flex-col items-center">
    
    <!-- Main Floating Pill Navbar -->
    <nav class="w-full glass-nav relative px-6 sm:px-8 py-3 flex items-center justify-between rounded-full shadow-[0_16px_40px_rgba(0,0,0,0.65)] pointer-events-auto transition-all duration-300 hover:border-[#3fb950]/50 hover:shadow-[0_16px_40px_rgba(63,185,80,0.2)]">
      <span class="style-tag style-tag-glass">Glassmorphism</span>
      
      {{-- BRAND LOGO --}}
      <a href="{{ route('home') }}" class="flex items-center gap-3 group cursor-pointer relative">
        <div class="w-9 h-9 sm:w-10 sm:h-10 clay-badge flex items-center justify-center group-hover:rotate-[360deg] transition-transform duration-700 flex-shrink-0">
          <img src="{{ asset('pic/logo.png') }}" alt="NexaGTM Logo" class="w-5 h-5 sm:w-6 sm:h-6 object-contain">
        </div>
        <div class="flex items-center gap-2">
          <span class="text-lg sm:text-xl font-bold tracking-tight text-white">
            Nexa<span class="font-black text-[#3fb950]">GTM</span>
          </span>
          <span class="hidden md:inline-flex items-center gap-1.5 brutal-badge">
            <span class="skeuo-led"></span>
            <span>Outbound Engine</span>
          </span>
        </div>
      </a>

      {{-- DESKTOP NAVIGATION LINKS --}}
      <ul class="hidden lg:flex items-center space-x-1 text-xs font-semibold uppercase tracking-wider text-[#8b949e]">
        <li>
          <a href="{{ route('home') }}" 
             class="relative px-4 py-2 rounded-full transition-all duration-300 {{ request()->routeIs('home') ? 'text-white bg-white/10 font-bold' : 'hover:text-white hover:bg-white/5' }}">
            Home
          </a>
        </li>
        <li>
          <a href="{{ route('nexagtm.about') }}" 
             class="relative px-4 py-2 rounded-full transition-all duration-300 {{ request()->routeIs('nexagtm.about') ? 'text-white bg-white/10 font-bold' : 'hover:text-white hover:bg-white/5' }}">
            About
          </a>
        </li>
        <li>
          <a href="{{ route('nexagtm.price') }}" 
             class="relative px-4 py-2 rounded-full transition-all duration-300 {{ request()->routeIs('nexagtm.price') ? 'text-white bg-white/10 font-bold' : 'hover:text-white hover:bg-white/5' }}">
            Pricing
          </a>
        </li>      
        <li>
          <a href="{{ route('nexagtm.gtm-playbooks') }}" 
             class="relative px-4 py-2 rounded-full transition-all duration-300 {{ request()->routeIs('nexagtm.gtm-playbooks') ? 'text-white bg-white/10 font-bold' : 'hover:text-white hover:bg-white/5' }}">
            Playbooks
          </a>
        </li>
        <li>
          <a href="{{ route('nexagtm.contact') }}" 
             class="relative px-4 py-2 rounded-full transition-all duration-300 {{ request()->routeIs('nexagtm.contact') ? 'text-white bg-white/10 font-bold' : 'hover:text-white hover:bg-white/5' }}">
            Contact
          </a>
        </li>      
      </ul>

      {{-- RIGHT ACTIONS (DESKTOP) --}}
      <div class="hidden lg:flex items-center gap-3 relative">
        <a href="{{ route('nexagtm.book-call') }}" 
           class="skeuo-button relative px-6 py-2.5 text-white text-xs font-bold uppercase tracking-wider flex items-center gap-2">
          <span class="style-tag style-tag-skeuo">Skeuomorphism</span>
          <i class="fa-solid fa-calendar-days text-xs"></i>
          <span>Book a Call</span>
          <i class="fa-solid fa-arrow-right text-[10px] transition-transform duration-300 group-hover:translate-x-0.5"></i>
        </a>
      </div>

      {{-- MOBILE HAMBURGER BUTTON --}}
      <button id="mobile-menu-button" 
              class="lg:hidden neomorph-button flex items-center justify-center w-10 h-10 text-[#cbd5e1] hover:text-white transition-all focus:outline-none" 
              aria-label="Toggle Navigation Menu">
        <svg id="hamburger-open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
        <svg id="hamburger-close" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </button>

    </nav>

    <!-- MOBILE MENU DRAWER (SLIDE DOWN) -->
    <div id="mobile-menu" 
         class="lg:hidden hidden w-full mt-3 glass-card rounded-3xl p-6 shadow-[0_25px_60px_rgba(0,0,0,0.85)] pointer-events-auto transition-all animate-fade-in-up">
      <ul class="flex flex-col space-y-2 text-sm font-semibold uppercase tracking-wider text-[#cbd5e1]">
        <li>
          <a href="{{ route('home') }}" 
             class="flex items-center justify-between px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('home') ? 'bg-[#3fb950]/15 text-[#3fb950] font-bold' : 'hover:bg-white/5 hover:text-white' }}" 
             onclick="toggleMobileMenu(false)">
            <span>Home</span>
            <i class="fa-solid fa-chevron-right text-xs opacity-50"></i>
          </a>
        </li>
        <li>
          <a href="{{ route('nexagtm.about') }}" 
             class="flex items-center justify-between px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('nexagtm.about') ? 'bg-[#3fb950]/15 text-[#3fb950] font-bold' : 'hover:bg-white/5 hover:text-white' }}" 
             onclick="toggleMobileMenu(false)">
            <span>About</span>
            <i class="fa-solid fa-chevron-right text-xs opacity-50"></i>
          </a>
        </li>
        <li>
          <a href="{{ route('nexagtm.price') }}" 
             class="flex items-center justify-between px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('nexagtm.price') ? 'bg-[#3fb950]/15 text-[#3fb950] font-bold' : 'hover:bg-white/5 hover:text-white' }}" 
             onclick="toggleMobileMenu(false)">
            <span>Pricing</span>
            <i class="fa-solid fa-chevron-right text-xs opacity-50"></i>
          </a>
        </li>
        <li>
          <a href="{{ route('nexagtm.gtm-playbooks') }}" 
             class="flex items-center justify-between px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('nexagtm.gtm-playbooks') ? 'bg-[#3fb950]/15 text-[#3fb950] font-bold' : 'hover:bg-white/5 hover:text-white' }}" 
             onclick="toggleMobileMenu(false)">
            <span>Playbooks</span>
            <i class="fa-solid fa-chevron-right text-xs opacity-50"></i>
          </a>
        </li>
        <li>
          <a href="{{ route('nexagtm.contact') }}" 
             class="flex items-center justify-between px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('nexagtm.contact') ? 'bg-[#3fb950]/15 text-[#3fb950] font-bold' : 'hover:bg-white/5 hover:text-white' }}" 
             onclick="toggleMobileMenu(false)">
            <span>Contact</span>
            <i class="fa-solid fa-chevron-right text-xs opacity-50"></i>
          </a>
        </li>
        
        <li class="pt-4 border-t border-[#30363d]/80 space-y-3">
          <a href="{{ route('nexagtm.book-call') }}" 
             class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-[#3fb950] to-[#2ea043] text-white font-bold text-xs uppercase tracking-wider py-3.5 rounded-xl shadow-lg" 
             onclick="toggleMobileMenu(false)">
            <i class="fa-solid fa-calendar-days"></i>
            <span>Book a Strategy Call</span>
          </a>
          <a href="https://wa.me/923444543772" target="_blank" 
             class="w-full flex items-center justify-center gap-2 bg-[#161b22] border border-[#30363d] text-[#25D366] font-bold text-xs uppercase tracking-wider py-3 rounded-xl" 
             onclick="toggleMobileMenu(false)">
            <i class="fa-brands fa-whatsapp text-sm"></i>
            <span>Chat on WhatsApp</span>
          </a>
        </li>
      </ul>
    </div>

  </div>
</header>

<script>
  function toggleMobileMenu(show) {
    const menu = document.getElementById('mobile-menu');
    const openIcon = document.getElementById('hamburger-open');
    const closeIcon = document.getElementById('hamburger-close');
    if (!menu || !openIcon || !closeIcon) return;

    if (typeof show === 'boolean') {
      if (show) { 
        menu.classList.remove('hidden'); 
        openIcon.classList.add('hidden'); 
        closeIcon.classList.remove('hidden'); 
      } else { 
        menu.classList.add('hidden'); 
        openIcon.classList.remove('hidden'); 
        closeIcon.classList.add('hidden'); 
      }
      return;
    }
    const isHidden = menu.classList.contains('hidden');
    toggleMobileMenu(isHidden);
  }

  document.getElementById('mobile-menu-button')?.addEventListener('click', function(e) {
    e.stopPropagation();
    toggleMobileMenu();
  });

  // Hide mobile menu on larger screens
  window.addEventListener('resize', function() {
    if (window.innerWidth >= 1024) toggleMobileMenu(false);
  });
</script>