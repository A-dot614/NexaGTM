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
        <a href="#case-studies" class="relative px-6 py-2 transition-all duration-300 hover:text-white group">
          Playbooks
          <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-[2px] bg-[#3fb950] group-hover:w-4 transition-all duration-300"></span>
        </a>
      </li>
      <li>
        <a href="{{ route('nexagtm.contact') }}" class="relative px-6 py-2 transition-all duration-300 group {{ request()->routeIs('nexagtm.contact') ? 'text-white' : 'hover:text-white' }}">
          Contact
          <span class="absolute bottom-0 left-1/2 -translate-x-1/2 h-[2px] bg-[#3fb950] transition-all duration-300 {{ request()->routeIs('nexagtm.contact') ? 'w-4' : 'w-0 group-hover:w-4' }}"></span>
        </a>
      </li>      
    </ul>

    {{-- CTA --}}
    <div class="flex items-center">
      <a href="#" class="relative group overflow-hidden px-8 py-3 bg-[#3fb950] text-white text-[10px] font-bold uppercase tracking-[0.2em] rounded-full transition-all duration-300 hover:shadow-[0_0_20px_rgba(63,185,80,0.6)] hover:scale-105">
        <span class="absolute inset-0 w-full h-full bg-white/10 translate-x-full group-hover:translate-x-0 transition-transform duration-500"></span>
        <span class="relative z-10">Book a Call</span>
      </a>
    </div>

  </nav>
</div>