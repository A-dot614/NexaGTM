        
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
                A simple 3-step process: choose your meeting format, pick a convenient time slot matching your local timezone, and tell us about your sales goals.
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

        @php
            // Calculate initial step based on validation errors if any
            $initialStep = 1;
            if ($errors->has('name') || $errors->has('email') || $errors->has('phone') || $errors->has('company') || $errors->has('topic') || $errors->has('notes')) {
                $initialStep = 3;
            } elseif ($errors->has('date') || $errors->has('time_slot') || $errors->has('timezone')) {
                $initialStep = 2;
            } elseif ($errors->has('call_type')) {
                $initialStep = 1;
            }
        @endphp

        <!-- Main Booking Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
            
            <!-- Left 8 Columns: 3-Step Wizard Form -->
            <div class="lg:col-span-8">
                
                <!-- 3-STEP HORIZONTAL PROGRESS STEPPER (Neomorphic Well & Clay Nodes) -->
                <div class="mb-8 neomorph-card p-6 rounded-3xl relative">
                    <span class="style-tag neomorph">Neomorphism</span>
                    <nav aria-label="Progress">
                        <ol class="relative flex items-center justify-between">
                            
                            <!-- Progression Track Line -->
                            <div class="absolute top-5 left-8 right-8 -translate-y-1/2 h-1 bg-[#0d1117] rounded-full shadow-inner z-0 pointer-events-none" aria-hidden="true">
                                <!-- Active Emerald Progress Fill Line -->
                                <div id="step-progress-bar" class="h-full bg-[#3fb950] rounded-full shadow-[0_0_12px_rgba(63,185,80,0.6)] transition-all duration-500 pointer-events-none" style="width: 0%;"></div>
                            </div>

                            <!-- Step 1 Node -->
                            <li class="relative z-10 flex flex-col items-center pointer-events-none select-none">
                                <div id="step-nav-1" class="flex flex-col items-center cursor-default">
                                    <span id="step-badge-1" class="clay-step-bubble active text-sm font-black">
                                        1
                                    </span>
                                    <span class="mt-3 text-center">
                                        <span id="step-sub-1" class="text-[10px] font-semibold uppercase tracking-wider text-[#3fb950] block font-mono">STEP 1</span>
                                        <span id="step-lbl-1" class="text-xs sm:text-sm font-semibold text-white block mt-0.5">Meeting Format</span>
                                    </span>
                                </div>
                            </li>

                            <!-- Step 2 Node -->
                            <li class="relative z-10 flex flex-col items-center pointer-events-none select-none">
                                <div id="step-nav-2" class="flex flex-col items-center cursor-default">
                                    <span id="step-badge-2" class="clay-step-bubble text-sm font-medium">
                                        2
                                    </span>
                                    <span class="mt-3 text-center">
                                        <span id="step-sub-2" class="text-[10px] font-semibold uppercase tracking-wider text-slate-500 block font-mono">STEP 2</span>
                                        <span id="step-lbl-2" class="text-xs sm:text-sm font-medium text-slate-400 block mt-0.5">Date & Time</span>
                                    </span>
                                </div>
                            </li>

                            <!-- Step 3 Node -->
                            <li class="relative z-10 flex flex-col items-center pointer-events-none select-none">
                                <div id="step-nav-3" class="flex flex-col items-center cursor-default">
                                    <span id="step-badge-3" class="clay-step-bubble text-sm font-medium">
                                        3
                                    </span>
                                    <span class="mt-3 text-center">
                                        <span id="step-sub-3" class="text-[10px] font-semibold uppercase tracking-wider text-slate-500 block font-mono">STEP 3</span>
                                        <span id="step-lbl-3" class="text-xs sm:text-sm font-medium text-slate-400 block mt-0.5">Your Details</span>
                                    </span>
                                </div>
                            </li>

                        </ol>
                    </nav>
                </div>

                <!-- Form Container Card: Spatial UI Card -->
                <div id="booking-wizard-card" class="spatial-card p-6 sm:p-10 rounded-3xl relative">
                    <span class="style-tag spatial">Spatial UI</span>
                    
                    <form id="callBookingForm" method="POST" action="{{ route('nexagtm.book-call.send') }}">


                        @csrf

                        <!-- ============================================== -->
                        <!-- STEP 1: CALL TYPE SELECTION                    -->
                        <!-- ============================================== -->
                        <div id="step-pane-1" class="step-pane space-y-6">
                            
                            <div class="flex items-center justify-between pb-4 border-b border-[#21262d]">
                                <div>
                                    <span class="text-xs font-bold uppercase tracking-widest text-[#3fb950] block mb-1">Step 1 of 3</span>
                                    <h2 class="text-xl sm:text-2xl font-bold text-white tracking-wide">Select Your Meeting Format</h2>
                                </div>
                                <span class="hidden sm:inline-block px-3 py-1 rounded-full bg-[#0d1117] border border-[#30363d] text-xs text-[#8a9e8a] font-mono">
                                    30 Mins Duration
                                </span>
                            </div>

                            <p class="text-sm text-[#8a9e8a] leading-relaxed">
                                How would you prefer to connect? Choose between a full screen-share video session or a direct voice consultation.
                            </p>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 pt-2">
                                
                                <!-- Option 1: Video Call -->
                                <label class="call-type-card relative flex flex-col p-6 rounded-2xl border-2 cursor-pointer transition-all duration-300 {{ old('call_type', 'video') === 'video' ? 'border-[#3fb950] bg-[#0d1117] shadow-[0_0_25px_rgba(63,185,80,0.18)] scale-[1.01]' : 'border-[#30363d] bg-[#0d1117]/60 hover:border-[#3fb950]/50' }}">
                                    <input type="radio" name="call_type" value="video" class="sr-only" {{ old('call_type', 'video') === 'video' ? 'checked' : '' }}>
                                    
                                    <div class="flex items-start justify-between mb-4">
                                        <div class="w-12 h-12 rounded-xl bg-[#3fb950]/10 border border-[#3fb950]/30 flex items-center justify-center text-[#3fb950]">
                                            <!-- Video SVG -->
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <span class="text-[10px] uppercase font-bold tracking-widest px-2.5 py-1 rounded-full bg-[#3fb950]/20 text-[#3fb950] border border-[#3fb950]/30">
                                            Most Popular
                                        </span>
                                    </div>

                                    <div class="font-bold text-white text-base mb-1.5 flex items-center justify-between">
                                        <span>Video Call</span>
                                        <span class="call-check text-[#3fb950] text-sm {{ old('call_type', 'video') === 'video' ? '' : 'hidden' }}">✓ Selected</span>
                                    </div>

                                    <p class="text-xs text-[#8a9e8a] leading-relaxed mb-4">
                                        Google Meet session with live screen sharing. Ideal for reviewing outbound email copy, ICP data filters, and deliverability infrastructure.
                                    </p>

                                    <div class="mt-auto pt-3 border-t border-[#21262d] text-[11px] font-semibold text-[#c9d1d9] flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-[#3fb950]"></span> Google Meet link sent via calendar invite
                                    </div>
                                </label>

                                <!-- Option 2: Voice Call -->
                                <label class="call-type-card relative flex flex-col p-6 rounded-2xl border-2 cursor-pointer transition-all duration-300 {{ old('call_type') === 'voice' ? 'border-[#3fb950] bg-[#0d1117] shadow-[0_0_25px_rgba(63,185,80,0.18)] scale-[1.01]' : 'border-[#30363d] bg-[#0d1117]/60 hover:border-[#3fb950]/50' }}">
                                    <input type="radio" name="call_type" value="voice" class="sr-only" {{ old('call_type') === 'voice' ? 'checked' : '' }}>
                                    
                                    <div class="flex items-start justify-between mb-4">
                                        <div class="w-12 h-12 rounded-xl bg-[#58a6ff]/10 border border-[#388bfd]/30 flex items-center justify-center text-[#58a6ff]">
                                            <!-- Phone SVG -->
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                            </svg>
                                        </div>
                                        <span class="text-[10px] uppercase font-bold tracking-widest px-2.5 py-1 rounded-full bg-[#388bfd]/20 text-[#58a6ff] border border-[#388bfd]/30">
                                            Quick Sync
                                        </span>
                                    </div>

                                    <div class="font-bold text-white text-base mb-1.5 flex items-center justify-between">
                                        <span>Voice Call</span>
                                        <span class="call-check text-[#3fb950] text-sm {{ old('call_type') === 'voice' ? '' : 'hidden' }}">✓ Selected</span>
                                    </div>

                                    <p class="text-xs text-[#8a9e8a] leading-relaxed mb-4">
                                        Direct audio call via Phone or WhatsApp. Ideal for fast strategic alignment, qualification, and urgent outbound questions.
                                    </p>

                                    <div class="mt-auto pt-3 border-t border-[#21262d] text-[11px] font-semibold text-[#c9d1d9] flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-[#58a6ff]"></span> Direct mobile phone or WhatsApp audio
                                    </div>
                                </label>

                            </div>

                            @error('call_type')<p class="text-xs text-red-400 mt-2">{{ $message }}</p>@enderror

                            <!-- Step 1 Actions -->
                            <div class="pt-6 border-t border-[#21262d] flex justify-end">
                                <button type="button" onclick="goToStep(2)" class="skeuo-button w-full sm:w-auto px-8 py-4 text-[#0d1117] font-black text-xs uppercase tracking-widest rounded-xl flex items-center justify-center gap-2">
                                    <span>Next: Pick Date & Time</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </button>
                            </div>

                        </div>

                        <!-- ============================================== -->
                        <!-- STEP 2: DATE & LOCAL TIMEZONE SELECTION        -->
                        <!-- ============================================== -->
                        <div id="step-pane-2" class="step-pane space-y-6 hidden">
                            
                            <div class="flex items-center justify-between pb-4 border-b border-[#21262d]">
                                <div>
                                    <span class="text-xs font-bold uppercase tracking-widest text-[#3fb950] block mb-1">Step 2 of 3</span>
                                    <h2 class="text-xl sm:text-2xl font-bold text-white tracking-wide">Pick Date & Your Local Time</h2>
                                </div>
                                <span class="hidden sm:inline-block px-3 py-1 rounded-full bg-[#0d1117] border border-[#30363d] text-xs text-[#8a9e8a] font-mono">
                                    Local Time Coordination
                                </span>
                            </div>

                            <!-- Timezone Selector (with Auto-detection) -->
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <label for="timezone-select" class="text-[11px] font-bold uppercase tracking-wider text-[#8a9e8a] flex items-center gap-1.5">
                                        <span>🌍 Your Local Area Timezone</span>
                                    </label>
                                    <span id="tz-badge" class="text-[10px] text-[#3fb950] bg-[#004b23]/30 border border-[#3fb950]/30 px-2 py-0.5 rounded-full font-mono">
                                        Auto-detecting...
                                    </span>
                                </div>
                                <div class="relative">
                                    <select name="timezone" id="timezone-select" class="neomorph-input w-full p-3.5 text-sm appearance-none cursor-pointer">
                                        <optgroup label="Common Worldwide Timezones">
                                            <option value="Asia/Karachi" {{ old('timezone') === 'Asia/Karachi' ? 'selected' : '' }}>Asia/Karachi (PKT - Pakistan Time GMT+5)</option>
                                            <option value="Asia/Dubai" {{ old('timezone') === 'Asia/Dubai' ? 'selected' : '' }}>Asia/Dubai (GST - Gulf Standard Time GMT+4)</option>
                                            <option value="Asia/Kolkata" {{ old('timezone') === 'Asia/Kolkata' ? 'selected' : '' }}>Asia/Kolkata (IST - India Standard Time GMT+5:30)</option>
                                            <option value="Europe/London" {{ old('timezone') === 'Europe/London' ? 'selected' : '' }}>Europe/London (GMT/BST - UK Time)</option>
                                            <option value="Europe/Berlin" {{ old('timezone') === 'Europe/Berlin' ? 'selected' : '' }}>Europe/Berlin / Paris (CET GMT+1)</option>
                                            <option value="America/New_York" {{ old('timezone') === 'America/New_York' ? 'selected' : '' }}>America/New_York (EST/EDT - US Eastern)</option>
                                            <option value="America/Chicago" {{ old('timezone') === 'America/Chicago' ? 'selected' : '' }}>America/Chicago (CST/CDT - US Central)</option>
                                            <option value="America/Denver" {{ old('timezone') === 'America/Denver' ? 'selected' : '' }}>America/Denver (MST/MDT - US Mountain)</option>
                                            <option value="America/Los_Angeles" {{ old('timezone') === 'America/Los_Angeles' ? 'selected' : '' }}>America/Los_Angeles (PST/PDT - US Pacific)</option>
                                            <option value="Asia/Singapore" {{ old('timezone') === 'Asia/Singapore' ? 'selected' : '' }}>Asia/Singapore / Hong Kong (SGT GMT+8)</option>
                                            <option value="Australia/Sydney" {{ old('timezone') === 'Australia/Sydney' ? 'selected' : '' }}>Australia/Sydney (AEST GMT+10)</option>
                                            <option value="UTC" {{ old('timezone') === 'UTC' ? 'selected' : '' }}>UTC / Coordinated Universal Time</option>
                                        </optgroup>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-[#8a9e8a]">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                                <p class="text-[11px] text-[#778da9] mt-1.5">
                                    We automatically detect your timezone so the meeting time aligns with your schedule.
                                </p>
                                @error('timezone')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                            </div>

                            <!-- Date Picker -->
                            <div>
                                <label for="booking-date" class="block text-[11px] font-bold uppercase tracking-wider text-[#8a9e8a] mb-2">
                                    📅 Select Date <span class="text-[#3fb950]">*</span>
                                </label>
                                <input type="date" name="date" id="booking-date" 
                                       min="{{ date('Y-m-d') }}" 
                                       value="{{ old('date', date('Y-m-d', strtotime('+1 day'))) }}" 
                                       class="neomorph-input w-full p-3.5 text-sm cursor-pointer">
                                @error('date')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                            </div>

                            <!-- Available Time Slots -->
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <label class="text-[11px] font-bold uppercase tracking-wider text-[#8a9e8a]">
                                        ⏰ Select Available Time Slot <span class="text-[#3fb950]">*</span>
                                    </label>
                                    <span class="text-[10px] text-[#8a9e8a]">All slots are 30 mins</span>
                                </div>

                                <!-- Hidden field storing the active slot -->
                                <input type="hidden" name="time_slot" id="selected-time-slot" value="{{ old('time_slot', '10:00 AM - 10:30 AM') }}">

                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5" id="slot-grid">
                                    @php
                                        $slots = [
                                            '09:00 AM - 09:30 AM',
                                            '10:00 AM - 10:30 AM',
                                            '11:30 AM - 12:00 PM',
                                            '02:00 PM - 02:30 PM',
                                            '03:30 PM - 04:00 PM',
                                            '05:00 PM - 05:30 PM',
                                            '07:00 PM - 07:30 PM',
                                            '08:30 PM - 09:00 PM'
                                        ];
                                        $currentSlot = old('time_slot', '10:00 AM - 10:30 AM');
                                    @endphp

                                    @foreach($slots as $slot)
                                        <button type="button" 
                                                data-slot="{{ $slot }}"
                                                class="slot-btn text-xs font-semibold py-3 px-2 rounded-xl border transition-all text-center {{ $currentSlot === $slot ? 'bg-[#3fb950] text-[#0d1117] font-bold border-[#3fb950] shadow-[0_0_15px_rgba(63,185,80,0.3)] scale-[1.02]' : 'neomorph-well text-[#c9d1d9] hover:border-[#3fb950]/50 hover:text-white' }}">
                                            {{ $slot }}
                                        </button>
                                    @endforeach
                                </div>
                                @error('time_slot')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                            </div>

                            <!-- Step 2 Actions (Back & Next) -->
                            <div class="pt-6 border-t border-[#21262d] flex items-center justify-between gap-4">
                                <button type="button" onclick="goToStep(1)" class="px-6 py-3.5 bg-[#0d1117] hover:bg-[#21262d] text-[#c9d1d9] hover:text-white font-bold text-xs uppercase tracking-wider rounded-xl border border-[#30363d] transition-all flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                                    <span>Back</span>
                                </button>

                                <button type="button" onclick="validateStep2AndProceed()" class="skeuo-button w-full sm:w-auto px-8 py-4 text-[#0d1117] font-black text-xs uppercase tracking-widest rounded-xl flex items-center justify-center gap-2">
                                    <span>Next: Your Details</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </button>
                            </div>

                        </div>

                        <!-- ============================================== -->
                        <!-- STEP 3: ATTENDEE & PROJECT DETAILS             -->
                        <!-- ============================================== -->
                        <div id="step-pane-3" class="step-pane space-y-6 hidden">
                            
                            <div class="flex items-center justify-between pb-4 border-b border-[#21262d]">
                                <div>
                                    <span class="text-xs font-bold uppercase tracking-widest text-[#3fb950] block mb-1">Step 3 of 3</span>
                                    <h2 class="text-xl sm:text-2xl font-bold text-white tracking-wide">Tell Us About Your Project</h2>
                                </div>
                                <span class="hidden sm:inline-block px-3 py-1 rounded-full bg-[#0d1117] border border-[#30363d] text-xs text-[#8a9e8a] font-mono">
                                    Final Step
                                </span>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <!-- Full Name -->
                                <div class="space-y-1.5">
                                    <label for="input-name" class="text-[11px] font-bold uppercase tracking-wider text-[#8a9e8a]">
                                        Full Name <span class="text-[#3fb950]">*</span>
                                    </label>
                                    <input id="input-name" name="name" type="text" value="{{ old('name') }}" placeholder="Alex Smith" required
                                           class="neomorph-input w-full p-3.5 text-sm placeholder-[#484f58]">
                                    @error('name')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                                </div>

                                <!-- Email -->
                                <div class="space-y-1.5">
                                    <label for="input-email" class="text-[11px] font-bold uppercase tracking-wider text-[#8a9e8a]">
                                        Work Email <span class="text-[#3fb950]">*</span>
                                    </label>
                                    <input id="input-email" name="email" type="email" value="{{ old('email') }}" placeholder="alex@company.com" required
                                           class="neomorph-input w-full p-3.5 text-sm placeholder-[#484f58]">
                                    @error('email')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                                </div>

                                <!-- Phone / WhatsApp -->
                                <div class="space-y-1.5">
                                    <label for="input-phone" class="text-[11px] font-bold uppercase tracking-wider text-[#8a9e8a]">
                                        Phone / WhatsApp Number <span id="phone-req-badge" class="text-xs text-[#8a9e8a]">(Optional)</span>
                                    </label>
                                    <input id="input-phone" name="phone" type="tel" value="{{ old('phone') }}" placeholder="+1 (555) 019-2834 or +92 300..."
                                           class="neomorph-input w-full p-3.5 text-sm placeholder-[#484f58]">
                                    <p class="text-[11px] text-[#778da9]">Required for Voice Call so we can reach you directly.</p>
                                    @error('phone')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                                </div>

                                <!-- Company Name / Domain -->
                                <div class="space-y-1.5">
                                    <label for="input-company" class="text-[11px] font-bold uppercase tracking-wider text-[#8a9e8a]">
                                        Company or Website
                                    </label>
                                    <input id="input-company" name="company" type="text" value="{{ old('company') }}" placeholder="Acme Inc / acme.com"
                                           class="neomorph-input w-full p-3.5 text-sm placeholder-[#484f58]">
                                    @error('company')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <!-- Primary Topic of Interest -->
                            <div class="space-y-1.5">
                                <label for="select-topic" class="text-[11px] font-bold uppercase tracking-wider text-[#8a9e8a]">
                                    Primary Focus / Discussion Topic
                                </label>
                                <select id="select-topic" name="topic" class="neomorph-input w-full p-3.5 text-sm cursor-pointer">
                                    <option value="Outbound Sales Pipeline & Cold Email" {{ old('topic') === 'Outbound Sales Pipeline & Cold Email' ? 'selected' : '' }}>Outbound Sales Pipeline & Cold Email Infrastructure</option>
                                    <option value="B2B Lead Sourcing & ICP Definition" {{ old('topic') === 'B2B Lead Sourcing & ICP Definition' ? 'selected' : '' }}>B2B Lead Sourcing & ICP Definition</option>
                                    <option value="Deliverability & Domain Health Audit" {{ old('topic') === 'Deliverability & Domain Health Audit' ? 'selected' : '' }}>Deliverability & Domain Health Audit (Spam Avoidance)</option>
                                    <option value="Custom CRM & RevOps Automation" {{ old('topic') === 'Custom CRM & RevOps Automation' ? 'selected' : '' }}>Custom CRM & RevOps Automation</option>
                                    <option value="Enterprise Full-Funnel GTM Strategy" {{ old('topic') === 'Enterprise Full-Funnel GTM Strategy' ? 'selected' : '' }}>Enterprise Full-Funnel GTM Strategy</option>
                                    <option value="Other / General Consultation" {{ old('topic') === 'Other / General Consultation' ? 'selected' : '' }}>Other / General Consultation</option>
                                </select>
                                @error('topic')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                            </div>

                            <!-- Notes / Specific Goals -->
                            <div class="space-y-1.5">
                                <label for="textarea-notes" class="text-[11px] font-bold uppercase tracking-wider text-[#8a9e8a]">
                                    Additional Notes or Specific Goals (Optional)
                                </label>
                                <textarea id="textarea-notes" name="notes" rows="3" placeholder="Tell us about your current monthly booking numbers, target ICP, or specific bottlenecks you want to tackle..."
                                          class="neomorph-input w-full p-3.5 text-sm placeholder-[#484f58]">{{ old('notes') }}</textarea>
                                @error('notes')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                            </div>

                            <!-- Step 3 Actions (Back & Submit) -->
                            <div class="pt-6 border-t border-[#21262d] flex items-center justify-between gap-4">
                                <button type="button" onclick="goToStep(2)" class="px-6 py-3.5 bg-[#0d1117] hover:bg-[#21262d] text-[#c9d1d9] hover:text-white font-bold text-xs uppercase tracking-wider rounded-xl border border-[#30363d] transition-all flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                                    <span>Back</span>
                                </button>

                                <button type="submit" id="submitBtn" class="skeuo-button w-full sm:w-auto px-10 py-4 text-[#0d1117] font-black text-xs uppercase tracking-widest rounded-xl flex items-center justify-center gap-3">
                                    <span class="skeuo-led inline-block"></span>
                                    <span>Confirm & Schedule Call</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </button>
                            </div>

                        </div>

                    </form>

                </div>
            </div>

            <!-- Right 4 Columns: Sticky Live Booking Summary & Value Props -->
            <div class="lg:col-span-4 space-y-6 lg:sticky lg:top-28">
                
                <!-- Live Summary Card: Liquid Glass Card -->
                <div class="liquid-glass-card p-6 rounded-3xl relative overflow-hidden">
                    <span class="style-tag liquid">Liquid Glass</span>
                    <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-[#3fb950]/10 rounded-full blur-2xl pointer-events-none"></div>

                    <div class="flex items-center justify-between mb-5 pb-3 border-b border-[#21262d]">
                        <h3 class="text-xs font-black uppercase tracking-widest text-[#3fb950]">Booking Summary</h3>
                        <span id="current-step-badge" class="text-[10px] text-[#3fb950] clay-badge px-2.5 py-0.5 rounded-full font-mono">
                            STEP 1 OF 3
                        </span>
                    </div>

                    <div class="space-y-4 text-sm">
                        <!-- Format -->
                        <div>
                            <span class="text-[10px] uppercase font-bold tracking-wider text-[#8a9e8a] block">Format</span>
                            <div id="summary-format" class="font-bold text-white flex items-center gap-2 mt-0.5">
                                <span class="skeuo-led inline-block"></span>
                                <span>Video Call (Google Meet)</span>
                            </div>
                        </div>

                        <!-- Date -->
                        <div>
                            <span class="text-[10px] uppercase font-bold tracking-wider text-[#8a9e8a] block">Date</span>
                            <div id="summary-date" class="font-bold text-white mt-0.5">
                                Tomorrow
                            </div>
                        </div>

                        <!-- Time Slot -->
                        <div>
                            <span class="text-[10px] uppercase font-bold tracking-wider text-[#8a9e8a] block">Time Slot</span>
                            <div id="summary-slot" class="font-bold text-[#3fb950] mt-0.5">
                                10:00 AM - 10:30 AM
                            </div>
                        </div>

                        <!-- Timezone -->
                        <div>
                            <span class="text-[10px] uppercase font-bold tracking-wider text-[#8a9e8a] block">Area Timezone</span>
                            <div id="summary-tz" class="text-xs font-semibold text-[#c9d1d9] mt-0.5 font-mono truncate">
                                Local Area
                            </div>
                        </div>

                        <!-- Duration -->
                        <div class="pt-3 border-t border-[#21262d] flex items-center justify-between text-xs">
                            <span class="text-[#8a9e8a]">Duration:</span>
                            <span class="font-bold text-white">30 Minutes</span>
                        </div>

                        <div class="flex items-center justify-between text-xs">
                            <span class="text-[#8a9e8a]">Investment:</span>
                            <span class="font-bold text-[#3fb950]">100% Free Strategy Session</span>
                        </div>
                    </div>
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

