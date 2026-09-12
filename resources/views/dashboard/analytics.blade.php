<x-app-layout>
    {{-- 
        NexaGTM Analytics
        ─────────────────
        Live stats & breakdowns across contacts, bookings and testimonials.
    --}}

    <x-slot name="title">Analytics</x-slot>

    <div class="max-w-7xl mx-auto space-y-6">

        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <h3 class="text-lg font-black text-white">Growth Analytics</h3>
                <p class="text-xs text-[#8a9e8a]">Live insights across your inbound pipeline.</p>
            </div>
            <div class="flex items-center gap-2">
                <a href="{{ route('dashboard.contacts') }}" class="px-4 py-2 rounded-xl border border-[#30363d] text-xs font-bold text-[#8b949e] hover:text-white hover:bg-[#21262d] transition">Contacts</a>
                <a href="{{ route('dashboard.bookings') }}" class="px-4 py-2 rounded-xl border border-[#30363d] text-xs font-bold text-[#8b949e] hover:text-white hover:bg-[#21262d] transition">Bookings</a>
            </div>
        </div>

        {{-- Top Stats --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <div class="neomorph-card rounded-2xl p-6 relative">
                <p class="text-xs text-[#8a9e8a] font-semibold uppercase tracking-wider">Total Contacts</p>
                <p class="mt-2 text-3xl font-black text-[#3fb950]">{{ $totalContacts }}</p>
                <p class="text-xs text-[#8a9e8a] mt-1 font-mono">{{ $newContacts }} new awaiting reply</p>
            </div>
            <div class="neomorph-card rounded-2xl p-6 relative">
                <p class="text-xs text-[#8a9e8a] font-semibold uppercase tracking-wider">Total Bookings</p>
                <p class="mt-2 text-3xl font-black text-[#58a6ff]">{{ $totalBookings }}</p>
                <p class="text-xs text-[#8a9e8a] mt-1 font-mono">{{ $scheduledBookings }} scheduled</p>
            </div>
            <div class="neomorph-card rounded-2xl p-6 relative">
                <p class="text-xs text-[#8a9e8a] font-semibold uppercase tracking-wider">Testimonials</p>
                <p class="mt-2 text-3xl font-black text-amber-400">{{ $totalTestimonials }}</p>
                <p class="text-xs text-[#8a9e8a] mt-1 font-mono">Live social proof</p>
            </div>
            <div class="neomorph-card rounded-2xl p-6 relative">
                <p class="text-xs text-[#8a9e8a] font-semibold uppercase tracking-wider">Total Inbound</p>
                <p class="mt-2 text-3xl font-black text-white">{{ $totalContacts + $totalBookings }}</p>
                <p class="text-xs text-[#8a9e8a] mt-1 font-mono">All submissions</p>
            </div>
        </div>

        {{-- Status Breakdowns --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="spatial-card rounded-3xl p-6 relative">
                <span class="style-tag spatial">Spatial UI</span>
                <h3 class="text-base font-bold uppercase tracking-wider text-white mb-4">Contacts by Status</h3>
                @forelse(['new' => 'New', 'contacted' => 'Contacted', 'closed' => 'Closed'] as $key => $label)
                    @php $count = $contactsByStatus[$key] ?? 0; @endphp
                    <div class="mb-3">
                        <div class="flex items-center justify-between text-xs mb-1">
                            <span class="font-bold text-[#c9d1d9]">{{ $label }}</span>
                            <span class="text-[#8a9e8a] font-mono">{{ $count }}</span>
                        </div>
                        <div class="h-2 rounded-full bg-[#21262d] overflow-hidden">
                            <div class="h-full rounded-full {{ $key === 'new' ? 'bg-[#3fb950]' : ($key === 'contacted' ? 'bg-amber-400' : 'bg-[#8b949e]') }}"
                                 style="width: {{ $totalContacts ? round($count / $totalContacts * 100) : 0 }}%"></div>
                        </div>
                    </div>
                @empty
                    <p class="text-xs text-[#8a9e8a]">No contacts yet.</p>
                @endforelse
            </div>

            <div class="spatial-card rounded-3xl p-6 relative">
                <span class="style-tag spatial">Spatial UI</span>
                <h3 class="text-base font-bold uppercase tracking-wider text-white mb-4">Bookings by Status</h3>
                @forelse(['scheduled' => 'Scheduled', 'contacted' => 'Contacted', 'completed' => 'Completed', 'cancelled' => 'Cancelled'] as $key => $label)
                    @php $count = $bookingsByStatus[$key] ?? 0; @endphp
                    <div class="mb-3">
                        <div class="flex items-center justify-between text-xs mb-1">
                            <span class="font-bold text-[#c9d1d9]">{{ $label }}</span>
                            <span class="text-[#8a9e8a] font-mono">{{ $count }}</span>
                        </div>
                        <div class="h-2 rounded-full bg-[#21262d] overflow-hidden">
                            <div class="h-full rounded-full {{ $key === 'scheduled' ? 'bg-[#58a6ff]' : ($key === 'contacted' ? 'bg-amber-400' : ($key === 'cancelled' ? 'bg-red-500' : 'bg-[#3fb950]')) }}"
                                 style="width: {{ $totalBookings ? round($count / $totalBookings * 100) : 0 }}%"></div>
                        </div>
                    </div>
                @empty
                    <p class="text-xs text-[#8a9e8a]">No bookings yet.</p>
                @endforelse
            </div>
        </div>

        {{-- Inquiry breakdowns --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="neomorph-card rounded-3xl p-6 relative">
                <h3 class="text-sm font-bold uppercase tracking-wider text-white mb-4 flex items-center gap-2">
                    <span class="text-[#3fb950]">🎯</span> Top Subjects
                </h3>
                <ul class="space-y-2.5">
                    @forelse($contactsBySubject as $row)
                        <li class="flex items-center justify-between text-xs">
                            <span class="text-[#c9d1d9] font-medium truncate">{{ $row->subject }}</span>
                            <span class="text-[#8a9e8a] font-mono flex-shrink-0 ml-3">{{ $row->total }}</span>
                        </li>
                    @empty
                        <li class="text-xs text-[#8a9e8a]">No contacts yet.</li>
                    @endforelse
                </ul>
            </div>

            <div class="neomorph-card rounded-3xl p-6 relative">
                <h3 class="text-sm font-bold uppercase tracking-wider text-white mb-4 flex items-center gap-2">
                    <span class="text-[#58a6ff]">📢</span> Top Sources
                </h3>
                <ul class="space-y-2.5">
                    @forelse($contactsBySource as $row)
                        <li class="flex items-center justify-between text-xs">
                            <span class="text-[#c9d1d9] font-medium truncate">{{ $row->source }}</span>
                            <span class="text-[#8a9e8a] font-mono flex-shrink-0 ml-3">{{ $row->total }}</span>
                        </li>
                    @empty
                        <li class="text-xs text-[#8a9e8a]">No sources recorded yet.</li>
                    @endforelse
                </ul>
            </div>

            <div class="neomorph-card rounded-3xl p-6 relative">
                <h3 class="text-sm font-bold uppercase tracking-wider text-white mb-4 flex items-center gap-2">
                    <span class="text-[#d29922]">💵</span> Budgets &amp; Call Types
                </h3>
                <div class="space-y-2.5 mb-5">
                    @forelse($contactsByBudget as $row)
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-[#c9d1d9] font-medium truncate">{{ $row->budget }}</span>
                            <span class="text-[#8a9e8a] font-mono flex-shrink-0 ml-3">{{ $row->total }}</span>
                        </div>
                    @empty
                        <p class="text-xs text-[#8a9e8a]">No budgets recorded yet.</p>
                    @endforelse
                </div>
                <div class="border-t border-[#30363d]/60 pt-4 flex items-center gap-6">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-wider text-[#8a9e8a]">Video</p>
                        <p class="text-lg font-black text-[#58a6ff]">{{ $bookingsByType['video'] ?? 0 }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-wider text-[#8a9e8a]">Voice</p>
                        <p class="text-lg font-black text-[#3fb950]">{{ $bookingsByType['voice'] ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Monthly trend --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="liquid-glass-card rounded-3xl p-6 relative">
                <span class="style-tag liquid">Liquid Glass</span>
                <h3 class="text-base font-bold uppercase tracking-wider text-white mb-4">Contacts per Month</h3>
                @if($monthlyContacts->count() > 0)
                    @php $maxContacts = max($monthlyContacts->max('total'), 1); @endphp
                    <div class="flex items-end gap-3 h-32">
                        @foreach($monthlyContacts as $row)
                            <div class="flex-1 flex flex-col items-center gap-1.5">
                                <span class="text-[10px] text-[#8a9e8a] font-mono">{{ $row->total }}</span>
                                <div class="w-full rounded-t-lg bg-gradient-to-t from-[#2ea043] to-[#56d364] transition-all"
                                     style="height: {{ round($row->total / $maxContacts * 100) }}%"></div>
                                <span class="text-[9px] text-[#8a9e8a] font-mono">{{ \Carbon\Carbon::parse($row->month)->format('M y') }}</span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-xs text-[#8a9e8a]">No contacts yet.</p>
                @endif
            </div>

            <div class="liquid-glass-card rounded-3xl p-6 relative">
                <span class="style-tag liquid">Liquid Glass</span>
                <h3 class="text-base font-bold uppercase tracking-wider text-white mb-4">Bookings per Month</h3>
                @if($monthlyBookings->count() > 0)
                    @php $maxBookings = max($monthlyBookings->max('total'), 1); @endphp
                    <div class="flex items-end gap-3 h-32">
                        @foreach($monthlyBookings as $row)
                            <div class="flex-1 flex flex-col items-center gap-1.5">
                                <span class="text-[10px] text-[#8a9e8a] font-mono">{{ $row->total }}</span>
                                <div class="w-full rounded-t-lg bg-gradient-to-t from-[#1f6feb] to-[#58a6ff] transition-all"
                                     style="height: {{ round($row->total / $maxBookings * 100) }}%"></div>
                                <span class="text-[9px] text-[#8a9e8a] font-mono">{{ \Carbon\Carbon::parse($row->month)->format('M y') }}</span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-xs text-[#8a9e8a]">No bookings yet.</p>
                @endif
            </div>
        </div>

    </div>
</x-app-layout>