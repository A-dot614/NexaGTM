<x-app-layout>
    {{-- 
        NexaGTM Testimonial Details
        ─────────────────────────────
        Full details of a single testimonial.
    --}}

    <x-slot name="title">Testimonial Details</x-slot>

    <div class="max-w-4xl mx-auto space-y-6">

        @if (session('status'))
            <div class="rounded-2xl border border-[#3fb950]/40 bg-[#3fb950]/10 px-5 py-4 text-sm font-bold text-[#3fb950] flex items-center gap-3">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        <div class="flex flex-wrap items-center justify-between gap-4">
            <a href="{{ route('dashboard.testimonials') }}"
               class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-[#30363d] text-xs font-bold text-[#8b949e] hover:text-white hover:bg-[#21262d] transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                <span>Back to Testimonials</span>
            </a>
            <a href="{{ route('dashboard.testimonials.edit', $testimonial) }}"
               class="skeuo-button px-5 py-2.5 text-white font-black text-xs uppercase tracking-wider rounded-xl flex items-center gap-2">
                <i class="fa-solid fa-pen"></i>
                <span>Edit Testimonial</span>
            </a>
        </div>

        <div class="liquid-glass-card rounded-3xl p-6 sm:p-10 relative">
            <span class="style-tag style-tag-liquid">Testimonial</span>

            <div class="flex flex-col sm:flex-row sm:items-center gap-5 pb-8 mb-8 border-b border-[#30363d]/60">
                @if($testimonial->avatar)
                    <img src="{{ asset('storage/' . $testimonial->avatar) }}" alt="{{ $testimonial->client_name }}"
                         class="w-20 h-20 rounded-full object-cover border-2 border-[#3fb950]/50">
                @else
                    <div class="w-20 h-20 rounded-full bg-[#3fb950]/20 border border-[#3fb950]/40 text-[#3fb950] flex items-center justify-center font-black text-3xl uppercase">
                        {{ substr($testimonial->client_name, 0, 1) }}
                    </div>
                @endif
                <div class="flex-1 min-w-0">
                    <h3 class="text-2xl font-black text-white">{{ $testimonial->client_name }}</h3>
                    <p class="text-sm text-[#8a9e8a] mt-0.5">
                        {{ $testimonial->role ? $testimonial->role . ' · ' : '' }}{{ $testimonial->company ?? 'Independent' }}
                    </p>
                    <div class="flex items-center gap-3 mt-2">
                        <span class="text-[#56d364] tracking-wider">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fa{{ $i <= $testimonial->rating ? 's' : 'r' }} fa-star"></i>
                            @endfor
                        </span>
                        <span class="text-xs font-mono text-[#8a9e8a]">{{ $testimonial->rating }} / 5</span>
                    </div>
                </div>
                <div class="flex flex-col items-start sm:items-end gap-2">
                    <span class="text-[11px] px-3 py-1 rounded-full font-mono uppercase font-bold {{ $testimonial->status === 'featured' ? 'bg-[#3fb950]/20 text-[#3fb950]' : 'bg-[#30363d] text-[#8a9e8a]' }}">
                        {{ $testimonial->status }}
                    </span>
                    <span class="text-[11px] text-[#8a9e8a] font-mono">Added {{ $testimonial->created_at->format('M j, Y \a\t g:i A') }}</span>
                    <span class="text-[11px] text-[#8a9e8a] font-mono">Updated {{ $testimonial->updated_at->format('M j, Y \a\t g:i A') }}</span>
                </div>
            </div>

            <div class="bg-[#0d1117] border border-[#30363d] rounded-2xl p-6 sm:p-8">
                <p class="text-xs font-bold uppercase tracking-wider text-[#3fb950] mb-3">Client Review</p>
                <p class="text-sm sm:text-base text-[#c9d1d9] italic leading-relaxed">"{{ $testimonial->content }}"</p>
            </div>

            <div class="flex flex-wrap items-center justify-end gap-3 mt-8">
                <form method="POST" action="{{ route('dashboard.testimonials.destroy', $testimonial) }}"
                      onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="inline-flex items-center gap-2 px-5 py-3 rounded-xl border border-red-500/40 text-xs font-bold text-red-400 hover:bg-red-500/10 transition cursor-pointer">
                        <i class="fa-solid fa-trash"></i>
                        <span>Delete Testimonial</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>