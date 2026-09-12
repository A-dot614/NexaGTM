<x-layout.mainlayout>
    <x-slot:title>About Us — NexaGTM | Meet the Founders & GTM Philosophy</x-slot:title>

    <main class="relative overflow-hidden text-[#e0e1dd]">
        <!-- Ambient decorative glows -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[500px] bg-[#3fb950]/10 rounded-full blur-[160px] pointer-events-none -z-10"></div>
        <div class="absolute top-[45%] right-5 w-[450px] h-[450px] bg-[#3fb950]/5 rounded-full blur-[140px] pointer-events-none -z-10"></div>

        {{-- ── HERO SECTION ── --}}
        <section class="max-w-6xl mx-auto px-4 sm:px-6 pt-10 pb-16 sm:pb-24 text-center animate-fade-in-up relative">
            <!-- Pill Tag (Claymorphic Pill + Skeuomorphic Diode) -->
            <div class="clay-badge clay-pill inline-flex items-center gap-2.5 px-5 py-2 mb-6 text-xs font-bold tracking-wide relative cursor-pointer">
                <span class="style-tag style-tag-clay">Claymorphism</span>
                <span class="skeuo-led"></span>
                <span>The NexaGTM Story & Philosophy</span>
            </div>

            <h1 class="text-4xl sm:text-6xl lg:text-7xl font-black text-white leading-[1.1] mb-6 tracking-tight">
                Engineering High-Yield<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#3fb950] via-[#56d364] to-[#2ea043]">Outbound Engines.</span>
            </h1>

            <p class="text-base sm:text-xl text-[#8b949e] max-w-3xl mx-auto mb-10 leading-relaxed">
                Traditional outbound is broken. Spraying unverified lists with generic AI copy destroys deliverability and wastes pipeline. We build signal-driven, automated infrastructure that turns cold prospects into booked sales conversations.
            </p>

            <!-- Quick Philosophy Badges (Neomorphism) -->
            <div class="flex flex-wrap justify-center items-center gap-3 text-xs text-[#8b949e] relative">
                <span class="style-tag style-tag-neomorph">Neomorphic Badges</span>
                <div class="neomorph-button flex items-center gap-2 px-4 py-2">
                    <i class="fa-solid fa-code-commit text-[#3fb950]"></i>
                    <span>Practitioner-Led Execution</span>
                </div>
                <div class="neomorph-button flex items-center gap-2 px-4 py-2">
                    <i class="fa-solid fa-key text-[#3fb950]"></i>
                    <span>100% Client Asset Ownership</span>
                </div>
                <div class="neomorph-button flex items-center gap-2 px-4 py-2">
                    <i class="fa-solid fa-filter text-[#3fb950]"></i>
                    <span>Strict ICP & Signal Targeting</span>
                </div>
            </div>
        </section>

        {{-- ── TRACTION & METRICS BAR (Neomorphic Pods & Debossed Numbers) ── --}}
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20 relative">
            <span class="style-tag style-tag-neomorph">Neomorphism</span>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                <div class="neomorph-card p-6 text-center group relative">
                    <div class="neomorph-well p-3 rounded-2xl mb-2">
                        <div class="text-3xl sm:text-5xl font-black text-white group-hover:text-[#3fb950] transition-colors">10K+</div>
                    </div>
                    <div class="text-xs font-semibold uppercase tracking-wider text-[#8b949e]">Waterfall Leads Enriched</div>
                    <p class="text-[11px] text-slate-500 mt-2">Zero bounce rate across all client domains</p>
                </div>

                <div class="neomorph-card p-6 text-center group relative">
                    <div class="neomorph-well p-3 rounded-2xl mb-2">
                        <div class="text-3xl sm:text-5xl font-black text-white group-hover:text-[#3fb950] transition-colors">150+</div>
                    </div>
                    <div class="text-xs font-semibold uppercase tracking-wider text-[#8b949e]">Clay Workflows Built</div>
                    <p class="text-[11px] text-slate-500 mt-2">Custom scraping, AI reasoning & routing</p>
                </div>

                <div class="neomorph-card p-6 text-center group relative">
                    <div class="neomorph-well p-3 rounded-2xl mb-2">
                        <div class="text-3xl sm:text-5xl font-black text-white group-hover:text-[#3fb950] transition-colors">15–30</div>
                    </div>
                    <div class="text-xs font-semibold uppercase tracking-wider text-[#8b949e]">Meetings / Mo / Client</div>
                    <p class="text-[11px] text-slate-500 mt-2">Strictly qualified decision-makers</p>
                </div>

                <div class="neomorph-card p-6 text-center group relative">
                    <div class="neomorph-well p-3 rounded-2xl mb-2">
                        <div class="text-3xl sm:text-5xl font-black text-white group-hover:text-[#3fb950] transition-colors">99.2%</div>
                    </div>
                    <div class="text-xs font-semibold uppercase tracking-wider text-[#8b949e]">Inbox Deliverability</div>
                    <p class="text-[11px] text-slate-500 mt-2">SPF, DKIM, DMARC & custom warmup</p>
                </div>
            </div>
        </section>

        <hr class="minimal-divider max-w-7xl mx-auto my-6">

        {{-- ── OUR 4 OPERATING PRINCIPLES (Spatial UI 3D Cards + Clay Bubbles) ── --}}
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="max-w-3xl mb-16">
                <span class="text-xs font-bold tracking-[0.2em] uppercase text-[#3fb950] block mb-2">Our Manifesto</span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-4 tracking-tight">
                    The 4 Operating Principles of NexaGTM
                </h2>
                <p class="text-base sm:text-lg text-[#8b949e]">
                    Why we reject traditional agency playbooks and how our engineered approach produces consistent, predictable revenue.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Principle 1: Spatial UI 3D -->
                <div class="spatial-card spatial-spotlight bg-[#161b22] border border-[#30363d] rounded-3xl p-8 hover:border-[#3fb950]/50 transition-all group relative overflow-hidden">
                    <span class="style-tag style-tag-spatial">Spatial UI 3D</span>
                    <div class="flex items-center gap-3 mb-4">
                        <span class="clay-step-bubble">01</span>
                        <div class="text-xs font-bold uppercase tracking-widest text-[#3fb950]">Principle 01</div>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-3">Signals & Intent > Raw Volume</h3>
                    <p class="text-sm text-[#8b949e] leading-relaxed">
                        Reaching 200 prospects who just posted a relevant job opening, announced a funding round, or engaged with your competitor's content yields 10x more qualified replies than emailing 10,000 static contacts from Apollo. We build signal triggers first.
                    </p>
                </div>

                <!-- Principle 2: Spatial UI 3D -->
                <div class="spatial-card spatial-spotlight bg-[#161b22] border border-[#30363d] rounded-3xl p-8 hover:border-[#3fb950]/50 transition-all group relative overflow-hidden">
                    <span class="style-tag style-tag-spatial">Spatial UI 3D</span>
                    <div class="flex items-center gap-3 mb-4">
                        <span class="clay-step-bubble">02</span>
                        <div class="text-xs font-bold uppercase tracking-widest text-[#3fb950]">Principle 02</div>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-3">Infrastructure You Own Forever</h3>
                    <p class="text-sm text-[#8b949e] leading-relaxed">
                        Traditional agencies hold inboxes, lists, and copy hostage so you can never leave. At NexaGTM, every domain, inbox, Clay workspace, and sequence we build belongs 100% to you. If we part ways, your outbound engine keeps running seamlessly.
                    </p>
                </div>

                <!-- Principle 3: Spatial UI 3D -->
                <div class="spatial-card spatial-spotlight bg-[#161b22] border border-[#30363d] rounded-3xl p-8 hover:border-[#3fb950]/50 transition-all group relative overflow-hidden">
                    <span class="style-tag style-tag-spatial">Spatial UI 3D</span>
                    <div class="flex items-center gap-3 mb-4">
                        <span class="clay-step-bubble">03</span>
                        <div class="text-xs font-bold uppercase tracking-widest text-[#3fb950]">Principle 03</div>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-3">Waterfall Data Verification</h3>
                    <p class="text-sm text-[#8b949e] leading-relaxed">
                        No single database has accurate data. We run an automated cascade: check primary source, fall back to secondary scraper, run catch-all verification through MillionVerifier, and scrub spam traps. You never burn domains sending to invalid addresses.
                    </p>
                </div>

                <!-- Principle 4: Spatial UI 3D -->
                <div class="spatial-card spatial-spotlight bg-[#161b22] border border-[#30363d] rounded-3xl p-8 hover:border-[#3fb950]/50 transition-all group relative overflow-hidden">
                    <span class="style-tag style-tag-spatial">Spatial UI 3D</span>
                    <div class="flex items-center gap-3 mb-4">
                        <span class="clay-step-bubble">04</span>
                        <div class="text-xs font-bold uppercase tracking-widest text-[#3fb950]">Principle 04</div>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-3">Contextual AI That Humans Read</h3>
                    <p class="text-sm text-[#8b949e] leading-relaxed">
                        Buyers can smell lazy ChatGPT prompts from a mile away. Our AI agents don't generate fluff; they synthesize specific company context — quoting exact job description requirements or specific tech stack changes — into sharp, 75-word emails that get responses.
                    </p>
                </div>
            </div>
        </section>

        <hr class="border-[#30363d]/80 max-w-7xl mx-auto">

        {{-- ── HOW THE GTM ENGINE OPERATES (PIPELINE ARCHITECTURE) ── --}}
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold tracking-[0.2em] uppercase text-[#3fb950] block mb-2">The Architecture</span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-4 tracking-tight">
                    How Signals, Data & Outbound Connect
                </h2>
                <p class="text-base text-[#8b949e]">
                    Every campaign follows this rigorous four-stage engineering sequence. Each layer feeds clean intelligence to the next.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <!-- Step 1: Spatial UI 3D Card -->
                <div class="spatial-card spatial-spotlight bg-[#161b22] border border-[#30363d] rounded-3xl p-6 hover:border-[#3fb950]/50 transition-all flex flex-col justify-between relative">
                    <span class="style-tag style-tag-spatial">Spatial</span>
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="clay-step-bubble">01</span>
                            <span class="brutal-badge text-[10px]">Discovery</span>
                        </div>
                        <h4 class="text-lg font-bold text-white mb-2">ICP Research & TAM Mapping</h4>
                        <p class="text-xs text-[#8b949e] leading-relaxed mb-6">
                            Define granular buyer profiles, map your total addressable market, and identify the top 10% showing active buying intent.
                        </p>
                    </div>
                    <div class="flex flex-wrap gap-1.5 pt-4 border-t border-[#30363d]/60">
                        <span class="brutal-badge text-[10px]">Clay</span>
                        <span class="brutal-badge text-[10px]">Apollo</span>
                        <span class="brutal-badge text-[10px]">Sales Nav</span>
                    </div>
                </div>

                <!-- Step 2: Spatial UI 3D Card -->
                <div class="spatial-card spatial-spotlight bg-[#161b22] border border-[#30363d] rounded-3xl p-6 hover:border-[#3fb950]/50 transition-all flex flex-col justify-between relative">
                    <span class="style-tag style-tag-spatial">Spatial</span>
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="clay-step-bubble">02</span>
                            <span class="brutal-badge text-[10px]">Scraping</span>
                        </div>
                        <h4 class="text-lg font-bold text-white mb-2">Signal Detection & Scraping</h4>
                        <p class="text-xs text-[#8b949e] leading-relaxed mb-6">
                            Capture hiring surges, funding rounds, leadership changes, and LinkedIn activity to surface warm accounts before your competitors do.
                        </p>
                    </div>
                    <div class="flex flex-wrap gap-1.5 pt-4 border-t border-[#30363d]/60">
                        <span class="brutal-badge text-[10px]">Trigify</span>
                        <span class="brutal-badge text-[10px]">Apify</span>
                        <span class="brutal-badge text-[10px]">BuiltWith</span>
                    </div>
                </div>

                <!-- Step 3: Spatial UI 3D Card -->
                <div class="spatial-card spatial-spotlight bg-[#161b22] border border-[#30363d] rounded-3xl p-6 hover:border-[#3fb950]/50 transition-all flex flex-col justify-between relative">
                    <span class="style-tag style-tag-spatial">Spatial</span>
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="clay-step-bubble">03</span>
                            <span class="brutal-badge text-[10px]">Enrichment</span>
                        </div>
                        <h4 class="text-lg font-bold text-white mb-2">Waterfall Enrichment</h4>
                        <p class="text-xs text-[#8b949e] leading-relaxed mb-6">
                            Cascading email finding and phone enrichment with multi-provider catch-all verifications for 0% bounce rate security.
                        </p>
                    </div>
                    <div class="flex flex-wrap gap-1.5 pt-4 border-t border-[#30363d]/60">
                        <span class="brutal-badge text-[10px]">Findymail</span>
                        <span class="brutal-badge text-[10px]">Prospeo</span>
                        <span class="brutal-badge text-[10px]">MillionVerifier</span>
                    </div>
                </div>

                <!-- Step 4: Spatial UI 3D Card -->
                <div class="spatial-card spatial-spotlight bg-[#161b22] border border-[#30363d] rounded-3xl p-6 hover:border-[#3fb950]/50 transition-all flex flex-col justify-between relative">
                    <span class="style-tag style-tag-spatial">Spatial</span>
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="clay-step-bubble">04</span>
                            <span class="brutal-badge text-[10px]">Execution</span>
                        </div>
                        <h4 class="text-lg font-bold text-white mb-2">Multi-Inbox Sequencing</h4>
                        <p class="text-xs text-[#8b949e] leading-relaxed mb-6">
                            AI-personalized copy delivered across warmed secondary inboxes and LinkedIn touchpoints with continuous A/B subject line optimization.
                        </p>
                    </div>
                    <div class="flex flex-wrap gap-1.5 pt-4 border-t border-[#30363d]/60">
                        <span class="brutal-badge text-[10px]">Smartlead</span>
                        <span class="brutal-badge text-[10px]">Instantly</span>
                        <span class="brutal-badge text-[10px]">HeyReach</span>
                    </div>
                </div>
            </div>

            <!-- Result Highlight (Liquid Glass) -->
            <div class="liquid-glass-card p-8 flex flex-col sm:flex-row items-center justify-between gap-6 shadow-2xl relative">
                <span class="style-tag style-tag-liquid">Liquid Glass</span>
                <div class="flex items-center gap-5">
                    <div class="w-14 h-14 rounded-2xl clay-badge flex items-center justify-center text-3xl flex-shrink-0">
                        🗓️
                    </div>
                    <div>
                        <div class="text-xs font-bold uppercase tracking-widest text-[#3fb950]">The Direct Output</div>
                        <h3 class="text-xl sm:text-2xl font-bold text-white mt-0.5">A Consistent Flow of Qualified Pipeline</h3>
                        <p class="text-xs sm:text-sm text-[#8b949e] mt-1">Calendar invites landing on your sales team's calendar without SDR hiring overhead.</p>
                    </div>
                </div>
                <a href="{{ route('nexagtm.book-call') }}" 
                   class="skeuo-button px-8 py-3.5 text-white font-bold text-xs uppercase tracking-wider whitespace-nowrap">
                    Build Your Engine
                </a>
            </div>
        </section>

        <hr class="minimal-divider max-w-7xl mx-auto my-6">

        {{-- ── MEET THE FOUNDERS (Glassmorphic Cards + Brutalist Badges) ── --}}
        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold tracking-[0.2em] uppercase text-[#3fb950] block mb-2">Leadership</span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-4 tracking-tight">
                    Meet the Founders
                </h2>
                <p class="text-base text-[#8b949e]">
                    Two technical GTM specialists. No account managers, no offshore outsourcing — you work directly with the practitioners who architect and optimize your engine.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-stretch">
                
                <!-- Muhammad Hammad Card (Glassmorphic) -->
                <div class="glass-card rounded-3xl p-8 sm:p-10 flex flex-col justify-between transition-all duration-300 shadow-xl group relative">
                    <span class="style-tag style-tag-glass">Glassmorphism</span>
                    <div>
                        <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6 mb-6">
                            <div class="relative">
                                <img src="{{ asset('pic/Hammad Pic.png') }}" alt="Muhammad Hammad" 
                                     class="w-28 h-28 rounded-2xl border-2 border-[#3fb950]/50 object-cover shadow-2xl group-hover:border-[#3fb950] transition-colors clay-pill p-1">
                                <span class="absolute -bottom-2 -right-2 w-6 h-6 rounded-full bg-[#3fb950] text-[#0d1117] flex items-center justify-center text-xs font-bold shadow-md">
                                    ✓
                                </span>
                            </div>
                            <div class="text-center sm:text-left">
                                <h3 class="text-2xl font-bold text-white tracking-tight">Muhammad Hammad</h3>
                                <div class="text-xs font-bold uppercase tracking-widest text-[#3fb950] mt-1">Founder & Outbound Strategist</div>
                                <div class="text-xs text-[#8b949e] mt-1">GTM Architecture · Sequencing · Conversion</div>
                            </div>
                        </div>

                        <p class="text-xs sm:text-sm text-[#8b949e] leading-relaxed mb-6">
                            "I help B2B SaaS and high-ticket service companies fill their sales calendars with qualified decision-makers. My focus is on ICP validation, deliverability infrastructure, and messaging angles that convert cold prospects into booked calls."
                        </p>

                        <!-- Specialties Pills (Neo-Brutalism) -->
                        <div class="flex flex-wrap gap-2 mb-8">
                            <span class="brutal-badge">ICP Mapping</span>
                            <span class="brutal-badge">Copywriting</span>
                            <span class="brutal-badge">Smartlead / Instantly</span>
                            <span class="brutal-badge">Deliverability Audit</span>
                        </div>
                    </div>

                    <!-- Connect Channels (Neomorphism) -->
                    <div class="pt-6 border-t border-white/10 flex flex-wrap gap-3">
                        <a href="https://www.linkedin.com/in/gtmautomationexpert/" target="_blank" 
                           class="neomorph-button flex-1 py-2.5 px-3 text-xs font-semibold flex items-center justify-center gap-2 transition-all">
                            <i class="fa-brands fa-linkedin text-[#0077B5]"></i>
                            <span>LinkedIn</span>
                        </a>
                        <a href="https://www.upwork.com/freelancers/~01ce573140b4d99a43" target="_blank" 
                           class="neomorph-button flex-1 py-2.5 px-3 text-xs font-semibold flex items-center justify-center gap-2 transition-all">
                            <i class="fa-solid fa-star text-amber-400"></i>
                            <span>Upwork</span>
                        </a>
                        <a href="https://wa.me/923444543772" target="_blank" 
                           class="neomorph-button py-2.5 px-4 text-xs font-semibold flex items-center justify-center transition-all">
                            <i class="fa-brands fa-whatsapp text-[#25D366]"></i>
                        </a>
                    </div>
                </div>

                <!-- Abdul Rehman (Aman) Card (Glassmorphic) -->
                <div class="glass-card rounded-3xl p-8 sm:p-10 flex flex-col justify-between transition-all duration-300 shadow-xl group relative">
                    <span class="style-tag style-tag-glass">Glassmorphism</span>
                    <div>
                        <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6 mb-6">
                            <div class="relative">
                                <img src="{{ asset('pic/Abdul Pic.png') }}" alt="Abdul Rehman (Aman)" 
                                     class="w-28 h-28 rounded-2xl border-2 border-[#3fb950]/50 object-cover shadow-2xl group-hover:border-[#3fb950] transition-colors clay-pill p-1">
                                <span class="absolute -bottom-2 -right-2 w-6 h-6 rounded-full bg-[#3fb950] text-[#0d1117] flex items-center justify-center text-xs font-bold shadow-md">
                                    ✓
                                </span>
                            </div>
                            <div class="text-center sm:text-left">
                                <h3 class="text-2xl font-bold text-white tracking-tight">Abdul Rehman (Aman)</h3>
                                <div class="text-xs font-bold uppercase tracking-widest text-[#3fb950] mt-1">Co-Founder & Head of Automation</div>
                                <div class="text-xs text-[#8b949e] mt-1">Clay Architect · Custom Scrapers · AI Pipelines</div>
                            </div>
                        </div>

                        <p class="text-xs sm:text-sm text-[#8b949e] leading-relaxed mb-6">
                            "If a human has to manually copy, enrich, or qualify a lead more than twice, that is a bug in your go-to-market architecture. I design automated data waterfalls, custom scrapers, and AI enrichment systems that run 24/7."
                        </p>

                        <!-- Specialties Pills (Neo-Brutalism) -->
                        <div class="flex flex-wrap gap-2 mb-8">
                            <span class="brutal-badge">Clay.com Expert</span>
                            <span class="brutal-badge">Waterfall Cascades</span>
                            <span class="brutal-badge">Apify / Scrapers</span>
                            <span class="brutal-badge">Webhooks & APIs</span>
                        </div>
                    </div>

                    <!-- Connect Channels (Neomorphism) -->
                    <div class="pt-6 border-t border-white/10 flex flex-wrap gap-3">
                        <a href="https://www.linkedin.com/in/abdulrehman-aman/" target="_blank" 
                           class="neomorph-button flex-1 py-2.5 px-3 text-xs font-semibold flex items-center justify-center gap-2 transition-all">
                            <i class="fa-brands fa-linkedin text-[#0077B5]"></i>
                            <span>LinkedIn</span>
                        </a>
                        <a href="https://www.upwork.com/freelancers/~010af79d147b770eb1" target="_blank" 
                           class="neomorph-button flex-1 py-2.5 px-3 text-xs font-semibold flex items-center justify-center gap-2 transition-all">
                            <i class="fa-solid fa-star text-amber-400"></i>
                            <span>Upwork</span>
                        </a>
                        <a href="https://wa.me/923257180271" target="_blank" 
                           class="neomorph-button py-2.5 px-4 text-xs font-semibold flex items-center justify-center transition-all">
                            <i class="fa-brands fa-whatsapp text-[#25D366]"></i>
                        </a>
                    </div>
                </div>

            </div>
        </section>

        <!-- Final CTA Section -->
        <section class="w-full px-4 py-16">
            <div class="max-w-5xl mx-auto">
                <div class="relative bg-gradient-to-b from-[#161b22] to-[#0d1117] border border-[#3fb950]/40 rounded-3xl p-8 sm:p-16 text-center shadow-2xl backdrop-blur-sm overflow-hidden">
                    <div class="absolute -top-24 -right-24 w-80 h-80 bg-[#3fb950]/15 rounded-full blur-[130px] pointer-events-none"></div>

                    <h3 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-4 tracking-tight">
                        Want to See Our Workflows in Action?
                    </h3>
                    <p class="text-[#8b949e] text-base sm:text-lg mb-8 max-w-2xl mx-auto leading-relaxed">
                        Book a 30-minute discovery consultation. We will show you our live Clay tables, signal scraping pipelines, and client response rates.
                    </p>

                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="{{ route('nexagtm.book-call') }}" 
                           class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-[#3fb950] to-[#2ea043] hover:from-[#49c95b] hover:to-[#34b14b] text-white font-bold px-8 py-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-[0_0_25px_rgba(63,185,80,0.35)]">
                            <i class="fa-solid fa-calendar-days"></i>
                            <span>Schedule a Strategy Call</span>
                        </a>
                        <a href="{{ route('nexagtm.gtm-playbooks') }}" 
                           class="inline-flex items-center justify-center gap-2 bg-[#0d1117] hover:bg-[#161b22] border border-[#30363d] hover:border-[#3fb950]/60 text-white font-bold px-8 py-4 rounded-xl transition-all">
                            <i class="fa-solid fa-book-bookmark"></i>
                            <span>View GTM Playbooks</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </main>
</x-layout.mainlayout>