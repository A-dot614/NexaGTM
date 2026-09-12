<x-app-layout>
    {{-- 
        NexaGTM Edit Testimonial
        ─────────────────────────────
        Full-page form to update a testimonial.
    --}}

    <x-slot name="title">Edit Testimonial</x-slot>

    <div class="max-w-3xl mx-auto space-y-6">

        @if (session('status'))
            <div class="rounded-2xl border border-[#3fb950]/40 bg-[#3fb950]/10 px-5 py-4 text-sm font-bold text-[#3fb950] flex items-center gap-3">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="rounded-2xl border border-red-500/40 bg-red-500/10 px-5 py-4 text-sm font-bold text-red-400">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="flex flex-wrap items-center justify-between gap-4">
            <a href="{{ route('dashboard.testimonials.show', $testimonial) }}"
               class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-[#30363d] text-xs font-bold text-[#8b949e] hover:text-white hover:bg-[#21262d] transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                <span>Back to Details</span>
            </a>
            <p class="text-xs text-[#8a9e8a] font-mono">Last updated {{ $testimonial->updated_at->diffForHumans() }}</p>
        </div>

        <div class="neomorph-card rounded-3xl p-6 sm:p-10 relative">
            <span class="style-tag style-tag-neomorph">Edit Form</span>

            <h3 class="text-lg font-black text-white flex items-center gap-2 mb-1">
                <span class="text-[#3fb950]">✏️</span> Edit Testimonial
            </h3>
            <p class="text-xs text-[#8a9e8a] mb-8">Update the client review for <strong class="text-white">{{ $testimonial->client_name }}</strong>.</p>

            <form method="POST" action="{{ route('dashboard.testimonials.update', $testimonial) }}" enctype="multipart/form-data" class="space-y-5">
                @csrf
                @method('PATCH')

                <div>
                    <label for="client_name" class="block text-xs font-bold uppercase tracking-wider text-[#8a9e8a] mb-1.5">Client Name *</label>
                    <input type="text" name="client_name" id="client_name" value="{{ old('client_name', $testimonial->client_name) }}" required
                           class="w-full rounded-xl bg-[#0d1117] border border-[#30363d] px-4 py-2.5 text-sm text-white placeholder-[#8b949e] focus:border-[#3fb950] focus:ring-2 focus:ring-[#3fb950]/30 outline-none transition">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="company" class="block text-xs font-bold uppercase tracking-wider text-[#8a9e8a] mb-1.5">Company</label>
                        <input type="text" name="company" id="company" value="{{ old('company', $testimonial->company) }}" placeholder="e.g. Acme Inc."
                               class="w-full rounded-xl bg-[#0d1117] border border-[#30363d] px-4 py-2.5 text-sm text-white placeholder-[#8b949e] focus:border-[#3fb950] focus:ring-2 focus:ring-[#3fb950]/30 outline-none transition">
                    </div>
                    <div>
                        <label for="role" class="block text-xs font-bold uppercase tracking-wider text-[#8a9e8a] mb-1.5">Role</label>
                        <input type="text" name="role" id="role" value="{{ old('role', $testimonial->role) }}" placeholder="e.g. VP Sales"
                               class="w-full rounded-xl bg-[#0d1117] border border-[#30363d] px-4 py-2.5 text-sm text-white placeholder-[#8b949e] focus:border-[#3fb950] focus:ring-2 focus:ring-[#3fb950]/30 outline-none transition">
                    </div>
                </div>

                <div>
                    <label for="content" class="block text-xs font-bold uppercase tracking-wider text-[#8a9e8a] mb-1.5">Testimonial *</label>
                    <textarea name="content" id="content" rows="5" required
                              class="w-full rounded-xl bg-[#0d1117] border border-[#30363d] px-4 py-2.5 text-sm text-white placeholder-[#8b949e] focus:border-[#3fb950] focus:ring-2 focus:ring-[#3fb950]/30 outline-none transition resize-y">{{ old('content', $testimonial->content) }}</textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="rating" class="block text-xs font-bold uppercase tracking-wider text-[#8a9e8a] mb-1.5">Star Rating</label>
                        <select name="rating" id="rating"
                                class="w-full rounded-xl bg-[#0d1117] border border-[#30363d] px-4 py-2.5 text-sm text-white focus:border-[#3fb950] focus:ring-2 focus:ring-[#3fb950]/30 outline-none transition cursor-pointer">
                            @for($opt = 5; $opt >= 1; $opt--)
                                <option value="{{ $opt }}" {{ old('rating', $testimonial->rating) == $opt ? 'selected' : '' }}>{{ str_repeat('★', $opt) . str_repeat('☆', 5 - $opt) }} ({{ $opt }})</option>
                            @endfor
                        </select>
                    </div>
                    <div>
                        <label for="avatar" class="block text-xs font-bold uppercase tracking-wider text-[#8a9e8a] mb-1.5">Client Avatar (optional)</label>
                        <input type="file" name="avatar" id="avatar" accept="image/*"
                               class="w-full rounded-xl bg-[#0d1117] border border-[#30363d] px-4 py-2.5 text-sm text-[#8a9e8a] file:mr-3 file:rounded-lg file:border-0 file:bg-[#3fb950]/15 file:px-3 file:py-1.5 file:text-xs file:font-bold file:text-[#3fb950] hover:file:bg-[#3fb950]/25 transition cursor-pointer">
                    </div>
                </div>

                @if($testimonial->avatar)
                    <div class="p-4 rounded-2xl bg-[#0d1117] border border-[#30363d] flex items-center gap-4">
                        <img src="{{ asset('storage/' . $testimonial->avatar) }}" alt="{{ $testimonial->client_name }}"
                             class="w-14 h-14 rounded-full object-cover border border-[#3fb950]/40">
                        <div>
                            <p class="text-xs font-bold text-white">Current avatar</p>
                            <p class="text-[11px] text-[#8a9e8a] mt-0.5">Upload a new file above to replace it.</p>
                        </div>
                    </div>
                @endif

                <label class="flex items-center gap-2.5 text-xs text-[#c9d1d9] cursor-pointer">
                    <input type="checkbox" name="featured" value="1" {{ old('featured', $testimonial->status === 'featured') ? 'checked' : '' }}
                           class="w-4 h-4 rounded bg-[#0d1117] border-[#30363d] text-[#3fb950] focus:ring-[#3fb950]/30 accent-[#3fb950] cursor-pointer">
                    <span>Mark as <strong class="text-[#3fb950]">featured</strong> (highlight on site)</span>
                </label>

                <div class="flex flex-wrap items-center gap-3 pt-2">
                    <button type="submit"
                            class="flex-1 skeuo-button py-3.5 px-4 text-white font-black text-xs uppercase tracking-wider rounded-xl flex items-center justify-center gap-2">
                        <i class="fa-solid fa-floppy-disk"></i>
                        <span>Save Changes</span>
                    </button>
                    <a href="{{ route('dashboard.testimonials.show', $testimonial) }}"
                       class="px-5 py-3.5 rounded-xl border border-[#30363d] text-xs font-bold text-[#8b949e] hover:text-white hover:bg-[#21262d] transition text-center">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>