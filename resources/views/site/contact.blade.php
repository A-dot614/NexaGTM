<x-layout.mainlayout>
    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-6 py-12 sm:py-20 text-[#e0e1dd]">
        
<!-- Hero Section -->
<div class="mb-12 sm:mb-16" data-aos="fade-up">
    <h1 class="text-3xl md:text-6xl lg:text-8xl font-extrabold tracking-tighter text-white mb-4 sm:mb-6">
        Build Your<br>
        <span class="text-[#004b23]">GTM Engine.</span>
    </h1>
    <p class="text-base md:text-xl text-[#8a9e8a] max-w-2xl">
        Ready to launch your outbound strategy? Let's discuss your ICP, build your automated infrastructure, and start booking qualified meetings.
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
                    <label class="text-[10px] font-bold uppercase tracking-widest text-[#778da9]">Full Name <span class="text-[#E05A47]">*</span></label>
                    <input name="name" value="{{ old('name') }}" type="text" placeholder="John Doe" class="w-full p-4 bg-[#0d1b2a] rounded-2xl border border-[#415a77] focus:border-[#E05A47] outline-none transition-all text-[#e0e1dd]">
                    @error('name')<p class="text-sm text-[#E05A47] mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-bold uppercase tracking-widest text-[#778da9]">Email Address <span class="text-[#E05A47]">*</span></label>
                    <input name="email" value="{{ old('email') }}" type="email" placeholder="john@example.com" class="w-full p-4 bg-[#0d1b2a] rounded-2xl border border-[#415a77] focus:border-[#E05A47] outline-none transition-all text-[#e0e1dd]">
                    @error('email')<p class="text-sm text-[#E05A47] mt-1">{{ $message }}</p>@enderror
                </div>
                <!-- Phone & Company -->
                <div class="space-y-2">
                    <label class="text-[10px] font-bold uppercase tracking-widest text-[#778da9]">Phone (Optional)</label>
                    <input name="phone" value="{{ old('phone') }}" type="tel" placeholder="+1 (555) 123-4567" class="w-full p-4 bg-[#0d1b2a] rounded-2xl border border-[#415a77] focus:border-[#E05A47] outline-none transition-all text-[#e0e1dd]">
                    @error('phone')<p class="text-sm text-[#E05A47] mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-bold uppercase tracking-widest text-[#778da9]">Company (Optional)</label>
                    <input name="company" value="{{ old('company') }}" type="text" placeholder="Your Company" class="w-full p-4 bg-[#0d1b2a] rounded-2xl border border-[#415a77] focus:border-[#E05A47] outline-none transition-all text-[#e0e1dd]">
                    @error('company')<p class="text-sm text-[#E05A47] mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <!-- Subject & Budget -->
            <div class="space-y-2">
                <label class="text-[10px] font-bold uppercase tracking-widest text-[#778da9]">Subject <span class="text-[#E05A47]">*</span></label>
                <select name="subject" class="w-full p-4 bg-[#0d1b2a] rounded-2xl border border-[#415a77] focus:border-[#E05A47] outline-none text-[#e0e1dd]">
                    <option value="">Select a subject</option>
                    <option value="Project inquiry" {{ old('subject') === 'Project inquiry' ? 'selected' : '' }}>Project inquiry</option>
                    <option value="Website support" {{ old('subject') === 'Website support' ? 'selected' : '' }}>Website support</option>
                    <option value="General question" {{ old('subject') === 'General question' ? 'selected' : '' }}>General question</option>
                </select>
                @error('subject')<p class="text-sm text-[#E05A47] mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="space-y-2">
                <label class="text-[10px] font-bold uppercase tracking-widest text-[#778da9]">Budget Range (Optional)</label>
                <select name="budget" class="w-full p-4 bg-[#0d1b2a] rounded-2xl border border-[#415a77] focus:border-[#E05A47] outline-none text-[#e0e1dd]">
                    <option value="">Select if applicable</option>
                    <option value="<$1k" {{ old('budget') === '<$1k' ? 'selected' : '' }}>Less than $1k</option>
                    <option value="$1k-$5k" {{ old('budget') === '$1k-$5k' ? 'selected' : '' }}>$1k - $5k</option>
                    <option value=">$5k" {{ old('budget') === '>$5k' ? 'selected' : '' }}>> $5k</option>
                </select>
                @error('budget')<p class="text-sm text-[#E05A47] mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Message & Source -->
            <div class="space-y-2">
                <label class="text-[10px] font-bold uppercase tracking-widest text-[#778da9]">Message <span class="text-[#E05A47]">*</span></label>
                <textarea name="message" rows="4" placeholder="Tell me about your project, question, or how I can help..." class="w-full p-4 bg-[#0d1b2a] rounded-2xl border border-[#415a77] focus:border-[#E05A47] outline-none transition-all text-[#e0e1dd]">{{ old('message') }}</textarea>
                @error('message')<p class="text-sm text-[#E05A47] mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="space-y-2">
                <label class="text-[10px] font-bold uppercase tracking-widest text-[#778da9]">How did you find me?</label>
                <select name="source" class="w-full p-4 bg-[#0d1b2a] rounded-2xl border border-[#415a77] focus:border-[#E05A47] outline-none text-[#e0e1dd]">
                    <option value="">Select an option</option>
                    <option value="LinkedIn" {{ old('source') === 'LinkedIn' ? 'selected' : '' }}>LinkedIn</option>
                    <option value="GitHub" {{ old('source') === 'GitHub' ? 'selected' : '' }}>GitHub</option>
                    <option value="Instagram" {{ old('source') === 'Instagram' ? 'selected' : '' }}>Instagram</option>
                    <option value="Other" {{ old('source') === 'Other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('source')<p class="text-sm text-[#E05A47] mt-1">{{ $message }}</p>@enderror
            </div>
            
            <button class="px-8 py-3 md:px-10 md:py-4 bg-white text-[#0d1b2a] font-bold rounded-2xl hover:bg-gray-200 transition-all hover:scale-[1.02] flex items-center gap-2 w-full sm:w-auto">
                Send Message <i class="fa-solid fa-arrow-right"></i>
            </button>
        </form>
    </div>

  
    
</div>
        
    </main>
</x-layout.mainlayout>