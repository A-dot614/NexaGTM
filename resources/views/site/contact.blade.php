<x-layout.mainlayout>
    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-6 py-12 sm:py-20 text-[#e0e1dd]">
        
<!-- Hero Section -->
<div class="relative mb-16 sm:mb-24 mt-10" data-aos="fade-up">
    <!-- Decorative background glow -->
    <div class="absolute -top-20 -left-20 w-72 h-72 bg-[#3fb950]/10 rounded-full blur-[100px] pointer-events-none"></div>

    <!-- Status Badge -->
    <div class="inline-flex items-center gap-2 px-3 py-1 mb-6 rounded-full bg-[#004b23]/20 border border-[#004b23]/30 text-[#3fb950] text-xs font-semibold uppercase tracking-widest">
        <span class="relative flex h-2 w-2">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#3fb950] opacity-75"></span>
            <span class="relative inline-flex rounded-full h-2 w-2 bg-[#3fb950]"></span>
        </span>
        Accepting New Projects
    </div>

    <h1 class="text-4xl md:text-7xl lg:text-8xl font-extrabold tracking-tighter text-white mb-6 leading-[1.1]">
        Build Your<br>
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#3fb950] to-[#2d8a3a]">GTM Engine.</span>
    </h1>
    
    <p class="text-lg md:text-xl text-[#8a9e8a] max-w-xl leading-relaxed">
        Stop guessing with your outbound. I build the ICP frameworks, automated infrastructure, and lead pipelines that actually book qualified meetings.
    </p>


</div>

<!-- Main Grid -->
<div class="grid grid-cols-1 lg:grid-cols-[2fr_1fr] gap-8 lg:gap-12 mb-12 lg:mb-20" data-aos="fade-up" data-aos-delay="100">
    
    <!-- Form Card -->
    <div class="p-6 md:p-12 rounded-[2.5rem] bg-[#1b263b]/50 border border-[#415a77]">
        <h2 class="text-2xl font-bold mb-10">Send a Message</h2>
        @if (session('status'))
            <div class="mb-6 rounded-2xl bg-green-500/10 border border-green-500/20 p-4 text-sm text-green-200">
                {{ session('status') }}
            </div>
        @endif
<form method="POST" action="{{ route('nexagtm.contact.send') }}" class="space-y-6">
    @csrf
    <div class="grid md:grid-cols-2 gap-6">
        <!-- Name & Email -->
        <div class="space-y-2">
            <label class="text-[10px] font-bold uppercase tracking-widest text-[#778da9]">Full Name <span class="text-[#3fb950]">*</span></label>
            <input name="name" value="{{ old('name') }}" type="text" placeholder="John Doe" class="w-full p-4 bg-[#0d1117] rounded-2xl border border-[#3fb950]/30 focus:border-[#3fb950] outline-none transition-all text-white placeholder-[#778da9]">
            @error('name')<p class="text-sm text-[#3fb950] mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="space-y-2">
            <label class="text-[10px] font-bold uppercase tracking-widest text-[#778da9]">Email Address <span class="text-[#3fb950]">*</span></label>
            <input name="email" value="{{ old('email') }}" type="email" placeholder="john@example.com" class="w-full p-4 bg-[#0d1117] rounded-2xl border border-[#3fb950]/30 focus:border-[#3fb950] outline-none transition-all text-white placeholder-[#778da9]">
            @error('email')<p class="text-sm text-[#3fb950] mt-1">{{ $message }}</p>@enderror
        </div>
        <!-- Phone & Company -->
        <div class="space-y-2">
            <label class="text-[10px] font-bold uppercase tracking-widest text-[#778da9]">Phone (Optional)</label>
            <input name="phone" value="{{ old('phone') }}" type="tel" placeholder="+1 (555) 123-4567" class="w-full p-4 bg-[#0d1117] rounded-2xl border border-[#3fb950]/30 focus:border-[#3fb950] outline-none transition-all text-white placeholder-[#778da9]">
        </div>
        <div class="space-y-2">
            <label class="text-[10px] font-bold uppercase tracking-widest text-[#778da9]">Company (Optional)</label>
            <input name="company" value="{{ old('company') }}" type="text" placeholder="Your Company" class="w-full p-4 bg-[#0d1117] rounded-2xl border border-[#3fb950]/30 focus:border-[#3fb950] outline-none transition-all text-white placeholder-[#778da9]">
        </div>
    </div>

    <!-- Subject & Budget -->
    <div class="space-y-2">
        <label class="text-[10px] font-bold uppercase tracking-widest text-[#778da9]">Subject <span class="text-[#3fb950]">*</span></label>
        <select name="subject" class="w-full p-4 bg-[#0d1117] rounded-2xl border border-[#3fb950]/30 focus:border-[#3fb950] outline-none text-white">
            <option value="">Select a subject</option>
            <option value="Project inquiry" {{ old('subject') === 'Project inquiry' ? 'selected' : '' }}>Project inquiry</option>
            <option value="General question" {{ old('subject') === 'General question' ? 'selected' : '' }}>General question</option>
        </select>
        @error('subject')<p class="text-sm text-[#3fb950] mt-1">{{ $message }}</p>@enderror
    </div>
    
    <div class="space-y-2">
        <label class="text-[10px] font-bold uppercase tracking-widest text-[#778da9]">Budget Range (Optional)</label>
        <select name="budget" class="w-full p-4 bg-[#0d1117] rounded-2xl border border-[#3fb950]/30 focus:border-[#3fb950] outline-none text-white">
            <option value="">Select if applicable</option>
            <option value="<$1k" {{ old('budget') === '<$1k' ? 'selected' : '' }}>Less than $1k</option>
            <option value="$1k-$5k" {{ old('budget') === '$500' ? 'selected' : '' }}>$500</option>
            <option value=">$5k" {{ old('budget') === '>$300' ? 'selected' : '' }}>$300</option>
        </select>
    </div>

    <!-- Message & Source -->
    <div class="space-y-2">
        <label class="text-[10px] font-bold uppercase tracking-widest text-[#778da9]">Message <span class="text-[#3fb950]">*</span></label>
        <textarea name="message" rows="4" placeholder="Tell me about your project, question, or how I can help..." class="w-full p-4 bg-[#0d1117] rounded-2xl border border-[#3fb950]/30 focus:border-[#3fb950] outline-none transition-all text-white placeholder-[#778da9]">{{ old('message') }}</textarea>
        @error('message')<p class="text-sm text-[#3fb950] mt-1">{{ $message }}</p>@enderror
    </div>

    <div class="space-y-2">
        <label class="text-[10px] font-bold uppercase tracking-widest text-[#778da9]">How did you find me?</label>
        <select name="source" class="w-full p-4 bg-[#0d1117] rounded-2xl border border-[#3fb950]/30 focus:border-[#3fb950] outline-none text-white">
            <option value="">Select an option</option>
            <option value="LinkedIn" {{ old('source') === 'LinkedIn' ? 'selected' : '' }}>LinkedIn</option>
            <option value="Instagram" {{ old('source') === 'Upwork' ? 'selected' : '' }}>Upwork</option>
            <option value="Instagram" {{ old('source') === 'WhatsApp' ? 'selected' : '' }}>WhatsApp</option>
            <option value="Other" {{ old('source') === 'Other' ? 'selected' : '' }}>Other</option>
        </select>
    </div>
    
    <button class="px-8 py-3 md:px-10 md:py-4 bg-[#3fb950] text-white font-bold rounded-2xl hover:bg-[#349e44] transition-all hover:scale-[1.02] flex items-center gap-2 w-full sm:w-auto shadow-[0_0_15px_rgba(63,185,80,0.3)]">
        Send Message <i class="fa-solid fa-arrow-right"></i>
    </button>
</form>
    </div>

  
    
</div>
        
    </main>
</x-layout.mainlayout>