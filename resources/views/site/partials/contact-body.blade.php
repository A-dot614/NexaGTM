        <!-- Ambient decorative glows -->
        <div class="absolute top-10 left-1/4 -translate-x-1/2 w-96 h-96 bg-[#3fb950]/10 rounded-full blur-[140px] pointer-events-none -z-10"></div>
        <div class="absolute top-1/2 right-5 w-80 h-80 bg-[#3fb950]/5 rounded-full blur-[120px] pointer-events-none -z-10"></div>

        <!-- Hero Section -->
        <div class="relative mb-12 sm:mb-16 text-left max-w-3xl animate-fade-in-up">
            <!-- Status Badge (Claymorphic Pill + Skeuomorphic Diode) -->
            <div class="clay-badge clay-pill inline-flex items-center gap-2.5 px-5 py-2 mb-6 text-xs font-bold tracking-wide relative cursor-pointer">
                <span class="style-tag style-tag-clay">Claymorphism</span>
                <span class="skeuo-led"></span>
                <span>Active Availability · Accepting New Outbound Sprints</span>
            </div>

            <h1 class="text-4xl sm:text-6xl lg:text-7xl font-black tracking-tight text-white mb-6 leading-[1.1]">
                Let's Build Your<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#3fb950] via-[#56d364] to-[#2ea043]">GTM Engine.</span>
            </h1>
            
            <p class="text-base sm:text-xl text-[#8b949e] leading-relaxed max-w-2xl">
                Stop guessing with your outbound. We build the ICP frameworks, automated infrastructure, and verified lead pipelines that reliably book qualified meetings.
            </p>

            <!-- Quick Trust Badges (Neo-Brutalism) -->
            <div class="flex flex-wrap items-center gap-3 sm:gap-4 mt-8 pt-6 border-t border-[#30363d]/60 text-xs text-[#8b949e] relative">
                <span class="style-tag style-tag-brutal">Neo-Brutalism</span>
                <div class="brutal-badge flex items-center gap-2">
                    <i class="fa-solid fa-clock text-[#3fb950]"></i>
                    <span>&lt; 2-Hour Response Time</span>
                </div>
                <div class="brutal-badge flex items-center gap-2">
                    <i class="fa-solid fa-user-shield text-[#3fb950]"></i>
                    <span>Founder-Led Architecture</span>
                </div>
                <div class="brutal-badge flex items-center gap-2">
                    <i class="fa-solid fa-file-contract text-[#3fb950]"></i>
                    <span>100% Confidential · NDA Ready</span>
                </div>
            </div>
        </div>

        <!-- Main 2-Column Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start mb-16">
            
            <!-- Left Column: Form Card (Glassmorphism + Neomorphic Inputs) -->
            <div class="lg:col-span-7 glass-card rounded-3xl p-6 sm:p-10 shadow-2xl relative">
                <span class="style-tag style-tag-glass">Glassmorphism</span>
                <div class="flex items-center justify-between pb-6 mb-8 border-b border-white/10">
                    <div>
                        <h2 class="text-2xl sm:text-3xl font-bold text-white tracking-tight">Send a Message</h2>
                        <p class="text-xs sm:text-sm text-[#8b949e] mt-1">Fill out the details below and we will get back to you with custom insights.</p>
                    </div>
                    <div class="hidden sm:flex w-12 h-12 rounded-2xl clay-badge items-center justify-center text-[#3fb950] text-xl">
                        <i class="fa-solid fa-paper-plane"></i>
                    </div>
                </div>

                {{-- Status Alerts --}}
                @if (session('status'))
                    <div class="mb-8 rounded-2xl bg-[#3fb950]/15 border border-[#3fb950]/40 p-5 text-sm text-white flex items-start gap-3 shadow-[0_0_20px_rgba(63,185,80,0.2)]">
                        <div class="w-6 h-6 rounded-full bg-[#3fb950] text-[#0d1117] flex items-center justify-center font-bold text-xs flex-shrink-0 mt-0.5">
                            ✓
                        </div>
                        <div>
                            <p class="font-bold text-[#3fb950]">Message Sent Successfully!</p>
                            <p class="text-slate-300 text-xs mt-0.5">{{ session('status') }}</p>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('nexagtm.contact.send') }}" class="space-y-6">

                    @csrf
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Full Name -->
                        <div class="space-y-2">
                            <label class="block text-xs font-semibold uppercase tracking-wider text-[#8b949e]">
                                Full Name <span class="text-[#3fb950]">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-500 pointer-events-none">
                                    <i class="fa-regular fa-user text-sm"></i>
                                </span>
                                <input name="name" value="{{ old('name') }}" type="text" required placeholder="John Doe" 
                                    class="neomorph-input w-full pl-11 pr-4 py-3.5 text-sm placeholder-slate-500">
                            </div>
                            @error('name')<p class="text-xs text-rose-400 mt-1 flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</p>@enderror
                        </div>

                        <!-- Email Address -->
                        <div class="space-y-2">
                            <label class="block text-xs font-semibold uppercase tracking-wider text-[#8b949e]">
                                Work Email <span class="text-[#3fb950]">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-500 pointer-events-none">
                                    <i class="fa-regular fa-envelope text-sm"></i>
                                </span>
                                <input name="email" value="{{ old('email') }}" type="email" required placeholder="john@company.com" 
                                    class="neomorph-input w-full pl-11 pr-4 py-3.5 text-sm placeholder-slate-500">
                            </div>
                            @error('email')<p class="text-xs text-rose-400 mt-1 flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</p>@enderror
                        </div>

                        <!-- Phone / WhatsApp -->
                        <div class="space-y-2">
                            <label class="block text-xs font-semibold uppercase tracking-wider text-[#8b949e]">
                                Phone / WhatsApp <span class="text-slate-500 text-[10px] lowercase">(optional)</span>
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-500 pointer-events-none">
                                    <i class="fa-solid fa-phone text-sm"></i>
                                </span>
                                <input name="phone" value="{{ old('phone') }}" type="tel" placeholder="+1 (555) 123-4567" 
                                    class="neomorph-input w-full pl-11 pr-4 py-3.5 text-sm placeholder-slate-500">
                            </div>
                        </div>

                        <!-- Company Name -->
                        <div class="space-y-2">
                            <label class="block text-xs font-semibold uppercase tracking-wider text-[#8b949e]">
                                Company / Domain <span class="text-slate-500 text-[10px] lowercase">(optional)</span>
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-500 pointer-events-none">
                                    <i class="fa-regular fa-building text-sm"></i>
                                </span>
                                <input name="company" value="{{ old('company') }}" type="text" placeholder="Acme SaaS, Inc." 
                                    class="neomorph-input w-full pl-11 pr-4 py-3.5 text-sm placeholder-slate-500">
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Subject -->
                        <div class="space-y-2">
                            <label class="block text-xs font-semibold uppercase tracking-wider text-[#8b949e]">
                                Project Subject <span class="text-[#3fb950]">*</span>
                            </label>
                            <div class="relative">
                                <select name="subject" required 
                                    class="neomorph-input w-full px-4 py-3.5 text-sm cursor-pointer appearance-none">
                                    <option value="" disabled {{ old('subject') ? '' : 'selected' }}>Select your primary objective</option>
                                    <option value="Outbound Lead Generation" {{ old('subject') === 'Outbound Lead Generation' ? 'selected' : '' }}>Outbound Lead Generation & Appointments</option>
                                    <option value="Custom Clay Workflows" {{ old('subject') === 'Custom Clay Workflows' ? 'selected' : '' }}>Custom Clay Workflows & Scraping</option>
                                    <option value="TAM & ICP Mapping" {{ old('subject') === 'TAM & ICP Mapping' ? 'selected' : '' }}>TAM & ICP Mapping / Data Sourcing</option>
                                    <option value="GTM Strategy Consultation" {{ old('subject') === 'GTM Strategy Consultation' ? 'selected' : '' }}>GTM Strategy & 1-on-1 Consultation</option>
                                    <option value="General Inquiry" {{ old('subject') === 'General Inquiry' ? 'selected' : '' }}>General Question / Partnership</option>
                                </select>
                                <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-slate-500 pointer-events-none">
                                    <i class="fa-solid fa-chevron-down text-xs"></i>
                                </span>
                            </div>
                            @error('subject')<p class="text-xs text-rose-400 mt-1 flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</p>@enderror
                        </div>

                        <!-- Budget Range -->
                        <div class="space-y-2">
                            <label class="block text-xs font-semibold uppercase tracking-wider text-[#8b949e]">
                                Monthly Budget <span class="text-slate-500 text-[10px] lowercase">(optional)</span>
                            </label>
                            <div class="relative">
                                <select name="budget" 
                                    class="neomorph-input w-full px-4 py-3.5 text-sm cursor-pointer appearance-none">
                                    <option value="" {{ old('budget') ? '' : 'selected' }}>Select estimated budget</option>
                                    <option value="<$1k" {{ old('budget') === '<$1k' ? 'selected' : '' }}>Less than $1,000 / mo</option>
                                    <option value="$1k-$3k" {{ old('budget') === '$1k-$3k' ? 'selected' : '' }}>$1,000 – $3,000 / mo</option>
                                    <option value="$3k-$5k" {{ old('budget') === '$3k-$5k' ? 'selected' : '' }}>$3,000 – $5,000 / mo</option>
                                    <option value=">$5k" {{ old('budget') === '>$5k' ? 'selected' : '' }}>$5,000+ / mo</option>
                                    <option value="Hourly / Scoped Build" {{ old('budget') === 'Hourly / Scoped Build' ? 'selected' : '' }}>Hourly / Scoped Build ($30/hr)</option>
                                </select>
                                <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-slate-500 pointer-events-none">
                                    <i class="fa-solid fa-chevron-down text-xs"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Message -->
                    <div class="space-y-2">
                        <label class="block text-xs font-semibold uppercase tracking-wider text-[#8b949e]">
                            Your Project or Question <span class="text-[#3fb950]">*</span>
                        </label>
                        <textarea name="message" rows="5" required 
                            placeholder="Tell us about your target market, current outbound bottlenecks, tools in your stack (e.g. Clay, Smartlead), or what specific results you need..." 
                            class="neomorph-input w-full p-4 placeholder-slate-600 text-sm leading-relaxed">{{ old('message') }}</textarea>
                        @error('message')<p class="text-xs text-rose-400 mt-1 flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</p>@enderror
                    </div>

                    <!-- Source -->
                    <div class="space-y-2">
                        <label class="block text-xs font-semibold uppercase tracking-wider text-[#8b949e]">
                            How Did You Hear About NexaGTM?
                        </label>
                        <div class="relative">
                            <select name="source" 
                                class="neomorph-input w-full px-4 py-3.5 text-sm cursor-pointer appearance-none">
                                <option value="" {{ old('source') ? '' : 'selected' }}>Select an option</option>
                                <option value="LinkedIn" {{ old('source') === 'LinkedIn' ? 'selected' : '' }}>LinkedIn</option>
                                <option value="Upwork" {{ old('source') === 'Upwork' ? 'selected' : '' }}>Upwork</option>
                                <option value="Founder Referral" {{ old('source') === 'Founder Referral' ? 'selected' : '' }}>Founder Referral / Word of mouth</option>
                                <option value="WhatsApp" {{ old('source') === 'WhatsApp' ? 'selected' : '' }}>WhatsApp</option>
                                <option value="Twitter / X" {{ old('source') === 'Twitter / X' ? 'selected' : '' }}>Twitter / X</option>
                                <option value="Other" {{ old('source') === 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-slate-500 pointer-events-none">
                                <i class="fa-solid fa-chevron-down text-xs"></i>
                            </span>
                        </div>
                    </div>

                    <!-- Submit Button with Skeuomorphic Tactile Feel & Indicator LED -->
                    <div class="pt-2 flex flex-col sm:flex-row items-start sm:items-center gap-4">
                        <button type="submit" 
                            class="skeuo-button w-full sm:w-auto px-8 py-4 text-[#0d1117] font-bold text-sm tracking-wide rounded-xl flex items-center justify-center gap-3">
                            <span class="skeuo-led bg-[#0d1117] w-2 h-2 rounded-full inline-block animate-pulse"></span>
                            <span>Transmit Transmission</span>
                            <i class="fa-solid fa-paper-plane text-xs transition-transform duration-300 group-hover:translate-x-1"></i>
                        </button>
                        <span class="style-tag brutal">Skeuomorphic Switch</span>
                    </div>

                    <!-- Privacy Guarantee -->
                    <p class="text-[11px] text-slate-500 flex items-center gap-2 pt-2">
                        <i class="fa-solid fa-lock text-[#3fb950]/70"></i>
                        <span>We respect your privacy. Your information is 100% confidential and never shared.</span>
                    </p>
                </form>
            </div>

            <!-- Right Column: Sidebar Cards (5 cols) -->
            <div class="lg:col-span-5 space-y-6">
                
                <!-- Fast-Track Card: Liquid Glass Style -->
                <div class="liquid-glass-card rounded-3xl p-6 sm:p-8 relative overflow-hidden group">
                    <span class="style-tag liquid">Liquid Glass</span>
                    <div class="absolute -top-12 -right-12 w-40 h-40 bg-[#3fb950]/15 rounded-full blur-3xl pointer-events-none"></div>
                    
                    <div class="relative z-10">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full clay-badge text-[10px] font-bold uppercase tracking-widest mb-4">
                            <i class="fa-regular fa-calendar-check"></i> Fast Track
                        </div>

                        <h3 class="text-xl sm:text-2xl font-bold text-white mb-2 tracking-tight">Prefer a Direct Call?</h3>
                        <p class="text-xs sm:text-sm text-[#8b949e] mb-6 leading-relaxed">
                            Skip the back-and-forth email queue. Book a free 30-minute scoping & strategy consultation directly on our calendar.
                        </p>

                        <a href="{{ route('nexagtm.book-call') }}" 
                           class="skeuo-button inline-flex items-center justify-center w-full gap-2 px-6 py-3.5 text-[#0d1117] font-bold text-xs uppercase tracking-wider rounded-xl">
                            <i class="fa-solid fa-calendar-days"></i>
                            <span>Schedule Strategy Call</span>
                            <i class="fa-solid fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Direct Contact Details Card: Spatial UI Card -->
                <div class="spatial-card rounded-3xl p-6 sm:p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-sm font-bold uppercase tracking-widest text-[#8b949e] flex items-center gap-2">
                            <i class="fa-solid fa-headset text-[#3fb950]"></i> Direct Channels
                        </h3>
                        <span class="style-tag spatial">Spatial UI</span>
                    </div>

                    <div class="space-y-4 text-sm">
                        <!-- WhatsApp Direct with Neomorphic Well -->
                        <a href="https://wa.me/923444543772" target="_blank" rel="noopener noreferrer" 
                           class="neomorph-well flex items-center justify-between p-4 rounded-2xl group transition-all">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-[#25D366]/15 text-[#25D366] flex items-center justify-center text-lg shadow-inner">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </div>
                                <div>
                                    <div class="text-white font-semibold group-hover:text-[#25D366] transition-colors">WhatsApp Chat</div>
                                    <div class="text-xs text-[#8b949e]">+92 344 4543772</div>
                                </div>
                            </div>
                            <span class="text-xs text-[#25D366] font-medium flex items-center gap-1.5">
                                Live <span class="skeuo-led inline-block"></span>
                            </span>
                        </a>

                        <!-- Email Direct with Neomorphic Well -->
                        <a href="mailto:gtmautomationexpert@gmail.com" 
                           class="neomorph-well flex items-center justify-between p-4 rounded-2xl group transition-all">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-[#3fb950]/15 text-[#3fb950] flex items-center justify-center text-lg shadow-inner">
                                    <i class="fa-regular fa-envelope"></i>
                                </div>
                                <div>
                                    <div class="text-white font-semibold group-hover:text-[#3fb950] transition-colors">Direct Email</div>
                                    <div class="text-xs text-[#8b949e]">gtmautomationexpert@gmail.com</div>
                                </div>
                            </div>
                            <i class="fa-solid fa-arrow-up-right-from-square text-xs text-slate-500 group-hover:text-white transition-colors"></i>
                        </a>

                        <!-- Founder Profiles -->
                        <div class="pt-4 border-t border-[#30363d]/80">
                            <div class="text-xs font-semibold text-[#8b949e] uppercase tracking-wider mb-3">Founders on LinkedIn</div>
                            <div class="grid grid-cols-2 gap-3">
                                <a href="https://www.linkedin.com/in/gtmautomationexpert/" target="_blank" 
                                   class="neomorph-well p-3 rounded-xl flex items-center gap-2 text-xs font-medium text-slate-300 hover:text-white transition-all">
                                    <i class="fa-brands fa-linkedin text-[#0077B5]"></i>
                                    <span>Hammad</span>
                                </a>
                                <a href="https://www.linkedin.com/in/abdulrehman-aman/" target="_blank" 
                                   class="neomorph-well p-3 rounded-xl flex items-center gap-2 text-xs font-medium text-slate-300 hover:text-white transition-all">
                                    <i class="fa-brands fa-linkedin text-[#0077B5]"></i>
                                    <span>Aman</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Response Timeline Card: Neomorphic Card with Claymorphic Step Bubbles -->
                <div class="neomorph-card rounded-3xl p-6 sm:p-8 relative">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-sm font-bold uppercase tracking-widest text-[#8b949e] flex items-center gap-2">
                            <i class="fa-solid fa-timeline text-[#3fb950]"></i> What Happens Next?
                        </h3>
                        <span class="style-tag clay">Clay Bubbles</span>
                    </div>

                    <ol class="space-y-4 text-xs text-[#8b949e]">
                        <li class="flex items-start gap-3">
                            <div class="clay-step-bubble flex-shrink-0 mt-0.5">
                                1
                            </div>
                            <div>
                                <strong class="text-white block">Rapid Discovery Review</strong>
                                We review your ideal customer profile, domain setup, and current outbound tools.
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="clay-step-bubble flex-shrink-0 mt-0.5">
                                2
                            </div>
                            <div>
                                <strong class="text-white block">Actionable Loom / Proposal</strong>
                                Within 24 hours, you receive a clear system blueprint, estimated timeline, and exact scope.
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="clay-step-bubble flex-shrink-0 mt-0.5">
                                3
                            </div>
                            <div>
                                <strong class="text-white block">Sprint Kickoff</strong>
                                We start building your waterfall data pipelines, copywriting, or cold outreach inboxes immediately.
                            </div>
                        </li>
                    </ol>
                </div>

                <!-- Testimonial Quote Pill: Glass Card with Minimal Typography -->
                <div class="glass-card p-5 rounded-2xl text-xs relative">
                    <span class="style-tag glass">Glass Quote</span>
                    <div class="flex items-center gap-1 text-[#3fb950] mb-2">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="text-slate-300 italic mb-3">
                        "These guys literally helped us book 30 sales meetings per month with their custom recruiting workflow and outbound engine."
                    </p>
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('pic/Jeff Brown.jpeg') }}" alt="Jeff Brown" class="w-7 h-7 rounded-full object-cover border border-[#3fb950]/40">
                        <div>
                            <span class="font-bold text-white block">Jeff Brown</span>
                            <span class="text-[10px] text-slate-500">Founder, PaveTalent</span>
                        </div>
                </div>

            </div>

        </div>
