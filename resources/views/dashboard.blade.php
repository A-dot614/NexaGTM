<x-app-layout>
    {{-- 
        NexaGTM Dashboard
        ─────────────────
        Shows:
          - Welcome greeting with user name & workspace
          - Account stats cards (Verification, Company, Member Since)
          - Quick actions (Book Call, Edit Profile, View Playbooks, Contact)
          - Scheduled Consultations / Recent Bookings
          - Getting Started Onboarding Checklist
    --}}

    <x-slot name="title">Account &amp; Pipeline Overview</x-slot>

    <div class="max-w-7xl mx-auto space-y-6">

        {{-- Welcome Banner: Liquid Glass --}}
        <div class="liquid-glass-card rounded-3xl p-6 md:p-8 text-white relative overflow-hidden">
            <span class="style-tag liquid">Liquid Glass</span>
            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-5">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full clay-badge text-xs font-semibold uppercase tracking-wider mb-3">
                        <span class="skeuo-led inline-block"></span> GTM Portal Active
                    </div>
                    <h1 class="text-2xl md:text-3xl font-black tracking-tight">
                        Welcome back, {{ Auth::user()->name }} 👋
                    </h1>
                    <p class="mt-1 text-[#c9d1d9] text-sm md:text-base">
                        Your outbound strategy workspace is live. Review your pipeline health, access battle-tested playbooks, or schedule a 1-on-1 consultation.
                    </p>
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    <a href="{{ route('nexagtm.book-call') }}" class="skeuo-button px-5 py-3 text-[#0d1117] font-black text-xs uppercase tracking-wider rounded-xl flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>Schedule Call</span>
                    </a>
                    <a href="{{ route('nexagtm.gtm-playbooks') }}" class="neomorph-well px-5 py-3 text-white font-bold text-xs uppercase tracking-wider rounded-xl transition">
                        Playbooks
                    </a>
                </div>
            </div>
        </div>

        {{-- Stats Cards: Neomorphism with Debossed Wells --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">

            {{-- Email Verification Status --}}
            <div class="neomorph-card rounded-2xl p-6 relative">
                <div class="flex items-center justify-between">
                    <p class="text-xs text-[#8a9e8a] font-semibold uppercase tracking-wider">Email Verification</p>
                    <span class="skeuo-led inline-block {{ Auth::user()->email_verified_at ? '' : 'bg-amber-400 shadow-[0_0_10px_rgba(251,191,36,0.6)]' }}"></span>
                </div>
                <p class="mt-2 text-2xl font-black {{ Auth::user()->email_verified_at ? 'text-[#3fb950]' : 'text-amber-400' }}">
                    {{ Auth::user()->email_verified_at ? '✓ Verified' : '⚠ Pending' }}
                </p>
                @unless(Auth::user()->email_verified_at)
                    <form method="POST" action="{{ route('verification.send') }}" class="mt-2">
                        @csrf
                        <button type="submit" class="text-xs text-[#3fb950] underline hover:text-white transition font-mono">
                            Resend verification link
                        </button>
                    </form>
                @else
                    <p class="text-xs text-[#8a9e8a] mt-1 font-mono">Security &amp; 2FA protection active</p>
                @endunless
            </div>

            {{-- Organization / Account --}}
            <div class="neomorph-card rounded-2xl p-6 relative">
                <p class="text-xs text-[#8a9e8a] font-semibold uppercase tracking-wider">Organization / Workspace</p>
                <p class="mt-2 text-2xl font-black text-white truncate">
                    {{ Auth::user()->company ?? 'Personal Account' }}
                </p>
                <p class="text-xs text-[#8a9e8a] mt-1 truncate font-mono">{{ Auth::user()->email }}</p>
            </div>

            {{-- Member Since --}}
            <div class="neomorph-card rounded-2xl p-6 relative">
                <p class="text-xs text-[#8a9e8a] font-semibold uppercase tracking-wider">Member Since</p>
                <p class="mt-2 text-2xl font-black text-white">
                    {{ Auth::user()->created_at ? Auth::user()->created_at->format('M Y') : 'Active' }}
                </p>
                <p class="text-xs text-[#8a9e8a] mt-1 font-mono">
                    {{ Auth::user()->created_at ? Auth::user()->created_at->diffForHumans() : 'Recent' }}
                </p>
            </div>
        </div>

        {{-- Scheduled Calls: Spatial UI Card --}}
        @php
            $recentBookings = \App\Models\CallBooking::where('email', Auth::user()->email)->latest()->take(3)->get();
        @endphp

        <div class="spatial-card rounded-3xl p-6 relative">
            <span class="style-tag spatial">Spatial UI</span>
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-base font-bold uppercase tracking-wider text-white flex items-center gap-2">
                    <span>📅 Strategy Sessions &amp; Calls</span>
                </h3>
                <a href="{{ route('nexagtm.book-call') }}" class="text-xs font-bold text-[#3fb950] hover:underline flex items-center gap-1">
                    <span>+ Book Another Call</span>
                    <span>&rarr;</span>
                </a>
            </div>

            @if($recentBookings->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach($recentBookings as $booking)
                        <div class="neomorph-well p-4 rounded-xl flex flex-col justify-between">
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-full {{ $booking->call_type === 'video' ? 'clay-badge text-[#3fb950]' : 'bg-[#1c2d42] text-[#58a6ff] border border-[#388bfd]/40' }}">
                                        {{ $booking->call_type === 'video' ? '📹 Video Call' : '📞 Voice Call' }}
                                    </span>
                                    <span class="text-[10px] text-[#8a9e8a] font-mono capitalize">{{ $booking->status }}</span>
                                </div>
                                <h4 class="font-bold text-white text-sm">
                                    {{ \Carbon\Carbon::parse($booking->date)->format('l, M j, Y') }}
                                </h4>
                                <p class="text-xs font-semibold text-[#3fb950] mt-0.5">{{ $booking->time_slot }}</p>
                                <p class="text-[11px] text-[#8a9e8a] mt-1 font-mono">🌍 {{ $booking->timezone }}</p>
                                @if($booking->topic)
                                    <p class="text-xs text-[#c9d1d9] mt-2 truncate font-medium">Topic: {{ $booking->topic }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="neomorph-well p-6 rounded-2xl flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div>
                        <h4 class="font-bold text-white text-sm">No scheduled strategy sessions yet</h4>
                        <p class="text-xs text-[#8a9e8a] mt-1">
                            Book a free 30-minute consultation with our founders to analyze your ICP and outbound architecture.
                        </p>
                    </div>
                    <a href="{{ route('nexagtm.book-call') }}" class="skeuo-button px-5 py-2.5 text-[#0d1117] font-black text-xs uppercase tracking-wider rounded-xl flex-shrink-0">
                        Schedule Free 30-Min Call
                    </a>
                </div>
            @endif
        </div>

        {{-- Quick Actions: Neomorphic Cards --}}
        <div class="neomorph-card rounded-2xl p-6 relative">
            <h3 class="text-base font-bold uppercase tracking-wider text-white mb-4">Quick Navigation</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                
                <a href="{{ route('nexagtm.book-call') }}"
                    class="neomorph-well flex items-center gap-3.5 p-4 rounded-xl group transition">
                    <span class="w-10 h-10 rounded-xl clay-badge text-lg flex items-center justify-center transition group-hover:scale-110">📅</span>
                    <div class="min-w-0">
                        <p class="font-bold text-sm text-white group-hover:text-[#3fb950] transition truncate">Book Strategy Call</p>
                        <p class="text-xs text-[#8a9e8a] truncate">Video or voice 1-on-1</p>
                    </div>
                </a>

                <a href="{{ route('profile.edit') }}"
                    class="neomorph-well flex items-center gap-3.5 p-4 rounded-xl group transition">
                    <span class="w-10 h-10 rounded-xl clay-badge text-lg flex items-center justify-center transition group-hover:scale-110">👤</span>
                    <div class="min-w-0">
                        <p class="font-bold text-sm text-white group-hover:text-[#3fb950] transition truncate">Edit Profile</p>
                        <p class="text-xs text-[#8a9e8a] truncate">Security &amp; credentials</p>
                    </div>
                </a>

                <a href="{{ route('nexagtm.gtm-playbooks') }}"
                    class="neomorph-well flex items-center gap-3.5 p-4 rounded-xl group transition">
                    <span class="w-10 h-10 rounded-xl clay-badge text-lg flex items-center justify-center transition group-hover:scale-110">📋</span>
                    <div class="min-w-0">
                        <p class="font-bold text-sm text-white group-hover:text-[#3fb950] transition truncate">GTM Playbooks</p>
                        <p class="text-xs text-[#8a9e8a] truncate">Outbound battlecards</p>
                    </div>
                </a>

                <a href="{{ route('nexagtm.contact') }}"
                    class="neomorph-well flex items-center gap-3.5 p-4 rounded-xl group transition">
                    <span class="w-10 h-10 rounded-xl clay-badge text-lg flex items-center justify-center transition group-hover:scale-110">💬</span>
                    <div class="min-w-0">
                        <p class="font-bold text-sm text-white group-hover:text-[#3fb950] transition truncate">Contact Agency</p>
                        <p class="text-xs text-[#8a9e8a] truncate">Direct team support</p>
                    </div>
                </a>

            </div>
        </div>

        {{-- Getting Started Checklist: Clay Step Bubbles & Minimalist Layout --}}
        <div class="neomorph-card rounded-2xl p-6 relative">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-base font-bold uppercase tracking-wider text-white">Onboarding Milestones</h3>
                <span class="style-tag clay">Clay Milestones</span>
            </div>
            <ul class="space-y-3">
                <li class="neomorph-well flex items-center gap-3 p-3 rounded-xl">
                    <span class="clay-step-bubble active text-xs font-black flex items-center justify-center">✓</span>
                    <span class="text-sm font-medium text-gray-200">Create your NexaGTM portal account</span>
                </li>
                <li class="neomorph-well flex items-center gap-3 p-3 rounded-xl">
                    <span class="clay-step-bubble {{ Auth::user()->email_verified_at ? 'active' : '' }} text-xs font-black flex items-center justify-center">
                        {{ Auth::user()->email_verified_at ? '✓' : '2' }}
                    </span>
                    <span class="text-sm font-medium {{ Auth::user()->email_verified_at ? 'text-gray-200' : 'text-[#8a9e8a]' }}">Verify your work email address</span>
                </li>
                <li class="neomorph-well flex items-center gap-3 p-3 rounded-xl">
                    <span class="clay-step-bubble {{ $recentBookings->count() > 0 ? 'active' : '' }} text-xs font-black flex items-center justify-center">
                        {{ $recentBookings->count() > 0 ? '✓' : '3' }}
                    </span>
                    <span class="text-sm font-medium {{ $recentBookings->count() > 0 ? 'text-gray-200' : 'text-[#8a9e8a]' }}">Book your 30-minute introductory strategy session</span>
                </li>
                <li class="neomorph-well flex items-center gap-3 p-3 rounded-xl">
                    <span class="clay-step-bubble text-xs font-bold flex items-center justify-center opacity-60">4</span>
                    <span class="text-sm font-medium text-[#8a9e8a]">Deploy your verified lead pipeline &amp; cold email infrastructure</span>
                </li>
            </ul>
        </div>

    </div>
</x-app-layout>
