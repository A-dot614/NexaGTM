<footer class="relative bg-[#0d1117] pt-32 pb-12 overflow-hidden border-t border-[#3fb950]/20">
  <!-- Decorative Elements -->
  <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4 w-[600px] h-[600px] bg-[#3fb950] rounded-full blur-[150px] opacity-10"></div>
  <div class="absolute bottom-0 left-10 text-[15rem] font-black text-[#1c1c1c]/50 leading-none select-none -z-10 tracking-tighter">NEXA</div>

  <div class="max-w-7xl mx-auto px-8 relative z-10">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 lg:gap-24 mb-24">
      
      <!-- Brand Section -->
      <div class="lg:col-span-4 space-y-8">
        <div class="flex items-center space-x-3">
          <div class="w-10 h-10 bg-[#3fb950] rounded-xl flex items-center justify-center">
             <img src="{{ asset('pic/logo.png') }}" alt="NexaGTM Logo" class="w-6 h-6">
          </div>
          <h1 class="text-2xl font-bold tracking-widest text-white uppercase">Nexa<span class="font-black text-[#3fb950]">GTM</span></h1>
        </div>
        <p class="text-gray-400 leading-relaxed max-w-sm">
          Engineering high-conversion go-to-market engines for the next generation of B2B SaaS. Performance-driven, data-backed, and built to scale.
        </p>
      </div>

      <!-- Links Grid -->
      <div class="lg:col-span-5 grid grid-cols-2 gap-12">
        <div>
          <h3 class="text-[10px] font-bold uppercase tracking-[0.3em] text-gray-600 mb-8">Navigation</h3>
          <ul class="space-y-4">
            @foreach(['Services', 'The Stack', 'Pricing', 'Playbooks'] as $link)
            <li><a href="#" class="text-sm text-gray-400 hover:text-[#3fb950] transition-colors">{{ $link }}</a></li>
            @endforeach
          </ul>
        </div>
        <div>
          <h3 class="text-[10px] font-bold uppercase tracking-[0.3em] text-gray-600 mb-8">Company</h3>
          <ul class="space-y-4">
            @foreach(['About', 'Case Studies', 'Insights', 'Contact'] as $link)
            <li><a href="#" class="text-sm text-gray-400 hover:text-[#3fb950] transition-colors">{{ $link }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>

      <!-- Connect Section -->
      <div class="lg:col-span-3">
        <h3 class="text-[10px] font-bold uppercase tracking-[0.3em] text-gray-600 mb-8">Join the Network</h3>
        <div class="grid grid-cols-3 gap-3">
          <!-- LinkedIn -->
          <a href="#" class="aspect-square bg-[#161b22] border border-[#3fb950]/10 rounded-lg flex items-center justify-center hover:bg-[#3fb950] group transition-all duration-300">
            <svg class="w-6 h-6 text-gray-400 group-hover:text-black fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
          </a>
          <!-- Upwork -->
          <a href="#" class="aspect-square bg-[#161b22] border border-[#3fb950]/10 rounded-lg flex items-center justify-center hover:bg-[#3fb950] group transition-all duration-300">
            <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"><ellipse cx="184.5" cy="234.5" rx="57.5" ry="56.5" transform="translate(-546.174 -763.565) scale(4.34783)"/><path d="M345.516 181.708c-42.168 0-65.774 27.481-72.532 55.773-7.658-14.416-13.335-33.698-17.75-51.628H196.94v72.531c0 26.31-11.984 45.772-35.41 45.772-23.427 0-36.852-19.462-36.852-45.772l.27-72.531H91.34v72.531c0 21.174 6.848 40.366 19.372 54.061 12.884 14.146 30.454 21.534 50.817 21.534 40.545 0 68.837-31.085 68.837-75.595V209.64c4.235 16.038 14.326 46.853 33.608 73.884l-18.02 102.625h34.148l11.893-72.712c3.875 3.244 8.02 6.127 12.434 8.74 11.443 7.208 24.508 11.263 38.023 11.713 0 0 2.073.09 3.154.09 41.807 0 75.054-32.346 75.054-76.045 0-43.7-33.337-76.226-75.144-76.226m0 122.358c-25.86 0-42.979-20.003-47.754-27.752 6.127-49.015 24.057-64.512 47.754-64.512 23.426 0 41.626 18.741 41.626 46.132 0 27.39-18.2 46.132-41.626 46.132" fill="#fff" fill-rule="nonzero"/></svg>
          </a>
          <!-- Fiverr -->
          <a href="#" class="aspect-square bg-[#161b22] border border-[#3fb950]/10 rounded-lg flex items-center justify-center hover:bg-[#3fb950] group transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 508.02 508.02"><defs><style>.a{fill:#1dbf73;}.b{fill:#fff;}</style></defs><circle class="a" cx="254.01" cy="254.01" r="254.01"/><circle class="b" cx="315.97" cy="162.19" r="26.87"/><path class="b" d="M345.87,207.66h-123V199.6c0-15.83,15.83-16.13,23.89-16.13,9.25,0,13.44.9,13.44.9v-43.6a155.21,155.21,0,0,0-19.71-1.19c-25.68,0-73.16,7.16-73.16,61.51V208h-22.4v40.31h22.4v85.1h-20.9v40.31H247.34V333.37H222.85v-85.1H290v85.1H269.13v40.31h97.65V333.37H345.87Z" transform="translate(-1.83 -0.98)"/></svg>
          </a>
        </div>
      </div>
    </div>

    <!-- Bottom Footer -->
    <div class="pt-8 border-t border-[#3fb950]/10 flex flex-col md:flex-row justify-between items-center gap-6">
      <div class="flex items-center space-x-2">
        <div class="w-2 h-2 bg-[#3fb950] rounded-full shadow-[0_0_10px_rgba(63,185,80,0.5)]"></div>
        <p class="text-[9px] font-bold uppercase tracking-[0.3em] text-gray-600">Operational</p>
      </div>
      
      <p class="text-[10px] font-medium text-gray-600 tracking-widest uppercase">
        &copy; 2026 NexaGTM — All Rights Reserved.
      </p>

      <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="text-[10px] font-bold uppercase tracking-widest text-gray-500 hover:text-[#3fb950] transition-colors">
        Back to Top
      </button>
    </div>
  </div>
</footer>