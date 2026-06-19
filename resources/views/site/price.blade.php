<x-layout.mainlayout>

{{-- ── HERO ── --}}
<div class="relative max-w-5xl mx-auto px-4 sm:px-6 py-16 sm:py-24 text-center overflow-hidden">
    <!-- Background subtle glow -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-96 h-96 bg-[#3fb950]/10 rounded-full blur-[120px] pointer-events-none"></div>

    <div class="relative z-10">
        <p class="text-[10px] font-bold tracking-[0.3em] uppercase text-[#3fb950] mb-6">NexaGTM · Performance Pricing</p>
        
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-white leading-[1.1] mb-6 tracking-tight">
            Pay Only for<br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#3fb950] to-[#2d8a3a]">Performance.</span>
        </h1>
        
        <p class="text-lg md:text-xl text-[#8a9e8a] max-w-2xl mx-auto mb-10 leading-relaxed">
            Performance-driven GTM systems, verified lead data, and custom automation built specifically for outbound and recruitment agencies.
        </p>

        <div class="flex flex-wrap justify-center gap-3">
            <div class="flex items-center gap-2 px-4 py-2 bg-[#0d1117] border border-[#30363d] rounded-full text-xs font-bold text-[#8a9e8a]">
                <span class="text-[#3fb950]">✍️</span> NexaGTM Standard
            </div>
            <div class="flex items-center gap-2 px-4 py-2 bg-[#0d1117] border border-[#30363d] rounded-full text-xs font-bold text-[#8a9e8a]">
                <span class="text-[#3fb950]">🔒</span> Fully Confidential
            </div>
        </div>
    </div>
</div>


  {{-- ══ SECTION 1 — GTM OUTBOUND ══ --}}
<section id="gtm-systems" class="max-w-6xl mx-auto px-6 pb-20">
    <div class="mb-12" data-aos="fade-up">
        <p class="text-[10px] font-bold tracking-[0.2em] uppercase text-[#3fb950] mb-3">Section 01</p>
        <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4 tracking-tight">⚙️ GTM Outbound</h2>
        <p class="text-lg text-[#8a9e8a] max-w-2xl">
            Three engagement models depending on your risk tolerance, ownership preference, and commitment level. All deliver fully operational GTM execution.
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8" data-aos="fade-up" data-aos-delay="100">

        {{-- 1. Performance Model --}}
        <div class="bg-[#0d1117] border border-[#30363d] rounded-3xl p-8 hover:border-[#3fb950]/50 transition-all">
            <span class="inline-block text-[10px] font-bold uppercase tracking-widest bg-[#3fb950]/10 text-[#3fb950] px-3 py-1 rounded-full border border-[#3fb950]/20 mb-4">Pay-Per-Result</span>
            <h3 class="text-2xl font-bold text-white mb-2">Performance Model</h3>
            <p class="text-[#8a9e8a] text-sm mb-6">You pay only when a meeting is booked. NexaGTM owns the infrastructure — you own the results.</p>
            
            <div class="border-t border-[#30363d] pt-6 mb-6">
                <div class="text-3xl font-extrabold text-white">Custom Price</div>
                <p class="text-xs text-[#586069] mt-1">per meeting booked · Varies by complexity</p>
            </div>
            
            <ul class="space-y-3 text-sm text-slate-300 mb-6">
                <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#3fb950]"></i> Result = Booked meeting</li>
                <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#3fb950]"></i> NexaGTM owns tools & infra</li>
                <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#3fb950]"></i> Est. 15–30 meetings/month</li>
            </ul>
        </div>

        {{-- 2. Fixed Retainer --}}
        <div class="bg-[#161b22] border border-[#30363d] rounded-3xl p-8 hover:border-[#3fb950]/50 transition-all">
            <span class="inline-block text-[10px] font-bold uppercase tracking-widest bg-[#3fb950]/10 text-[#3fb950] px-3 py-1 rounded-full border border-[#3fb950]/20 mb-4">Most Popular</span>
            <h3 class="text-2xl font-bold text-white mb-2">Monthly Retainer</h3>
            <p class="text-[#8a9e8a] text-sm mb-6">You own everything — tools, infra, and data. NexaGTM manages the system for you.</p>
            
            <div class="border-t border-[#30363d] pt-6 mb-6">
                <div class="text-3xl font-extrabold text-white">$750 <span class="text-base font-normal text-[#8a9e8a]">/mo</span></div>
                <p class="text-xs text-[#586069] mt-1">Month-to-month · No long-term contracts</p>
            </div>

            <ul class="space-y-3 text-sm text-slate-300 mb-6">
                <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#3fb950]"></i> 10 hours/week management</li>
                <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#3fb950]"></i> Full ownership of all assets</li>
                <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#3fb950]"></i> Strategy calls included</li>
            </ul>
        </div>

        {{-- 3. On-Demand --}}
        <div class="bg-[#0d1117] border border-[#30363d] rounded-3xl p-8 hover:border-[#3fb950]/50 transition-all">
            <span class="inline-block text-[10px] font-bold uppercase tracking-widest bg-[#3fb950]/10 text-[#3fb950] px-3 py-1 rounded-full border border-[#3fb950]/20 mb-4">Flexible</span>
            <h3 class="text-2xl font-bold text-white mb-2">On-Demand Expert</h3>
            <p class="text-[#8a9e8a] text-sm mb-6">Hire NexaGTM for specific GTM tasks — no retainer, no commitment.</p>
            
            <div class="border-t border-[#30363d] pt-6 mb-6">
                <div class="text-3xl font-extrabold text-white">$30 <span class="text-base font-normal text-[#8a9e8a]">/ hr</span></div>
                <p class="text-xs text-[#586069] mt-1">Scoped upfront · No surprise billing</p>
            </div>

            <ul class="space-y-3 text-sm text-slate-300 mb-6">
                <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#3fb950]"></i> Clay workflow builds</li>
                <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#3fb950]"></i> GTM stack audit & setup</li>
                <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#3fb950]"></i> Data extraction & scraping</li>
            </ul>
        </div>

        {{-- 4. Hybrid --}}
        <div class="bg-[#161b22] border border-[#30363d] rounded-3xl p-8 hover:border-[#3fb950]/50 transition-all">
            <span class="inline-block text-[10px] font-bold uppercase tracking-widest bg-[#3fb950]/10 text-[#3fb950] px-3 py-1 rounded-full border border-[#3fb950]/20 mb-4">Shared Upside</span>
            <h3 class="text-2xl font-bold text-white mb-2">Hybrid Model</h3>
            <p class="text-[#8a9e8a] text-sm mb-6">Base fee for operations + commission to align incentives with your revenue.</p>
            
            <div class="border-t border-[#30363d] pt-6 mb-6">
                <div class="text-3xl font-extrabold text-white">$400 <span class="text-base font-normal text-[#8a9e8a]">/mo</span></div>
                <p class="text-xs text-[#586069] mt-1">+ 10% commission per closed deal</p>
            </div>

            <ul class="space-y-3 text-sm text-slate-300 mb-6">
                <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#3fb950]"></i> Build & manage GTM system</li>
                <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#3fb950]"></i> Ownership transfer post-contract</li>
                <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#3fb950]"></i> Success-based compensation</li>
            </ul>
        </div>
    </div>

    {{-- Callout --}}
    <div class="mt-12 bg-[#3fb950]/5 border border-[#3fb950]/10 rounded-2xl p-6 flex flex-col md:flex-row items-center gap-6" data-aos="fade-up">
        <span class="text-3xl">💡</span>
        <p class="text-sm text-[#8a9e8a] leading-relaxed">
            <strong class="text-white">Not sure which model fits?</strong> Pay-Per-Result for zero risk, Fixed Retainer for full ownership, On-Demand for tactical tasks, or Hybrid to align us directly with your growth.
        </p>
    </div>
</section>

  <hr class="border-slate-800 max-w-6xl mx-auto">


  {{-- ══ SECTION 3 — CUSTOM AUTOMATION ══ --}}
<section id="custom-automation" class="max-w-6xl mx-auto px-6 py-20">
    <div class="mb-12" data-aos="fade-up">
        <span class="text-[10px] font-bold tracking-[0.2em] uppercase text-[#3fb950] mb-3 block">Section 02</span>
        <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4 tracking-tight">🤖 Custom Automation</h2>
        <p class="text-lg text-[#8a9e8a] max-w-2xl">
            Bespoke Clay workflows, scraping pipelines, and outbound automation — scoped per project, billed hourly.
        </p>
    </div>

    <!-- Main Card -->
    <div class="relative bg-[#0d1117] border border-[#30363d] rounded-3xl p-8 md:p-12 overflow-hidden shadow-2xl" data-aos="fade-up" data-aos-delay="100">
        <div class="absolute inset-0 bg-gradient-to-tr from-[#3fb950]/5 to-transparent"></div>
        
        <div class="relative z-10">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#3fb950]/10 border border-[#3fb950]/20 text-[#3fb950] text-[10px] font-bold uppercase tracking-widest">
                Hourly Rate
            </span>
            
            <div class="flex items-baseline gap-2 mt-4 mb-2">
                <span class="text-5xl font-extrabold text-white">$30</span>
                <span class="text-xl text-[#8a9e8a]">/ hour</span>
            </div>
            <p class="text-[#586069] text-sm mb-10">Scoped after a free 30-min discovery call · Estimated hours provided upfront</p>

            <!-- Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $features = [
                        ['🧩', 'Clay Workflows', 'Custom enrichment, lead scoring, and routing pipelines built in Clay.'],
                        ['🕷️', 'Scraping Pipelines', 'LinkedIn, job boards, company sites, and custom data sources.'],
                        ['⚡', 'Outbound Automation', 'End-to-end sequence automation — email, LinkedIn, and CRM sync.'],
                        ['🔗', 'System Integration', 'Connect your GTM stack — CRM, inbox, enrichment tools, and reporting.']
                    ];
                @endphp

                @foreach($features as $f)
                    <div class="bg-[#161b22] border border-[#30363d] rounded-2xl p-6 hover:border-[#3fb950]/30 transition-all hover:-translate-y-1">
                        <div class="text-2xl mb-3">{{ $f[0] }}</div>
                        <div class="text-white font-bold text-sm mb-2">{{ $f[1] }}</div>
                        <p class="text-[#8a9e8a] text-[12px] leading-relaxed">{{ $f[2] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Process Footer -->
    <div class="mt-8 bg-[#3fb950]/5 border border-[#3fb950]/10 rounded-2xl p-6 flex flex-col md:flex-row items-center justify-between gap-6" data-aos="fade-up">
        <div class="flex items-center gap-4">
            <span class="text-2xl">🔧</span>
            <p class="text-sm text-[#8a9e8a]">
                <strong class="text-white block mb-0.5">How it works:</strong> 
                Book a free 30-min scoping call → receive an estimated hour breakdown → approve and we build.
            </p>
        </div>

    </div>
</section>







  <hr class="border-slate-800 max-w-6xl mx-auto">





  {{-- ══ SECTION 3 — GTM CONSULTATION ══ --}}
<section id="gtm-consultation" class="max-w-6xl mx-auto px-6 py-20">
    <!-- Header -->
    <div class="mb-12">
        <span class="text-[10px] font-bold tracking-[0.2em] uppercase text-[#3fb950] mb-3 block">Section 03</span>
        <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4 tracking-tight">💬 GTM Consultation</h2>
        <p class="text-lg text-[#8a9e8a] max-w-2xl">
            A focused 1-on-1 session with a NexaGTM strategist. Built for founders figuring out their go-to-market from scratch — no fluff, just a clear plan.
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        {{-- 1-on-1 Session Card --}}
        <div class="group relative bg-[#0d1117] border border-[#30363d] rounded-3xl p-8 overflow-hidden hover:border-[#3fb950]/50 transition-all duration-300">
            <div class="absolute inset-0 bg-gradient-to-b from-[#3fb950]/5 to-transparent opacity-50"></div>
            
            <div class="relative z-10 flex flex-col gap-6">
                <div class="flex items-center gap-3">
                    <span class="text-[10px] font-bold uppercase tracking-widest bg-[#3fb950]/10 text-[#3fb950] px-3 py-1 rounded-full border border-[#3fb950]/20">1-on-1 Session</span>
                    <span class="text-[10px] font-bold uppercase tracking-widest text-[#8a9e8a]">🎯 Founder-First</span>
                </div>
                
                <div>
                    <h3 class="text-2xl font-bold text-white mb-2">GTM Strategy Call</h3>
                    <p class="text-[#8a9e8a] text-sm leading-relaxed">A structured 1-on-1 video call where we map your ICP, validate your offer positioning, and design a GTM approach tailored to your stage and budget.</p>
                </div>

                <div class="border-y border-[#30363d] py-5">
                    <div class="flex items-baseline gap-2">
                        <span class="text-4xl font-extrabold text-white">$100</span>
                        <span class="text-[#8a9e8a]">/ hour</span>
                    </div>
                </div>

                <ul class="space-y-3 text-sm text-slate-300">
                    @foreach(['Live 1-on-1 video call', 'ICP definition & targeting strategy', 'Offer positioning & messaging review', 'Channel selection strategy', 'GTM model recommendation', 'Tool & stack guidance'] as $item)
                        <li class="flex items-center gap-3">
                            <i class="fa-solid fa-check text-[#3fb950]"></i> {{ $item }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- What You'll Leave With Card --}}
        <div class="bg-[#161b22] border border-[#30363d] rounded-3xl p-8">
            <h3 class="text-xl font-bold text-white mb-6">Your GTM Playbook</h3>
            
            <div class="space-y-4">
                <div class="bg-[#0d1117] border border-[#30363d] rounded-2xl p-5 hover:border-[#3fb950]/30 transition-colors">
                    <div class="text-sm font-bold text-white mb-1">🎯 Defined ICP</div>
                    <p class="text-xs text-[#8a9e8a]">Clear profile of your ideal customer, pain points, and buying triggers.</p>
                </div>
                <div class="bg-[#0d1117] border border-[#30363d] rounded-2xl p-5 hover:border-[#3fb950]/30 transition-colors">
                    <div class="text-sm font-bold text-white mb-1">📣 Positioning Framework</div>
                    <p class="text-xs text-[#8a9e8a]">Crafting an offer that resonates immediately with your target market.</p>
                </div>
                <div class="bg-[#0d1117] border border-[#30363d] rounded-2xl p-5 hover:border-[#3fb950]/30 transition-colors">
                    <div class="text-sm font-bold text-white mb-1">📐 GTM Roadmap</div>
                    <p class="text-xs text-[#8a9e8a]">A prioritized action plan for which channels to activate first.</p>
                </div>
            </div>

            <a href="https://calendly.com/hammad1122/new-meeting" target="_blank" class="mt-8 flex w-full items-center justify-center gap-2 bg-[#3fb950] hover:bg-[#349e44] text-white font-bold py-4 rounded-xl transition-all shadow-[0_0_15px_rgba(63,185,80,0.3)]">
                Book Your Session <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>

    {{-- Bottom Notice --}}
    <div class="mt-8 bg-[#3fb950]/5 border border-[#3fb950]/10 rounded-2xl p-6 flex flex-col md:flex-row items-center gap-6">
        <div class="text-3xl">💬</div>
        <p class="text-sm text-[#8a9e8a] leading-relaxed">
            <strong class="text-white">Who this is for:</strong> Founders who have a product but haven't cracked outbound yet. This is the fastest way to get a real, executable plan for just $100.
        </p>
    </div>
</section>

<hr class="border-slate-800 max-w-6xl mx-auto">

<!-- Footer CTA Section -->
<div class="w-full px-4 py-12 md:py-20">
  <div class="max-w-4xl mx-auto">
    <div class="relative bg-gradient-to-b from-[#161b22] to-[#0d1117] border border-[#3fb950]/30 rounded-3xl p-8 md:p-16 text-center shadow-2xl backdrop-blur-sm overflow-hidden">
      
      <!-- Decorative Glow -->
      <div class="absolute -top-24 -right-24 w-64 h-64 bg-[#3fb950] rounded-full blur-[120px] opacity-10"></div>
      
      <h3 class="text-3xl md:text-4xl font-extrabold text-white mb-4 tracking-tight">
        Ready to build your GTM engine?
      </h3>
      <p class="text-[#8b949e] text-lg mb-8 max-w-xl mx-auto leading-relaxed">
        Book a free strategy call to choose your model, order leads, or scope a custom automation project.
      </p>
      
      <a href="https://calendly.com/hammad1122/new-meeting" 
         target="_blank"
         rel="noopener noreferrer"
         class="inline-flex items-center justify-center gap-2 bg-[#3fb950] hover:bg-[#349e44] text-white font-bold px-8 py-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-[0_0_20px_rgba(63,185,80,0.3)] hover:shadow-[0_0_30px_rgba(63,185,80,0.5)]">
        <!-- Calendar Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        Book a Free Call
      </a>
    </div>
  </div>
</div>

</x-layout.mainlayout>