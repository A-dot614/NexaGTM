<x-app-layout>
    {{-- 
        NexaGTM Call Booking Details
        ─────────────────────────────
        Full details of a single call booking, plus status toggle & delete.
    --}}

    <x-slot name="title">Call Booking</x-slot>

    <div class="max-w-4xl mx-auto space-y-6">

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
            <a href="{{ route('dashboard.bookings') }}"
               class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-[#30363d] text-xs font-bold text-[#8b949e] hover:text-white hover:bg-[#21262d] transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                <span>Back to Bookings</span>
            </a>
            <a href="mailto:{{ $booking->email }}?subject=Your%20NexaGTM%20Strategy%20Call"
               class="skeuo-button px-5 py-2.5 text-white font-black text-xs uppercase tracking-wider rounded-xl flex items-center gap-2">
                <i class="fa-solid fa-reply"></i>
                <span>Email Client</span>
            </a>
        </div>

        <div class="liquid-glass-card rounded-3xl p-6 sm:p-10 relative">
            <span class="style-tag style-tag-liquid">Call Booking</span>

            <div class="flex flex-col sm:flex-row sm:items-start gap-5 pb-8 mb-8 border-b border-[#30363d]/60">
                <div class="w-16 h-16 rounded-2xl bg-[#3fb950]/20 border border-[#3fb950]/40 text-[#3fb950] flex items-center justify-center text-2xl flex-shrink-0">
                    <i class="fa-solid fa-{{ $booking->call_type === 'video' ? 'video' : 'phone' }}"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="text-2xl font-black text-white">{{ $booking->name }}</h3>
                    <p class="text-sm text-[#8a9e8a] mt-0.5">{{ $booking->email }}</p>
                    <div class="flex flex-wrap items-center gap-2 mt-2">
                        @if($booking->phone)
                            <span class="text-[11px] px-2.5 py-1 rounded-full bg-[#21262d] border border-[#30363d] text-[#c9d1d9] font-mono">{{ $booking->phone }}</span>
                        @endif
                        @if($booking->company)
                            <span class="text-[11px] px-2.5 py-1 rounded-full bg-[#21262d] border border-[#30363d] text-[#c9d1d9] font-mono">{{ $booking->company }}</span>
                        @endif
                    </div>
                </div>
                <div class="flex flex-col items-start sm:items-end gap-2">
                    <span class="text-[11px] px-3 py-1 rounded-full font-mono uppercase font-bold {{ $booking->status === 'scheduled' ? 'bg-[#3fb950]/20 text-[#3fb950]' : ($booking->status === 'contacted' ? 'bg-amber-400/15 text-amber-400' : ($booking->status === 'cancelled' ? 'bg-red-500/10 text-red-400' : 'bg-[#30363d] text-[#8a9e8a]')) }}">
                        {{ $booking->status }}
                    </span>
                    <span class="text-[11px] text-[#8a9e8a] font-mono">Booked {{ $booking->created_at->format('M j, Y \a\t g:i A') }}</span>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                <div class="bg-[#0d1117] border border-[#30363d] rounded-2xl p-4">
                    <p class="text-[10px] font-bold uppercase tracking-wider text-[#8a9e8a] mb-1">Call Type</p>
                    <p class="text-sm font-semibold capitalize text-white">{{ $booking->call_type }}</p>
                </div>
                <div class="bg-[#0d1117] border border-[#30363d] rounded-2xl p-4">
                    <p class="text-[10px] font-bold uppercase tracking-wider text-[#8a9e8a] mb-1">Date</p>
                    <p class="text-sm font-semibold text-white">{{ $booking->date->format('D, M j, Y') }}</p>
                </div>
                <div class="bg-[#0d1117] border border-[#30363d] rounded-2xl p-4">
                    <p class="text-[10px] font-bold uppercase tracking-wider text-[#8a9e8a] mb-1">Time</p>
                    <p class="text-sm font-semibold text-white">{{ $booking->time_slot }} <span class="text-[#8a9e8a] text-xs">· {{ $booking->timezone }}</span></p>
                </div>
                @if($booking->topic)
                    <div class="bg-[#0d1117] border border-[#30363d] rounded-2xl p-4">
                        <p class="text-[10px] font-bold uppercase tracking-wider text-[#8a9e8a] mb-1">Topic</p>
                        <p class="text-sm font-semibold text-white">{{ $booking->topic }}</p>
                    </div>
                @endif
            </div>

            @if($booking->notes)
                <div class="bg-[#0d1117] border border-[#30363d] rounded-2xl p-6 sm:p-8">
                    <p class="text-xs font-bold uppercase tracking-wider text-[#3fb950] mb-3">Notes</p>
                    <p class="text-sm sm:text-base text-[#c9d1d9] leading-relaxed whitespace-pre-line">{{ $booking->notes }}</p>
                </div>
            @endif

            <div class="flex flex-wrap items-center justify-between gap-4 mt-8">
                <form method="POST" action="{{ route('dashboard.bookings.update', $booking) }}" class="flex items-end gap-3">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="status" class="block text-[10px] font-bold uppercase tracking-wider text-[#8a9e8a] mb-1.5">Update Status</label>
                        <select name="status" id="status"
                                class="rounded-xl bg-[#0d1117] border border-[#30363d] px-4 py-2.5 text-sm text-white focus:border-[#3fb950] focus:ring-2 focus:ring-[#3fb950]/30 outline-none transition cursor-pointer">
                            <option value="scheduled" {{ $booking->status === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                            <option value="contacted" {{ $booking->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                            <option value="completed" {{ $booking->status === 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                    <button type="submit"
                            class="skeuo-button px-5 py-2.5 text-white font-black text-xs uppercase tracking-wider rounded-xl flex items-center gap-2">
                        <i class="fa-solid fa-check"></i>
                        <span>Save</span>
                    </button>
                </form>

                <form method="POST" action="{{ route('dashboard.bookings.destroy', $booking) }}"
                      onsubmit="return confirm('Are you sure you want to delete this booking?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="inline-flex items-center gap-2 px-5 py-3 rounded-xl border border-red-500/40 text-xs font-bold text-red-400 hover:bg-red-500/10 transition cursor-pointer">
                        <i class="fa-solid fa-trash"></i>
                        <span>Delete Booking</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>