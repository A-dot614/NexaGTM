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
          @php
            $nav = [
              ['label' => 'Home', 'name' => 'home'],
              ['label' => 'About', 'name' => 'nexagtm.about'],
              ['label' => 'Pricing',  'name' => 'nexagtm.price'],
              ['label' => 'Playbooks', 'name' => 'nexagtm.gtm-playbooks'],
              ['label' => 'Contact', 'name' => 'nexagtm.contact'],
            ];
          @endphp
          <ul class="space-y-4">
            @foreach($nav as $item)
              @php
                $url = ($item['name'] && \Illuminate\Support\Facades\Route::has($item['name'])) ? route($item['name']) : '#';
              @endphp
              <li><a href="{{ $url }}" class="text-sm text-gray-400 hover:text-[#3fb950] transition-colors">{{ $item['label'] }}</a></li>
            @endforeach
          </ul>
        </div>
      
      </div>

      <!-- Connect Section -->
<div class="lg:col-span-3">
  <h3 class="text-[10px] font-bold uppercase tracking-[0.3em] text-gray-600 mb-8">Join the Network</h3>
  <div class="grid grid-cols-4 gap-3">

    <!-- LinkedIn -->
    <a href="https://www.linkedin.com/in/gtmautomationexpert/" target="_blank" class="aspect-square bg-[#161b22] border border-[#3fb950]/10 rounded-lg flex items-center justify-center hover:bg-[#3fb950] group transition-all duration-300">
      <svg class="w-6 h-6 fill-current text-gray-400 group-hover:text-black" viewBox="0 0 24 24">
        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
      </svg>
    </a>

    <!-- WhatsApp -->
    <a href="https://wa.me/923444543772" target="_blank" rel="noopener noreferrer" class="aspect-square bg-[#161b22] border border-[#3fb950]/10 rounded-lg flex items-center justify-center hover:bg-[#3fb950] group transition-all duration-300">
      <svg class="w-6 h-6 fill-current text-gray-400 group-hover:text-black" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
      </svg>
    </a>

    <!-- Upwork -->
    <a href="https://www.upwork.com/freelancers/~01ce573140b4d99a43" target="_blank" class="aspect-square bg-[#161b22] border border-[#3fb950]/10 rounded-lg flex items-center justify-center hover:bg-[#3fb950] group transition-all duration-300">
      <svg class="w-6 h-6 fill-current text-gray-400 group-hover:text-black" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M18.561 13.158c-1.102 0-2.135-.467-3.074-1.227l.228-1.076.008-.042c.207-1.143.849-3.06 2.839-3.06 1.492 0 2.703 1.212 2.703 2.703-.001 1.489-1.212 2.702-2.704 2.702zm0-8.14c-2.539 0-4.51 1.649-5.31 4.366-1.22-1.834-2.148-4.036-2.687-5.892H7.828v7.112c-.002 1.406-1.141 2.546-2.547 2.546-1.405 0-2.543-1.14-2.543-2.546V3.492H0v7.112c0 2.914 2.37 5.303 5.281 5.303 2.913 0 5.283-2.389 5.283-5.303v-1.19c.529 1.107 1.182 2.229 1.974 3.221l-1.673 7.873h2.797l1.213-5.71c1.063.679 2.285 1.109 3.686 1.109 3 0 5.439-2.452 5.439-5.45 0-3-2.439-5.439-5.439-5.439z"/>
      </svg>
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