<footer class="relative bg-[#0a0d12] pt-20 pb-12 overflow-hidden border-t border-[#30363d]/80">
  <!-- Subtle Ambient Glows -->
  <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4 w-[600px] h-[600px] bg-[#3fb950]/10 rounded-full blur-[160px] pointer-events-none -z-10"></div>
  <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-[#3fb950]/5 rounded-full blur-[140px] pointer-events-none -z-10"></div>

  <!-- Subtle Watermark -->
  <div class="absolute bottom-6 left-10 text-[10rem] sm:text-[14rem] font-black text-white/[0.02] leading-none select-none -z-10 tracking-tighter pointer-events-none">
    NEXAGTM
  </div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 overflow-hidden">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-12 pb-16 border-b border-[#30363d]/80">

      <!-- Brand & Mission (4 Cols) -->
      <div class="lg:col-span-4 space-y-6">
        <a href="{{ route('home') }}" class="flex items-center gap-3 group inline-flex cursor-pointer">
          <div class="clay-badge w-10 h-10 flex items-center justify-center group-hover:rotate-12 transition-transform duration-500 flex-shrink-0">
            <img src="{{ asset('pic/logo.png') }}" alt="NexaGTM Logo" class="w-6 h-6 object-contain">
          </div>
          <span class="text-2xl font-bold tracking-tight text-white">
            Nexa<span class="font-black text-[#3fb950]">GTM</span>
          </span>
        </a>

        <p class="text-xs sm:text-sm text-[#8b949e] leading-relaxed max-w-sm">
          Engineering high-conversion go-to-market engines, waterfall-verified lead pipelines, and custom Clay automation for modern B2B SaaS and high-ticket recruitment firms.
        </p>

        <!-- Live Operational Badge: Skeuomorphic LED & Clay Pill -->
        <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full clay-badge text-xs text-slate-300">
          <span class="skeuo-led inline-block"></span>
          <span class="font-medium text-[11px]">All Systems Operational · 99.2% Deliverability</span>
          <span class="style-tag brutal">Live Diode</span>
        </div>
      </div>

      <!-- Quick Navigation (2 Cols) -->
      <div class="lg:col-span-2 space-y-4">
        <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-[#8b949e]">Navigation</h3>
        <ul class="space-y-2.5 text-xs">
          <li>
            <a href="{{ route('home') }}" class="text-slate-400 hover:text-[#3fb950] transition-colors flex items-center gap-1.5">
              <i class="fa-solid fa-angle-right text-[10px] text-slate-600"></i>
              <span>Home</span>
            </a>
          </li>
          <li>
            <a href="{{ route('nexagtm.about') }}" class="text-slate-400 hover:text-[#3fb950] transition-colors flex items-center gap-1.5">
              <i class="fa-solid fa-angle-right text-[10px] text-slate-600"></i>
              <span>About Us</span>
            </a>
          </li>
          <li>
            <a href="{{ route('nexagtm.price') }}" class="text-slate-400 hover:text-[#3fb950] transition-colors flex items-center gap-1.5">
              <i class="fa-solid fa-angle-right text-[10px] text-slate-600"></i>
              <span>Pricing & Models</span>
            </a>
          </li>
          <li>
            <a href="{{ route('nexagtm.gtm-playbooks') }}" class="text-slate-400 hover:text-[#3fb950] transition-colors flex items-center gap-1.5">
              <i class="fa-solid fa-angle-right text-[10px] text-slate-600"></i>
              <span>Playbooks</span>
            </a>
          </li>
          <li>
            <a href="{{ route('nexagtm.contact') }}" class="text-slate-400 hover:text-[#3fb950] transition-colors flex items-center gap-1.5">
              <i class="fa-solid fa-angle-right text-[10px] text-slate-600"></i>
              <span>Contact Us</span>
            </a>
          </li>
          <li>
            <a href="{{ route('nexagtm.book-call') }}" class="text-[#3fb950] hover:text-white font-semibold transition-colors flex items-center gap-1.5">
              <i class="fa-solid fa-calendar-check text-[10px]"></i>
              <span>Book a Strategy Call</span>
            </a>
          </li>
        </ul>
      </div>

      <!-- Solutions / Capabilities (3 Cols) -->
      <div class="lg:col-span-3 space-y-4">
        <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-[#8b949e]">Capabilities</h3>
        <ul class="space-y-2.5 text-xs text-slate-400">
          <li>
            <a href="{{ route('nexagtm.about') }}" class="hover:text-[#3fb950] transition-colors flex items-center gap-1.5">
              <i class="fa-solid fa-filter text-[10px] text-[#3fb950]/60"></i>
              <span>ICP & TAM Mapping</span>
            </a>
          </li>
          <li>
            <a href="{{ route('home') }}#services" class="hover:text-[#3fb950] transition-colors flex items-center gap-1.5">
              <i class="fa-solid fa-envelope-open-text text-[10px] text-[#3fb950]/60"></i>
              <span>Multichannel Outreach</span>
            </a>
          </li>
          <li>
            <a href="{{ route('nexagtm.price') }}#custom-automation" class="hover:text-[#3fb950] transition-colors flex items-center gap-1.5">
              <i class="fa-solid fa-cube text-[10px] text-[#3fb950]/60"></i>
              <span>Clay Waterfall Cascades</span>
            </a>
          </li>
          <li>
            <a href="{{ route('nexagtm.price') }}#custom-automation" class="hover:text-[#3fb950] transition-colors flex items-center gap-1.5">
              <i class="fa-solid fa-spider text-[10px] text-[#3fb950]/60"></i>
              <span>Intent Signals & Scraping</span>
            </a>
          </li>
          <li>
            <a href="{{ route('nexagtm.price') }}#gtm-consultation" class="hover:text-[#3fb950] transition-colors flex items-center gap-1.5">
              <i class="fa-solid fa-comments text-[10px] text-[#3fb950]/60"></i>
              <span>1-on-1 GTM Consultation</span>
            </a>
          </li>
          <li>
            <span class="text-slate-500 text-[11px] flex items-center gap-1.5">
              <i class="fa-solid fa-shield text-[10px] text-slate-600"></i>
              <span>100% Client Asset Ownership</span>
            </span>
          </li>
        </ul>
      </div>

      <!-- Direct Channels & Socials (3 Cols) -->
      <div class="lg:col-span-3 space-y-4">
        <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-[#8b949e]">Direct Channels</h3>

        <div class="space-y-3">
          <!-- WhatsApp Link: Neomorphic Well -->
          <a href="https://wa.me/923444543772" target="_blank" rel="noopener noreferrer"
             class="neomorph-well flex items-center justify-between p-3 rounded-xl transition-all text-xs group">
            <div class="flex items-center gap-2.5">
              <i class="fa-brands fa-whatsapp text-base text-[#25D366]"></i>
              <div>
                <span class="text-white font-medium block">WhatsApp Chat</span>
                <span class="text-[10px] text-[#8b949e]">+92 344 4543772</span>
              </div>
            </div>
            <span class="text-[10px] text-[#25D366] font-semibold flex items-center gap-1.5">
              Online <span class="skeuo-led inline-block"></span>
            </span>
          </a>

          <!-- Email Link: Neomorphic Well -->
          <a href="mailto:hammad@nexagtm.com"
             class="neomorph-well flex items-center justify-between p-3 rounded-xl transition-all text-xs group">
            <div class="flex items-center gap-2.5">
              <i class="fa-regular fa-envelope text-base text-[#3fb950]"></i>
              <div>
                <span class="text-white font-medium block">Email Consultation</span>
                <span class="text-[10px] text-[#8b949e]">hammad@nexagtm.com</span>
              </div>
            </div>
            <i class="fa-solid fa-arrow-up-right-from-square text-[10px] text-slate-500 group-hover:text-white transition-colors"></i>
          </a>

          <!-- Social Buttons Row -->
          <div class="flex items-center gap-2.5 pt-2">

            <!-- LinkedIn Aman -->
            <a href="https://www.linkedin.com/company/nexagtm/" target="_blank" title="Aman on LinkedIn"
               class="neomorph-well w-10 h-10 rounded-xl hover:border-[#0077B5] hover:bg-[#0077B5] text-slate-400 hover:text-white flex items-center justify-center transition-all">
              <i class="fa-brands fa-linkedin-in text-sm"></i>
            </a>
            <!-- Upwork -->
            <a href="https://www.upwork.com/freelancers/~01ce573140b4d99a43" target="_blank" title="NexaGTM on Upwork"
               class="neomorph-well w-10 h-10 rounded-xl hover:border-[#14a800] hover:bg-[#14a800] text-slate-400 hover:text-white flex items-center justify-center transition-all">
              <i class="fa-brands fa-upwork text-[#14a800] text-xs"></i>
            </a>
            <!-- WhatsApp button -->
            <a href="https://wa.me/923444543772" target="_blank" title="Chat on WhatsApp"
               class="neomorph-well w-10 h-10 rounded-xl hover:border-[#25D366] hover:bg-[#25D366] text-slate-400 hover:text-white flex items-center justify-center transition-all">
              <i class="fa-brands fa-whatsapp text-sm"></i>
            </a>
          </div>
        </div>
      </div>

    </div>

    <!-- Bottom Strip -->
    <div class="pt-8 flex flex-col sm:flex-row justify-between items-center gap-4 text-xs text-[#8b949e]">
      <div class="flex items-center gap-2">
        <span class="skeuo-led inline-block"></span>
        <span>&copy; {{ date('Y') }} NexaGTM. All Rights Reserved.</span>
      </div>

      <p class="text-[11px] text-slate-500 text-center sm:text-left font-mono">
        Engineering predictable pipeline for B2B SaaS & high-growth agencies.
      </p>

      <a href="https://abdullahbinmumtaz.com" class="text-[11px] font-semibold text-slate-400 font-mono hover:text-[#3fb950] transition-colors" target="_blank" rel="noopener noreferrer">Developed by AbdullahBinMumtaz</a>
    </div>
  </div>
</footer>
