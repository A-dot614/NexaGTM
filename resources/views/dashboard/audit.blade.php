<x-app-layout>
    {{-- 
        NexaGTM Activity Logs
        ─────────────────────────────
        Full audit trail — who logged in, who submitted what, and every change
        made across the dashboard.
    --}}

    <x-slot name="title">Activity Logs</x-slot>

    <div class="max-w-7xl mx-auto space-y-6">

        @if (session('status'))
            <div class="rounded-2xl border border-[#3fb950]/40 bg-[#3fb950]/10 px-5 py-4 text-sm font-bold text-[#3fb950] flex items-center gap-3">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <h3 class="text-lg font-black text-white">{{ $logs->total() }} Activity Log{{ $logs->total() === 1 ? '' : 's' }}</h3>
                <p class="text-xs text-[#8a9e8a]">Complete audit trail — logins, submissions and every dashboard change.</p>
            </div>
        </div>

        {{-- Summary cards --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="neomorph-card rounded-2xl p-5">
                <p class="text-[10px] text-[#8a9e8a] font-bold uppercase tracking-wider">Logins</p>
                <p class="mt-1 text-2xl font-black text-[#3fb950]">{{ $events['login'] ?? 0 }}</p>
            </div>
            <div class="neomorph-card rounded-2xl p-5">
                <p class="text-[10px] text-[#8a9e8a] font-bold uppercase tracking-wider">Submissions</p>
                <p class="mt-1 text-2xl font-black text-[#58a6ff]">{{ ($events['submission'] ?? 0) }}</p>
            </div>
            <div class="neomorph-card rounded-2xl p-5">
                <p class="text-[10px] text-[#8a9e8a] font-bold uppercase tracking-wider">Status Changes</p>
                <p class="mt-1 text-2xl font-black text-amber-400">{{ $events['status_changed'] ?? 0 }}</p>
            </div>
            <div class="neomorph-card rounded-2xl p-5">
                <p class="text-[10px] text-[#8a9e8a] font-bold uppercase tracking-wider">Created / Deleted</p>
                <p class="mt-1 text-2xl font-black text-white">{{ ($events['created'] ?? 0) + ($events['deleted'] ?? 0) }}</p>
            </div>
        </div>

        {{-- Filters --}}
        <form method="GET" action="{{ route('dashboard.audit') }}" class="minimal-clean bg-[#161b22]/90 rounded-2xl p-4 flex flex-wrap items-end gap-3">
            <div class="flex-1 min-w-[180px]">
                <label class="block text-[10px] font-bold uppercase tracking-wider text-[#8a9e8a] mb-1.5">Search</label>
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Name, email, description, IP..."
                       class="w-full rounded-xl bg-[#0d1117] border border-[#30363d] px-4 py-2.5 text-sm text-white placeholder-[#8b949e] focus:border-[#3fb950] focus:ring-2 focus:ring-[#3fb950]/30 outline-none transition">
            </div>
            <div>
                <label class="block text-[10px] font-bold uppercase tracking-wider text-[#8a9e8a] mb-1.5">Event</label>
                <select name="event"
                        class="rounded-xl bg-[#0d1117] border border-[#30363d] px-4 py-2.5 text-sm text-white focus:border-[#3fb950] focus:ring-2 focus:ring-[#3fb950]/30 outline-none transition cursor-pointer">
                    <option value="all" {{ request('event') === 'all' || !request('event') ? 'selected' : '' }}>All Events</option>
                    <option value="login" {{ request('event') === 'login' ? 'selected' : '' }}>Login</option>
                    <option value="logout" {{ request('event') === 'logout' ? 'selected' : '' }}>Logout</option>
                    <option value="submission" {{ request('event') === 'submission' ? 'selected' : '' }}>Submission</option>
                    <option value="status_changed" {{ request('event') === 'status_changed' ? 'selected' : '' }}>Status Changed</option>
                    <option value="created" {{ request('event') === 'created' ? 'selected' : '' }}>Created</option>
                    <option value="updated" {{ request('event') === 'updated' ? 'selected' : '' }}>Updated</option>
                    <option value="deleted" {{ request('event') === 'deleted' ? 'selected' : '' }}>Deleted</option>
                </select>
            </div>
            <div>
                <label class="block text-[10px] font-bold uppercase tracking-wider text-[#8a9e8a] mb-1.5">Module</label>
                <select name="log"
                        class="rounded-xl bg-[#0d1117] border border-[#30363d] px-4 py-2.5 text-sm text-white focus:border-[#3fb950] focus:ring-2 focus:ring-[#3fb950]/30 outline-none transition cursor-pointer">
                    <option value="all" {{ request('log') === 'all' || !request('log') ? 'selected' : '' }}>All Modules</option>
                    <option value="auth" {{ request('log') === 'auth' ? 'selected' : '' }}>Auth</option>
                    <option value="contact" {{ request('log') === 'contact' ? 'selected' : '' }}>Contact</option>
                    <option value="booking" {{ request('log') === 'booking' ? 'selected' : '' }}>Booking</option>
                    <option value="testimonial" {{ request('log') === 'testimonial' ? 'selected' : '' }}>Testimonial</option>
                    <option value="profile" {{ request('log') === 'profile' ? 'selected' : '' }}>Profile</option>
                </select>
            </div>
            <button type="submit"
                    class="skeuo-button px-5 py-2.5 text-white font-black text-xs uppercase tracking-wider rounded-xl flex items-center gap-2">
                <i class="fa-solid fa-filter"></i>
                <span>Filter</span>
            </button>
            @if(request('q') || (request('event') && request('event') !== 'all') || (request('log') && request('log') !== 'all'))
                <a href="{{ route('dashboard.audit') }}" class="px-4 py-2.5 rounded-xl border border-[#30363d] text-xs font-bold text-[#8b949e] hover:text-white hover:bg-[#21262d] transition">
                    Clear
                </a>
            @endif
        </form>

        {{-- Activity feed --}}
        <div class="minimal-clean bg-[#161b22]/90 rounded-2xl overflow-hidden">
            <div class="divide-y divide-[#30363d]/60">
                @forelse($logs as $log)
                    <div class="flex items-start gap-4 p-4 hover:bg-[#21262d]/50 transition-colors">
                        <div class="w-10 h-10 rounded-full bg-[#3fb950]/20 border border-[#3fb950]/40 text-[#3fb950] flex items-center justify-center font-black text-sm uppercase flex-shrink-0 mt-0.5">
                            {{ substr($log->user_name ?: '?', 0, 1) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex flex-wrap items-center justify-between gap-2">
                                <p class="text-sm font-bold text-white truncate">
                                    {{ $log->user_name ?? 'Guest / Unknown' }}
                                    <span class="text-[#8a9e8a] font-medium">· {{ $log->description }}</span>
                                </p>
                                <span class="text-[11px] text-[#8a9e8a] font-mono flex-shrink-0">{{ $log->created_at->format('M j, Y g:i A') }}</span>
                            </div>
                            <div class="flex flex-wrap items-center gap-2 mt-1.5">
                                <span class="text-[10px] px-2 py-0.5 rounded-full font-mono uppercase font-bold {{ $log->event === 'login' || $log->event === 'submission' ? 'bg-[#3fb950]/20 text-[#3fb950]' : ($log->event === 'deleted' ? 'bg-red-500/10 text-red-400' : ($log->event === 'status_changed' ? 'bg-amber-400/15 text-amber-400' : 'bg-[#21262d] text-[#8a9e8a] border border-[#30363d]')) }}">
                                    {{ $log->event }}
                                </span>
                                <span class="text-[10px] px-2 py-0.5 rounded-full bg-[#21262d] text-[#8a9e8a] font-mono border border-[#30363d] uppercase">{{ $log->log_name }}</span>
                                @if($log->user_email)
                                    <span class="text-[10px] text-[#8a9e8a] font-mono">{{ $log->user_email }}</span>
                                @endif
                                @if($log->ip_address)
                                    <span class="text-[10px] text-[#8a9e8a] font-mono">IP: {{ $log->ip_address }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="py-16 text-center">
                        <div class="text-4xl mb-3">🕵️</div>
                        <p class="text-sm font-bold text-white">No activity recorded yet</p>
                        <p class="text-xs text-[#8a9e8a] mt-1">Logins, submissions and dashboard changes will be tracked here.</p>
                    </div>
                @endforelse
            </div>
            @if($logs->hasPages())
                <div class="px-4 py-4 border-t border-[#30363d]/60">
                    {{ $logs->links() }}
                </div>
            @endif
        </div>

    </div>
</x-app-layout>