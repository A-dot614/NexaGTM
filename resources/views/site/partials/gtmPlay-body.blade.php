        <!-- Ambient decorative glows -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[850px] h-[550px] bg-[#3fb950]/10 rounded-full blur-[160px] pointer-events-none -z-10"></div>
        <div class="absolute top-[35%] -right-20 w-[450px] h-[450px] bg-[#3fb950]/5 rounded-full blur-[140px] pointer-events-none -z-10"></div>

        <section id="case-studies" class="py-16 sm:py-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-16 animate-fade-in-up">
                <!-- Claymorphic Pill -->
                <div class="clay-badge clay-pill inline-flex items-center gap-2.5 px-5 py-2 mb-6 text-xs font-bold uppercase tracking-wider relative cursor-pointer">
                    <span class="style-tag style-tag-clay">Claymorphism</span>
                    <span class="skeuo-led"></span>
                    <span>Battle-Tested Outbound Blueprints</span>
                </div>

                <h1 class="text-4xl sm:text-6xl font-black text-white mb-4 tracking-tight leading-[1.1]">
                    NexaGTM <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#3fb950] via-[#56d364] to-[#2ea043]">Playbooks</span>
                </h1>
                <p class="text-[#8b949e] text-base sm:text-lg max-w-2xl mx-auto leading-relaxed">
                    Real workflows engineered for real clients. Every metric, scraping workflow, and waterfall cascade verified in live production.
                </p>

                <!-- Filter Controls (Neomorphic Segmented Pills) -->
                {{-- <div class="flex flex-wrap justify-center items-center gap-2.5 mt-8 p-1.5 neomorph-well max-w-xl mx-auto rounded-full relative">
                    <span class="style-tag style-tag-neomorph">Neomorphic Switcher</span>
                    <button class="neomorph-button px-5 py-2 text-xs font-bold active">All Playbooks</button>
                    <button class="neomorph-button px-5 py-2 text-xs font-bold">Recruitment & Staffing</button>
                    <button class="neomorph-button px-5 py-2 text-xs font-bold">B2B SaaS</button>
                    <button class="neomorph-button px-5 py-2 text-xs font-bold">Marketing Agencies</button>
                </div> --}}
            </div>

            <!-- Portfolio Grid -->
            @if($playbooks->count())
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach($playbooks as $index => $pb)
                    <article class="spatial-card p-6 sm:p-8 rounded-3xl flex flex-col relative group transition-all duration-300">
                        <span class="style-tag spatial">Spatial UI</span>

                        <!-- Header Row -->
                        <div class="flex items-start justify-between gap-4 mb-5">
                            <div class="w-12 h-12 rounded-xl bg-[#3fb950]/10 border border-[#3fb950]/30 flex items-center justify-center text-[#3fb950] flex-shrink-0">
                                <i class="fa-solid fa-book-open text-lg"></i>
                            </div>
                            <span class="text-[10px] font-mono font-bold uppercase tracking-widest text-[#8a9e8a] border border-[#30363d] rounded-full px-3 py-1">
                                Playbook #{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>
                        </div>

                        <h3 class="text-xl sm:text-2xl font-bold text-white mb-3 tracking-tight leading-snug">
                            {{ $pb->name }}
                        </h3>

                        @if($pb->description)
                            <p class="text-xs sm:text-sm text-[#8b949e] leading-relaxed mb-6 whitespace-pre-line">
                                {{ $pb->description }}
                            </p>
                        @endif

                        @if($pb->video_url)
                            <div class="mb-6">
                                <x-playbook-video-player :playbook="$pb" />
                            </div>
                        @endif

                        <div class="mt-auto pt-6 border-t border-[#21262d] flex flex-wrap items-center gap-3">
                            <a href="{{ $pb->template_url }}" target="_blank" rel="noopener noreferrer"
                               class="skeuo-button px-5 py-3 text-white font-bold text-xs uppercase tracking-wider rounded-xl flex items-center justify-center gap-2">
                                <i class="fa-solid fa-file-lines text-xs"></i>
                                <span>Open Template</span>
                            </a>
                            @if($pb->video_url)
                                <a href="{{ $pb->video_url }}" target="_blank" rel="noopener noreferrer"
                                   class="neomorph-button px-5 py-3 text-white font-bold text-xs uppercase tracking-wider rounded-xl flex items-center justify-center gap-2"
                                   title="Open original video source">
                                    <i class="fa-solid fa-arrow-up-right-from-square text-xs text-[#3fb950]"></i>
                                    <span>Source Video</span>
                                </a>
                            @endif
                        </div>
                    </article>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16">
                    <div class="text-4xl mb-3">📘</div>
                    <p class="text-base font-bold text-white">Playbooks are being loaded.</p>
                    <p class="text-sm text-[#8a9e8a] mt-1">New battle-tested GTM blueprints are added regularly.</p>
                </div>
            @endif
        </section>

        <!-- CTA Section (Liquid Glass) -->
        <section class="max-w-5xl mx-auto px-4 pb-20">
            <div class="liquid-glass-card p-8 sm:p-12 text-center relative overflow-hidden">
                <span class="style-tag style-tag-liquid">Liquid Glass</span>
                <h3 class="text-2xl sm:text-4xl font-extrabold text-white mb-3">Want a Bespoke Outbound Playbook?</h3>
                <p class="text-[#8b949e] text-sm sm:text-base max-w-xl mx-auto mb-8">
                    We will architect a custom Clay table and multi-channel outreach engine designed specifically for your ICP.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('nexagtm.book-call') }}" class="skeuo-button px-8 py-3.5 text-white font-bold text-xs uppercase tracking-wider">
                        Book a Strategy Consultation
                    </a>
                    <a href="{{ route('nexagtm.contact') }}" class="neomorph-button px-8 py-3.5 text-white font-bold text-xs uppercase tracking-wider">
                        Request Scoped Quote
                    </a>
                </div>
            </div>
        </section>
