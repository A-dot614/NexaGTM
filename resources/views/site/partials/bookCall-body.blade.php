<!-- Hero Header -->
        <div class="relative mb-10 sm:mb-14 mt-8" data-aos="fade-up">
            <!-- Ambient Glow -->
            <div class="absolute -top-16 -left-16 w-80 h-80 bg-[#3fb950]/10 rounded-full blur-[120px] pointer-events-none"></div>

            <!-- Status Pill -->
            <!-- Status Pill: Claymorphism & Skeuomorphism -->
            <div class="inline-flex items-center gap-2.5 px-4 py-2 mb-6 rounded-full clay-badge text-[#3fb950] text-xs font-bold uppercase tracking-widest">
                <span class="skeuo-led inline-block"></span>
                <span>30-Minute Free Strategy Consultation</span>
                <span class="style-tag clay">Clay Badge</span>
            </div>

            <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight text-white mb-5 leading-[1.1]">
                Schedule Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#3fb950] via-[#52d966] to-[#2d8a3a]">Strategy Call</span>
            </h1>
            
            <p class="text-base sm:text-lg text-[#8a9e8a] max-w-2xl leading-relaxed">
                Pick a slot that fits your schedule using our live calendar below — choose your meeting format, time, and timezone in seconds.
            </p>
        </div>

        <!-- Success Notification Banner -->
        @if (session('status'))
            <div class="mb-10 p-5 rounded-2xl bg-[#004b23]/40 border border-[#3fb950] text-white flex items-start gap-4 shadow-[0_0_25px_rgba(63,185,80,0.25)]" data-aos="fade-in">
                <div class="w-10 h-10 rounded-xl bg-[#3fb950]/20 flex items-center justify-center flex-shrink-0 text-[#3fb950] text-xl">
                    ✓
                </div>
                <div>
                    <h3 class="text-base font-bold text-white mb-1">Booking Confirmed!</h3>
                    <p class="text-sm text-[#cbd5e1]">{{ session('status') }}</p>
                </div>
            </div>
        @endif

        <!-- Error Notification Banner -->
        @if ($errors->any())
            <div class="mb-10 p-5 rounded-2xl bg-red-950/40 border border-red-500/50 text-white flex items-start gap-4" data-aos="fade-in">
                <div class="w-10 h-10 rounded-xl bg-red-500/20 flex items-center justify-center flex-shrink-0 text-red-400 text-xl">
                    !
                </div>
                <div>
                    <h3 class="text-base font-bold text-red-300 mb-1">Please correct the errors below</h3>
                    <ul class="text-sm text-red-200 list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- Main Booking Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
            
            <!-- Left 8 Columns: Calendly Live Scheduler -->
            <div class="lg:col-span-8">
                
                <div class="spatial-card p-4 sm:p-6 lg:p-8 rounded-3xl relative overflow-hidden">
                    <span class="style-tag spatial">Calendly Scheduler</span>
                    <div class="absolute -top-12 -right-12 w-40 h-40 bg-[#3fb950]/15 rounded-full blur-3xl pointer-events-none"></div>

                    <!-- Calendly Inline Embed -->
                    <div class="calendly-inline-widget" data-url="https://calendly.com/hammad1122/new-meeting?hide_gdpr_banner=1&primary_color=3fb950" style="min-width:320px;height:760px;"></div>
                </div>
            </div>

            <!-- Right 4 Columns: Value Props -->
            <div class="lg:col-span-4 space-y-6 lg:sticky lg:top-28">

                <!-- After Booking Timeline: Liquid Glass Card -->
                <div class="liquid-glass-card p-6 rounded-3xl relative overflow-hidden">
                    <span class="style-tag liquid">Liquid Glass</span>
                    <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-[#3fb950]/10 rounded-full blur-2xl pointer-events-none"></div>

                    <div class="flex items-center justify-between mb-5 pb-3 border-b border-[#21262d]">
                        <h3 class="text-xs font-black uppercase tracking-widest text-[#3fb950]">What Happens After You Book</h3>
                        <span class="style-tag clay">Clay Bubbles</span>
                    </div>

                    <ol class="space-y-4 text-xs text-[#8a9e8a]">
                        <li class="flex items-start gap-3">
                            <div class="clay-step-bubble flex-shrink-0 mt-0.5">1</div>
                            <div>
                                <strong class="text-white block">Instant Calendar Invite</strong>
                                You receive the Google Meet / call details by email the moment you confirm a slot.
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="clay-step-bubble flex-shrink-0 mt-0.5">2</div>
                            <div>
                                <strong class="text-white block">Rapid Prep & Discovery</strong>
                                We review your ICP, domain health, and outbound stack before the session.
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="clay-step-bubble flex-shrink-0 mt-0.5">3</div>
                            <div>
                                <strong class="text-white block">Actionable Roadmap</strong>
                                Walk away with a specific plan to book 15–30 qualified calls per month.
                            </div>
                        </li>
                    </ol>
                </div>

                <!-- What to Expect Card: Spatial UI Card -->
                <div class="spatial-card p-6 rounded-3xl relative">
                    <span class="style-tag spatial">Spatial UI</span>
                    <h4 class="text-xs font-black uppercase tracking-wider text-white mb-4 flex items-center gap-2">
                        <span>🎯 What We Cover In 30 Mins</span>
                    </h4>
                    
                    <ul class="space-y-3 text-xs text-[#8a9e8a] leading-relaxed">
                        <li class="neomorph-well p-3 rounded-xl flex items-start gap-2.5">
                            <span class="text-[#3fb950] font-bold text-sm">✓</span>
                            <span><strong class="text-white">ICP & Market Analysis:</strong> Drill down into your highest-LTV buyer personas and data filters.</span>
                        </li>
                        <li class="neomorph-well p-3 rounded-xl flex items-start gap-2.5">
                            <span class="text-[#3fb950] font-bold text-sm">✓</span>
                            <span><strong class="text-white">Deliverability Check:</strong> Quick audit of your DNS records (SPF, DKIM, DMARC) and inbox health.</span>
                        </li>
                        <li class="neomorph-well p-3 rounded-xl flex items-start gap-2.5">
                            <span class="text-[#3fb950] font-bold text-sm">✓</span>
                            <span><strong class="text-white">Custom Roadmap:</strong> Specific next steps to generate 15–30 qualified sales calls per month.</span>
                        </li>
                    </ul>
                </div>

                <!-- Guarantee / Trust Badge -->
                <div class="p-5 rounded-2xl bg-[#161b22]/50 border border-[#21262d] text-center">
                    <p class="text-xs text-[#8a9e8a]">
                        🔒 No pushy sales pitch. Real actionable advice tailored to your B2B go-to-market engine.
                    </p>
                </div>

            </div>

        </div>

    <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>