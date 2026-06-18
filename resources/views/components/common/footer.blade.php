<footer class="relative bg-[#0d1117] pt-32 pb-12 overflow-hidden border-t border-[#3fb950]/20">
  <!-- Decorative Background Glow -->
  <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4 w-[600px] h-[600px] bg-[#3fb950] rounded-full blur-[150px] opacity-10"></div>
  
  <!-- Large Background Watermark -->
  <div class="absolute bottom-0 left-10 text-[15rem] font-black text-[#1c1c1c]/50 leading-none select-none -z-10 tracking-tighter">
    NEXA
  </div>

  <div class="max-w-7xl mx-auto px-8 relative z-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 mb-24">
      
      <!-- Brand Section -->
      <div class="lg:col-span-5">
        <div class="flex items-center mb-8">
          <div class="w-10 h-10 bg-[#3fb950] rounded-full flex items-center justify-center mr-3">
             <img src="{{ asset('pic/logo.png') }}" alt="NexaGTM Logo" class="w-6 h-6">
          </div>
          <h1 class="text-2xl font-bold tracking-widest text-white uppercase">
            Nexa<span class="font-black text-[#3fb950]">GTM</span>
          </h1>
        </div>
        <h2 class="text-4xl font-serif italic text-white mb-8 tracking-tight">
          Performance-driven <span class="text-[#3fb950]">GTM engines</span>.
        </h2>
        <div class="flex items-center space-x-4 group cursor-pointer">
          <div class="w-12 h-[1px] bg-gray-800 group-hover:w-20 group-hover:bg-[#3fb950] transition-all duration-700"></div>
          <p class="text-[10px] font-black uppercase tracking-[0.4em] text-gray-500 group-hover:text-white transition-colors">
            Our Mission
          </p>
        </div>
      </div>

      <!-- Links Grid -->
      <div class="lg:col-span-4 grid grid-cols-2 gap-8">
        @foreach(['Explore' => ['Service', 'Stack', 'Price', 'Playbooks']] as $title => $links)
        <div>
          <h3 class="text-[10px] font-bold uppercase tracking-[0.3em] text-gray-600 mb-8">{{ $title }}</h3>
          <ul class="space-y-4">
            @foreach($links as $link)
            <li>
              <a href="#" class="text-sm font-medium text-gray-400 hover:text-white hover:pl-2 transition-all duration-500 flex items-center group">
                <span class="w-0 h-0.5 bg-[#3fb950] mr-0 group-hover:w-3 group-hover:mr-2 transition-all duration-500"></span>
                {{ $link }}
              </a>
            </li>
            @endforeach
          </ul>
        </div>
        @endforeach
      </div>

      <!-- Connect Section -->
      <div class="lg:col-span-3 flex flex-col justify-between">
        <div>
          <h3 class="text-[10px] font-bold uppercase tracking-[0.3em] text-gray-600 mb-8">Connect</h3>
          <div class="flex flex-wrap gap-4">
            @foreach(['LinkedIn' => 'LI', 'Upwork' => 'UP', 'GitHub' => 'GH'] as $name => $short)
            <a href="#" title="{{ $name }}" class="relative w-12 h-12 rounded-full border border-[#3fb950]/20 flex items-center justify-center text-white text-[10px] font-bold overflow-hidden group">
              <span class="absolute inset-0 bg-[#3fb950] translate-y-full group-hover:translate-y-0 transition-transform duration-500 ease-[cubic-bezier(0.19,1,0.22,1)]"></span>
              <span class="relative z-10 group-hover:text-white transition-colors duration-300">{{ $short }}</span>
            </a>
            @endforeach
          </div>
        </div>
      </div>
    </div>

    <!-- Bottom Footer -->
    <div class="pt-8 border-t border-[#3fb950]/20 flex flex-col md:flex-row justify-between items-center gap-6">
      <div class="flex items-center space-x-2">
        <span class="w-2 h-2 bg-[#3fb950] rounded-full animate-pulse"></span>
        <p class="text-[9px] font-bold uppercase tracking-[0.3em] text-gray-500">
          Systems: Operational
        </p>
      </div>
      
      <p class="text-[10px] font-medium text-gray-500 tracking-widest uppercase">
        &copy; 2026 <span class="text-white font-bold">NexaGTM</span> — All Rights Reserved.
      </p>

      <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="text-[10px] font-bold uppercase tracking-widest text-gray-500 hover:text-[#3fb950] transition-colors">
        Back to Top ↑
      </button>
    </div>
  </div>
</footer>