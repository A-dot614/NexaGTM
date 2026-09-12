<x-layout.mainlayout>
    <x-slot:title>NexaGTM — Performance-Driven B2B GTM Engine & Outbound Automation</x-slot:title>

    <main class="relative overflow-hidden text-[#e0e1dd]">
        <!-- Ambient decorative glows -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[850px] h-[550px] bg-[#3fb950]/10 rounded-full blur-[160px] pointer-events-none -z-10"></div>
        <div class="absolute top-[35%] -left-20 w-[450px] h-[450px] bg-[#3fb950]/5 rounded-full blur-[140px] pointer-events-none -z-10"></div>

        {{-- ── HERO SECTION ── --}}
        <section class="max-w-6xl mx-auto px-4 sm:px-6 pt-10 pb-16 sm:pb-24 text-center animate-fade-in-up relative">
            <!-- Live Availability Pill (Claymorphism + Skeuomorphic LED) -->
            <div class="clay-badge clay-pill inline-flex items-center gap-2.5 px-5 py-2 mb-6 text-xs font-bold tracking-wide relative cursor-pointer">
                <span class="style-tag style-tag-clay">Claymorphism</span>
                <span class="skeuo-led"></span>
                <span>Now Booking for Q1/Q2 · 2 Outbound Slots Remaining</span>
            </div>

            <!-- Main Heading (Minimalist Typographic Hierarchy) -->
            <h1 class="text-4xl sm:text-6xl lg:text-7xl font-black text-white leading-[1.1] mb-6 tracking-tight">
                We Build the Pipeline.<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#3fb950] via-[#56d364] to-[#2ea043]">You Close the Deals.</span>
            </h1>

            <!-- Subtitle -->
            <p class="text-base sm:text-xl text-[#8b949e] max-w-3xl mx-auto mb-10 leading-relaxed">
                NexaGTM is a practitioner-led GTM agency specializing in high-conversion outbound systems, waterfall-verified lead pipelines, and custom Clay automation — built specifically for B2B SaaS, recruitment agencies, and high-ticket service firms.
            </p>

            <!-- Dual Action CTAs (Skeuomorphism + Neomorphism) -->
            <div class="flex flex-col sm:flex-row justify-center items-center gap-5 mb-12">
                <a href="{{ route('nexagtm.book-call') }}" 
                   class="skeuo-button w-full sm:w-auto px-9 py-4 text-white font-extrabold text-sm uppercase tracking-wider flex items-center justify-center gap-2.5 relative">
                    <span class="style-tag style-tag-skeuo">Skeuomorphism</span>
                    <i class="fa-solid fa-calendar-days text-sm"></i>
                    <span>Book a Free Strategy Call</span>
                </a>
                <a href="{{ route('nexagtm.price') }}" 
                   class="neomorph-button w-full sm:w-auto px-8 py-4 text-white font-bold text-sm uppercase tracking-wider flex items-center justify-center gap-2 relative">
                    <span class="style-tag style-tag-neomorph">Neomorphism</span>
                    <span>Explore Pricing & Models</span>
                    <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            </div>

            <!-- Social Proof Bar (Neo-Brutalism Stamps + Analog Star Rating) -->
            <div class="flex flex-wrap justify-center items-center gap-4 sm:gap-6 pt-8 border-t border-[#30363d]/60 text-xs text-[#8b949e] relative">
                <span class="style-tag style-tag-brutal">Neo-Brutalism</span>
                <div class="brutal-badge flex items-center gap-2">
                    <div class="flex text-amber-400 text-xs">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <span class="text-white font-bold">5.0 RATING</span>
                    <span class="text-slate-400 font-mono text-[10px]">(UPWORK & LINKEDIN)</span>
                </div>
                <div class="brutal-badge flex items-center gap-2">
                    <i class="fa-solid fa-check-double text-[#3fb950]"></i>
                    <span class="text-white font-bold">10,000+</span>
                    <span>VERIFIED LEADS</span>
                </div>
                <div class="brutal-badge flex items-center gap-2">
                    <span class="skeuo-led"></span>
                    <span class="text-white font-bold">99.2%</span>
                    <span>INBOX DELIVERABILITY</span>
                </div>
            </div>
        </section>

        <hr class="minimal-divider max-w-7xl mx-auto my-6">

        {{-- ── SERVICES SECTION ── --}}
        <section id="services" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-16">
                <div class="max-w-2xl">
                    <div class="text-xs font-bold tracking-[0.2em] uppercase text-[#3fb950] mb-2">Core Solutions</div>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight">
                        Engineered for Every Stage of Outbound
                    </h2>
                    <p class="text-base text-[#8b949e] mt-3">
                        Three specialized service tracks designed to eliminate pipeline dry spells and build enduring outbound assets.
                    </p>
                </div>
                <a href="{{ route('nexagtm.about') }}" 
                   class="clay-pill inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-[#3fb950] hover:text-white transition-colors px-5 py-2.5 self-start md:self-end">
                    <span>Learn About Our Process</span>
                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Service 1: Spatial UI 3D Card -->
                <div class="spatial-card spatial-spotlight bg-[#161b22] border border-[#30363d] rounded-3xl p-8 hover:border-[#3fb950]/60 transition-all duration-300 shadow-xl flex flex-col justify-between group relative">
                    <span class="style-tag style-tag-spatial">Spatial UI 3D</span>
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <span class="clay-step-bubble">01</span>
                            <div class="w-12 h-12 rounded-2xl bg-[#3fb950]/10 text-[#3fb950] flex items-center justify-center text-xl group-hover:scale-110 transition-transform">
                                <i class="fa-solid fa-gears"></i>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">GTM Strategy & Infrastructure</h3>
                        <p class="text-xs sm:text-sm text-[#8b949e] leading-relaxed mb-6">
                            We map your exact ICP, configure secondary domains with flawless SPF/DKIM/DMARC protocols, and build your sequencing architecture from zero.
                        </p>
                        <ul class="space-y-2.5 text-xs text-slate-300 mb-8">
                            <li class="flex items-center gap-2">
                                <i class="fa-solid fa-check text-[#3fb950] text-[10px]"></i>
                                <span>Granular ICP & TAM Total Addressable Market</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fa-solid fa-check text-[#3fb950] text-[10px]"></i>
                                <span>Multi-domain warmup & DNS health protocols</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fa-solid fa-check text-[#3fb950] text-[10px]"></i>
                                <span>High-intent signal capture workflows</span>
                            </li>
                        </ul>
                    </div>
                    <a href="{{ route('nexagtm.book-call') }}" class="text-xs font-bold text-[#3fb950] hover:text-white flex items-center gap-1.5 transition-colors pt-4 border-t border-[#30363d]/80">
                        <span>Book Strategy Call</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>

                <!-- Service 2: Liquid Glass Card (Featured) -->
                <div class="liquid-glass-card p-8 flex flex-col justify-between group relative">
                    <span class="style-tag style-tag-liquid">Liquid Glass</span>
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <span class="clay-step-bubble">02</span>
                            <div class="w-12 h-12 rounded-2xl bg-[#3fb950]/20 text-[#56d364] flex items-center justify-center text-xl group-hover:scale-110 transition-transform">
                                <i class="fa-solid fa-rocket"></i>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Multichannel Outreach Execution</h3>
                        <p class="text-xs sm:text-sm text-[#8b949e] leading-relaxed mb-6">
                            Turnkey outbound across cold email, LinkedIn touches, and appointment setting with hyper-personalized messaging trained on actual buying triggers.
                        </p>
                        <ul class="space-y-2.5 text-xs text-slate-300 mb-8">
                            <li class="flex items-center gap-2">
                                <i class="fa-solid fa-check text-[#3fb950] text-[10px]"></i>
                                <span>Cold Email + LinkedIn omnichannel touches</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fa-solid fa-check text-[#3fb950] text-[10px]"></i>
                                <span>AI copy personalization based on hiring/funding</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fa-solid fa-check text-[#3fb950] text-[10px]"></i>
                                <span>Weekly strategy calls & KPI dashboard updates</span>
                            </li>
                        </ul>
                    </div>
                    <a href="{{ route('nexagtm.price') }}" class="text-xs font-bold text-[#3fb950] hover:text-white flex items-center gap-1.5 transition-colors pt-4 border-t border-[#30363d]/80">
                        <span>View Outreach Retainers</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>

                <!-- Service 3: Spatial UI 3D Card -->
                <div class="spatial-card spatial-spotlight bg-[#161b22] border border-[#30363d] rounded-3xl p-8 hover:border-[#3fb950]/60 transition-all duration-300 shadow-xl flex flex-col justify-between group relative">
                    <span class="style-tag style-tag-spatial">Spatial UI 3D</span>
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <span class="clay-step-bubble">03</span>
                            <div class="w-12 h-12 rounded-2xl bg-[#3fb950]/10 text-[#3fb950] flex items-center justify-center text-xl group-hover:scale-110 transition-transform">
                                <i class="fa-solid fa-screwdriver-wrench"></i>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Custom Clay & Scraper Builds</h3>
                        <p class="text-xs sm:text-sm text-[#8b949e] leading-relaxed mb-6">
                            Bespoke Clay tables, waterfall cascades, Apify scrapers, and CRM webhook pipelines. We scope it, build it, document it, and hand it over.
                        </p>
                        <ul class="space-y-2.5 text-xs text-slate-300 mb-8">
                            <li class="flex items-center gap-2">
                                <i class="fa-solid fa-check text-[#3fb950] text-[10px]"></i>
                                <span>Multi-provider waterfall enrichment cascades</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fa-solid fa-check text-[#3fb950] text-[10px]"></i>
                                <span>LinkedIn, job board & custom site web scrapers</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fa-solid fa-check text-[#3fb950] text-[10px]"></i>
                                <span>Full video walkthrough & documentation included</span>
                            </li>
                        </ul>
                    </div>
                    <a href="{{ route('nexagtm.contact') }}" class="text-xs font-bold text-[#3fb950] hover:text-white flex items-center gap-1.5 transition-colors pt-4 border-t border-[#30363d]/80">
                        <span>Scope a Custom Build ($30/hr)</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

            <!-- Modern 3-Way Comparison Matrix (Neomorphism Chassis + Liquid Glass Spotlight) -->
            <div class="mt-16 neomorph-card p-6 sm:p-10 shadow-2xl overflow-x-auto relative">
                <span class="style-tag style-tag-neomorph">Neomorphic Well</span>
                <div class="mb-8">
                    <span class="text-xs font-bold uppercase tracking-widest text-[#3fb950]">The Economic Advantage</span>
                    <h3 class="text-2xl font-bold text-white mt-1">Why High-Growth Teams Choose NexaGTM</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-sm">
                    <!-- Column 1: In-House SDR (Minimalist) -->
                    <div class="minimal-clean bg-[#0d1117] p-6 flex flex-col justify-between relative">
                        <span class="style-tag style-tag-minimal">Minimalist</span>
                        <div>
                            <div class="text-xs font-bold uppercase tracking-wider text-rose-400 mb-2">Old Way 01</div>
                            <h4 class="text-lg font-bold text-white mb-4">In-House SDR Team</h4>
                            <ul class="space-y-3 text-xs text-slate-400">
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-xmark text-rose-500 mt-0.5"></i>
                                    <span><strong>$180K–$220K/yr:</strong> Salaries, OTE, benefits & taxes</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-xmark text-rose-500 mt-0.5"></i>
                                    <span><strong>3–6 months:</strong> Hiring, onboarding & ramp time</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-xmark text-rose-500 mt-0.5"></i>
                                    <span><strong>High turnover:</strong> SDRs churn every 14 months on average</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-xmark text-rose-500 mt-0.5"></i>
                                    <span><strong>$1,500+/mo:</strong> Software licenses & domain overhead</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Column 2: Traditional Agency (Minimalist) -->
                    <div class="minimal-clean bg-[#0d1117] p-6 flex flex-col justify-between relative">
                        <span class="style-tag style-tag-minimal">Minimalist</span>
                        <div>
                            <div class="text-xs font-bold uppercase tracking-wider text-amber-400 mb-2">Old Way 02</div>
                            <h4 class="text-lg font-bold text-white mb-4">Traditional Lead Gen Agency</h4>
                            <ul class="space-y-3 text-xs text-slate-400">
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-xmark text-amber-500 mt-0.5"></i>
                                    <span><strong>$4K–$8K/mo retainers:</strong> High upfront cost with no guarantees</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-xmark text-amber-500 mt-0.5"></i>
                                    <span><strong>Generic spray & pray:</strong> Spamming 20,000 cold contacts</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-xmark text-amber-500 mt-0.5"></i>
                                    <span><strong>Data hostage:</strong> You don't own domains, lists, or sequences</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-xmark text-amber-500 mt-0.5"></i>
                                    <span><strong>Junior account managers:</strong> Disconnected from technical reality</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Column 3: NexaGTM Engine (Liquid Glass Spotlight + Brutal Stamp) -->
                    <div class="liquid-glass-card p-6 flex flex-col justify-between relative">
                        <span class="style-tag style-tag-liquid">Liquid Glass</span>
                        <span class="absolute -top-3 right-4 brutal-badge text-[10px] font-black uppercase tracking-widest px-3 py-0.5">
                            <span class="skeuo-led mr-1"></span> The Modern Standard
                        </span>
                        <div>
                            <div class="text-xs font-bold uppercase tracking-wider text-[#3fb950] mb-2">NexaGTM Engine</div>
                            <h4 class="text-lg font-bold text-white mb-4">Signal-Led Architecture</h4>
                            <ul class="space-y-3 text-xs text-slate-200">
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-check text-[#3fb950] mt-0.5"></i>
                                    <span><strong>$750/mo or Pay-Per-Result:</strong> Fraction of full-time cost</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-check text-[#3fb950] mt-0.5"></i>
                                    <span><strong>Live in 14 days:</strong> Warmups & waterfall builds launch rapidly</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-check text-[#3fb950] mt-0.5"></i>
                                    <span><strong>100% Client Asset Ownership:</strong> Domains & Clay tables are yours</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-check text-[#3fb950] mt-0.5"></i>
                                    <span><strong>Founder-led execution:</strong> You work directly with technical architects</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <hr class="border-[#30363d]/80 max-w-7xl mx-auto">

        {{-- ── PLAYBOOKS & CASE STUDIES ── --}}
        <section id="case-studies" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-16">
                <div class="max-w-2xl">
                    <div class="text-xs font-bold tracking-[0.2em] uppercase text-[#3fb950] mb-2">Proven Track Record</div>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight">
                        Real Campaigns. Real Pipeline.
                    </h2>
                    <p class="text-base text-[#8b949e] mt-3">
                        Actual results achieved for our clients through custom Clay workflows and automated multichannel execution.
                    </p>
                </div>
                <a href="{{ route('nexagtm.gtm-playbooks') }}" 
                   class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-[#3fb950] hover:text-white transition-colors border border-[#3fb950]/40 hover:border-[#3fb950] px-4 py-2.5 rounded-full hover:bg-[#3fb950]/10 self-start md:self-end">
                    <span>View All Playbooks</span>
                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Case Study 1: PaveTalent (Spatial UI 3D) -->
                <div class="spatial-card spatial-spotlight bg-[#161b22] border border-[#30363d] hover:border-[#3fb950]/60 rounded-3xl p-8 sm:p-10 transition-all duration-300 shadow-xl flex flex-col justify-between group relative">
                    <span class="style-tag style-tag-spatial">Spatial UI 3D</span>
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <span class="clay-badge clay-pill text-xs font-bold uppercase tracking-wider">
                                Recruitment & Staffing
                            </span>
                            <span class="text-xs text-[#8b949e] font-mono">3 Month Sprint</span>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">PaveTalent — Custom Talent Prospecting Engine</h3>
                        <p class="text-xs sm:text-sm text-[#8b949e] leading-relaxed mb-6">
                            Built an automated daily scraping pipeline that monitors target tech job postings, triggers Clay waterfall verification, and uses AI scoring to deliver 30 qualified candidate and client meetings every month.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-8">
                            <span class="brutal-badge">Clay Waterfall</span>
                            <span class="brutal-badge">LinkedIn Scraper</span>
                            <span class="brutal-badge">Smartlead Sequences</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-3 pt-6 border-t border-[#30363d]/80 text-center">
                        <div class="neomorph-well p-3 rounded-2xl">
                            <div class="text-2xl font-black text-white">10K+</div>
                            <div class="text-[10px] uppercase tracking-wider text-[#8b949e] mt-0.5">Jobs Scraped</div>
                        </div>
                        <div class="neomorph-well p-3 rounded-2xl">
                            <div class="text-2xl font-black text-[#3fb950]">30+</div>
                            <div class="text-[10px] uppercase tracking-wider text-[#8b949e] mt-0.5">Meetings / Mo</div>
                        </div>
                        <div class="neomorph-well p-3 rounded-2xl">
                            <div class="text-2xl font-black text-white">1 Mo</div>
                            <div class="text-[10px] uppercase tracking-wider text-[#8b949e] mt-0.5">Setup Time</div>
                        </div>
                    </div>
                </div>

                <!-- Case Study 2: Impact11 (Spatial UI 3D) -->
                <div class="spatial-card spatial-spotlight bg-[#161b22] border border-[#30363d] hover:border-[#3fb950]/60 rounded-3xl p-8 sm:p-10 transition-all duration-300 shadow-xl flex flex-col justify-between group relative">
                    <span class="style-tag style-tag-spatial">Spatial UI 3D</span>
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <span class="clay-badge clay-pill text-xs font-bold uppercase tracking-wider">
                                Marketing Agency
                            </span>
                            <span class="text-xs text-[#8b949e] font-mono">Ongoing Partner</span>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">Impact11 — Nimo Shkedy</h3>
                        <p class="text-xs sm:text-sm text-[#8b949e] leading-relaxed mb-6">
                            Refined the ideal customer profile across key verticals, engineered dynamic Clay lead enrichment waterfalls, and established an automated outbound infrastructure that streamlined high-ticket client acquisition.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-8">
                            <span class="brutal-badge">Clay Architecture</span>
                            <span class="brutal-badge">ICP Validation</span>
                            <span class="brutal-badge">Automated Routing</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-3 pt-6 border-t border-[#30363d]/80 text-center">
                        <div class="neomorph-well p-3 rounded-2xl">
                            <div class="text-2xl font-black text-white">100%</div>
                            <div class="text-[10px] uppercase tracking-wider text-[#8b949e] mt-0.5">ICP Match</div>
                        </div>
                        <div class="neomorph-well p-3 rounded-2xl">
                            <div class="text-2xl font-black text-[#3fb950]">5.0 / 5</div>
                            <div class="text-[10px] uppercase tracking-wider text-[#8b949e] mt-0.5">Client Rating</div>
                        </div>
                        <div class="neomorph-well p-3 rounded-2xl">
                            <div class="text-2xl font-black text-white">24/7</div>
                            <div class="text-[10px] uppercase tracking-wider text-[#8b949e] mt-0.5">Autonomous</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <hr class="minimal-divider max-w-7xl mx-auto my-6">

        {{-- ── TESTIMONIALS (MARQUEE) ── --}}
        <section id="testimonials" class="py-20 max-w-7xl mx-auto overflow-hidden relative">
            <div class="text-center mb-16 px-4">
                <div class="text-xs font-bold tracking-[0.2em] uppercase text-[#3fb950] mb-2">Founder Endorsements</div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-4 tracking-tight">
                    Trusted by Agency & SaaS Founders
                </h2>
                <p class="text-base text-[#8b949e] max-w-2xl mx-auto">
                    Direct feedback from leaders who scaled their pipeline with Hammad and Aman.
                </p>
            </div>

            <!-- Infinite Scroll Container -->
            @php
                $fallbackTestimonials = [
                    [
                        'client_name' => 'Nimo Shkedy',
                        'company' => 'Impact11',
                        'role' => 'Founder',
                        'rating' => 5,
                        'content' => 'Aman is an absolute hacker when it comes to Clay.com. His expertise is next level... Highly recommend him for any advanced outbound workflow.',
                        'avatar_url' => asset('pic/Nimo Shkedy.jpeg'),
                    ],
                    [
                        'client_name' => 'Tony S.',
                        'company' => 'PropertyOnion',
                        'role' => 'President',
                        'rating' => 5,
                        'content' => 'Very knowledgeable and a tremendous help with Clay tables and enrichments. Fast, reliable, and trustworthy. We will definitely work with them again!',
                        'avatar_url' => asset('pic/Tony S.jpeg'),
                    ],
                    [
                        'client_name' => 'Jay H.',
                        'company' => 'JZ Creates',
                        'role' => 'Owner',
                        'rating' => 5,
                        'content' => 'I hired Muhammad and his team to help generate leads for my cold email. They elevated my entire approach and the open rates were incredible. Highly recommend!',
                        'avatar_url' => asset('pic/JayH.jpeg'),
                    ],
                    [
                        'client_name' => 'Jeff Brown',
                        'company' => 'PaveTalent',
                        'role' => 'Founder',
                        'rating' => 5,
                        'content' => 'These guys are geniuses. They literally helped us book 30 sales meetings per month with their custom recruiting workflow and outbound engine.',
                        'avatar_url' => asset('pic/Jeff Brown.jpeg'),
                    ],
                ];

                $marqueeTestimonials = $testimonials->count() > 0
                    ? $testimonials
                    : collect($fallbackTestimonials);
            @endphp

            <div class="relative flex overflow-x-hidden">
                <div class="animate-marquee whitespace-nowrap flex gap-6">
                    @for($i = 0; $i < 2; $i++)
                        <div class="flex gap-6">
                            @foreach($marqueeTestimonials as $t)
                                @php
                                    $tAvatar = $t->avatar ?? ($t['avatar_url'] ?? null);
                                    $tName = is_object($t) ? $t->client_name : $t['client_name'];
                                    $tCompany = is_object($t) ? ($t->company ?: 'Independent') : ($t['company'] ?: 'Independent');
                                    $tRole = is_object($t) ? ($t->role ?: 'Client') : ($t['role'] ?: 'Client');
                                    $tRating = is_object($t) ? (int) $t->rating : (int) $t['rating'];
                                    $tContent = is_object($t) ? $t->content : $t['content'];
                                    $avatarPath = $tAvatar ? (str_starts_with($tAvatar, 'http') ? $tAvatar : asset('storage/' . $tAvatar)) : null;
                                @endphp
                                <div class="w-[360px] sm:w-[400px] bg-[#161b22] p-8 rounded-3xl border border-[#30363d] flex flex-col justify-between hover:border-[#3fb950]/50 transition-all duration-300 whitespace-normal">
                                    <div>
                                        <div class="flex items-center gap-1 text-amber-400 text-xs mb-4">
                                            @for($s = 1; $s <= 5; $s++)
                                                <i class="fa{{ $s <= $tRating ? 's' : 'r' }} fa-star"></i>
                                            @endfor
                                        </div>
                                        <p class="text-sm text-slate-200 mb-6 italic leading-relaxed">
                                            "{{ $tContent }}"
                                        </p>
                                    </div>
                                    <div class="flex items-center gap-3 pt-4 border-t border-[#30363d]/80">
                                        @if($avatarPath)
                                            <img src="{{ $avatarPath }}" alt="{{ $tName }}" class="w-11 h-11 rounded-full object-cover border border-[#3fb950]/40 flex-shrink-0">
                                        @else
                                            <div class="w-11 h-11 rounded-full bg-[#3fb950]/20 border border-[#3fb950]/40 text-[#3fb950] flex items-center justify-center font-black text-base uppercase flex-shrink-0">
                                                {{ substr($tName, 0, 1) }}
                                            </div>
                                        @endif
                                        <div>
                                            <div class="text-sm font-bold text-white">{{ $tName }}</div>
                                            <div class="text-xs text-[#8b949e]">{{ $tRole }} | {{ $tCompany }}</div>
                                            <div class="text-[10px] text-[#3fb950] font-semibold">✓ Verified Client</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endfor
                </div>
            </div>
        </section>

        <hr class="border-[#30363d]/80 max-w-7xl mx-auto">

        {{-- ── THE TECH STACK (WITH CRISP VECTOR ICONS) ── --}}
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center mb-16">
                <div class="text-xs font-bold tracking-[0.2em] uppercase text-[#3fb950] mb-2">Modern Tooling</div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-4 tracking-tight">
                    The Modern GTM Stack
                </h2>
                <p class="text-base text-[#8b949e] max-w-2xl mx-auto">
                    We test every tool weekly. We use what drives real pipeline and discard the rest.
                </p>
            </div>

            <div class="bg-[#161b22] border border-[#30363d] rounded-3xl p-6 sm:p-10 shadow-2xl">
                @php
                    $stackCategories = [
                        [
                            'icon' => 'fa-solid fa-sitemap text-[#3fb950]',
                            'title' => 'ORCHESTRATION & LOGIC',
                            'items' => [
                                ['name' => 'Clay.com', 'icon' => 'fa-solid fa-cube text-emerald-400'],
                                ['name' => 'n8n Automation', 'icon' => 'fa-solid fa-code-fork text-rose-400'],
                                ['name' => 'Custom Webhooks', 'icon' => 'fa-solid fa-network-wired text-blue-400'],
                                ['name' => 'Pipeline Logic', 'icon' => 'fa-solid fa-sliders text-amber-400'],
                            ]
                        ],
                        [
                            'icon' => 'fa-solid fa-database text-cyan-400',
                            'title' => 'LEAD GENERATION & DATA WATERFALL',
                            'items' => [
                                ['name' => 'Apollo.io', 'icon' => 'fa-solid fa-crosshairs text-indigo-400'],
                                ['name' => 'Sales Navigator', 'icon' => 'fa-brands fa-linkedin text-blue-500'],
                                ['name' => 'Apify Scrapers', 'icon' => 'fa-solid fa-spider text-orange-400'],
                                ['name' => 'Findymail', 'icon' => 'fa-solid fa-envelope-circle-check text-emerald-400'],
                                ['name' => 'Prospeo', 'icon' => 'fa-solid fa-magnifying-glass-location text-teal-400'],
                                ['name' => 'MillionVerifier', 'icon' => 'fa-solid fa-shield-halved text-green-400'],
                                ['name' => 'ZoomInfo', 'icon' => 'fa-solid fa-building-user text-sky-400'],
                                ['name' => 'Crunchbase', 'icon' => 'fa-solid fa-chart-line text-blue-400'],
                            ]
                        ],
                        [
                            'icon' => 'fa-solid fa-robot text-purple-400',
                            'title' => 'AI INTELLIGENCE & REASONING',
                            'items' => [
                                ['name' => 'OpenAI GPT-4o', 'icon' => 'fa-solid fa-brain text-emerald-400'],
                                ['name' => 'Anthropic Claude', 'icon' => 'fa-solid fa-sparkles text-amber-400'],
                                ['name' => 'OpenRouter', 'icon' => 'fa-solid fa-route text-violet-400'],
                                ['name' => 'Custom AI Agents', 'icon' => 'fa-solid fa-microchip text-pink-400'],
                            ]
                        ],
                        [
                            'icon' => 'fa-solid fa-paper-plane text-emerald-400',
                            'title' => 'MULTI-INBOX OUTBOUND INFRASTRUCTURE',
                            'items' => [
                                ['name' => 'Smartlead', 'icon' => 'fa-solid fa-bolt text-indigo-400'],
                                ['name' => 'Instantly', 'icon' => 'fa-solid fa-envelope-open-text text-blue-400'],
                                ['name' => 'HeyReach', 'icon' => 'fa-solid fa-handshake text-teal-400'],
                                ['name' => 'Email Bison', 'icon' => 'fa-solid fa-server text-cyan-400'],
                                ['name' => 'Zapmail', 'icon' => 'fa-solid fa-shield-heart text-amber-400'],
                            ]
                        ],
                        [
                            'icon' => 'fa-solid fa-tower-broadcast text-amber-400',
                            'title' => 'SIGNALS & MARKET INTELLIGENCE',
                            'items' => [
                                ['name' => 'Trigify', 'icon' => 'fa-solid fa-radar text-emerald-400'],
                                ['name' => 'BuiltWith Tech', 'icon' => 'fa-solid fa-layer-group text-blue-400'],
                                ['name' => 'Job Board Scrapers', 'icon' => 'fa-solid fa-briefcase text-orange-400'],
                                ['name' => 'Funding Alerts', 'icon' => 'fa-solid fa-money-bill-trend-up text-green-400'],
                            ]
                        ],
                    ];
                @endphp

                <div class="space-y-8">
                    @foreach($stackCategories as $cat)
                        <div class="grid grid-cols-1 md:grid-cols-[240px_1fr] gap-6 items-start pb-8 border-b border-[#30363d]/60 last:border-0 last:pb-0">
                            <div class="flex items-center gap-3 text-xs font-bold uppercase tracking-wider text-slate-300">
                                <i class="{{ $cat['icon'] }} text-base"></i>
                                <span>{{ $cat['title'] }}</span>
                            </div>

                            <div class="flex flex-wrap gap-2.5">
                                @foreach($cat['items'] as $item)
                                    <span class="px-3.5 py-2 bg-[#0d1117] hover:bg-[#21262d] text-slate-200 rounded-xl text-xs font-medium border border-[#30363d] hover:border-[#3fb950]/50 transition-colors inline-flex items-center gap-2 cursor-default">
                                        <i class="{{ $item['icon'] }}"></i>
                                        <span>{{ $item['name'] }}</span>
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Final Cinematic CTA Section (Liquid Glass + Skeuomorphism) -->
        <section class="w-full px-4 py-16">
            <div class="max-w-5xl mx-auto">
                <div class="liquid-glass-card p-8 sm:p-16 text-center shadow-2xl relative overflow-hidden">
                    <span class="style-tag style-tag-liquid">Liquid Glass</span>
                    <div class="absolute -top-24 -right-24 w-80 h-80 bg-[#3fb950]/15 rounded-full blur-[130px] pointer-events-none"></div>

                    <h3 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-4 tracking-tight">
                        Ready to Stop Guessing with Outbound?
                    </h3>
                    <p class="text-[#8b949e] text-base sm:text-lg mb-8 max-w-2xl mx-auto leading-relaxed">
                        Let's build a predictable, automated GTM engine tailored to your market. Zero guesswork, pure pipeline.
                    </p>

                    <div class="flex flex-wrap justify-center gap-5">
                        <a href="{{ route('nexagtm.book-call') }}" 
                           class="skeuo-button px-9 py-4 text-white font-extrabold text-sm uppercase tracking-wider flex items-center justify-center gap-2.5 relative">
                            <span class="style-tag style-tag-skeuo">Skeuomorphism</span>
                            <i class="fa-solid fa-calendar-days"></i>
                            <span>Schedule a Free Strategy Call</span>
                        </a>
                        <a href="{{ route('nexagtm.contact') }}" 
                           class="neomorph-button px-8 py-4 text-white font-bold text-sm uppercase tracking-wider flex items-center justify-center gap-2 relative">
                            <span class="style-tag style-tag-neomorph">Neomorphism</span>
                            <i class="fa-regular fa-envelope"></i>
                            <span>Contact Us Directly</span>
                        </a>
                    </div>

                    <!-- Footer Micro Reassurance -->
                    <div class="flex flex-wrap justify-center items-center gap-6 mt-10 pt-6 border-t border-white/10 text-xs text-[#8b949e]">
                        <span class="flex items-center gap-1.5">
                            <span class="skeuo-led"></span>
                            &lt; 2-hour response time
                        </span>
                        <span class="flex items-center gap-1.5">
                            <span class="skeuo-led"></span>
                            No long-term commitments
                        </span>
                        <span class="flex items-center gap-1.5">
                            <span class="skeuo-led"></span>
                            100% money-back quality guarantee
                        </span>
                    </div>
                </div>
            </div>
        </section>

    </main>
</x-layout.mainlayout>