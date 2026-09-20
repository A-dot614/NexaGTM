<x-app-layout>
    {{-- 
        NexaGTM Dashboard
        ─────────────────
        Central hub — links to Contact Inbox, Playbooks, Testimonials & Analytics,
        plus a live overview of the newest submissions.
    --}}

    <x-slot name="title">Dashboard</x-slot>

    @php
        $contacts = \App\Models\Contact::count();
        $newContacts = \App\Models\Contact::where('status', 'new')->count();
        $testimonials = \App\Models\Testimonial::count();
        $playbooks = \App\Models\Playbook::count();
        $recentContacts = \App\Models\Contact::latest()->take(4)->get();
        $recentPlaybooks = \App\Models\Playbook::latest()->take(4)->get();
    @endphp

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
                        Welcome back, {{ Auth::user()->name }}
                    </h1>
                    <p class="mt-1 text-[#c9d1d9] text-sm md:text-base">
                        Del pipeline, conversation aur reviews all ek jagah. Dashboard se contacts, playbooks, testimonials aur analytics manage karein.
                    </p>
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    <a href="{{ route('dashboard.analytics') }}" class="skeuo-button px-5 py-3 text-[#0d1117] font-black text-xs uppercase tracking-wider rounded-xl flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        <span>Open Analytics</span>
                    </a>
                </div>
            </div>
        </div>

        {{-- Module Hub Cards: Neomorphism --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

            {{-- Contact Inbox --}}
            <a href="{{ route('dashboard.contacts') }}" class="neomorph-card rounded-2xl p-6 relative group transition hover:border-[#3fb950]/60">
                <div class="flex items-center justify-between mb-4">
                    <span class="w-11 h-11 rounded-xl bg-[#3fb950]/15 border border-[#3fb950]/40 text-[#3fb950] flex items-center justify-center text-base transition group-hover:scale-110">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </span>
                    @if($newContacts > 0)
                        <span class="text-[10px] px-2.5 py-1 rounded-full bg-[#3fb950]/20 text-[#3fb950] font-mono font-bold">{{ $newContacts }} new</span>
                    @endif
                </div>
                <p class="text-3xl font-black text-white">{{ $contacts }}</p>
                <p class="text-xs text-[#8a9e8a] font-semibold uppercase tracking-wider mt-1">Contact Inbox</p>
                <p class="text-xs text-[#8a9e8a] mt-1">Messages from the contact page</p>
            </a>

            {{-- Playbooks --}}
            <a href="{{ route('dashboard.playbooks') }}" class="neomorph-card rounded-2xl p-6 relative group transition hover:border-[#a371f7]/60">
                <div class="flex items-center justify-between mb-4">
                    <span class="w-11 h-11 rounded-xl bg-[#a371f7]/15 border border-[#a371f7]/40 text-[#a371f7] flex items-center justify-center transition group-hover:scale-110">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </span>
                    @if($playbooks > 0)
                        <span class="text-[10px] px-2.5 py-1 rounded-full bg-[#a371f7]/20 text-[#a371f7] font-mono font-bold">{{ $playbooks }} published</span>
                    @endif
                </div>
                <p class="text-3xl font-black text-white">{{ $playbooks }}</p>
                <p class="text-xs text-[#8a9e8a] font-semibold uppercase tracking-wider mt-1">Playbooks</p>
                <p class="text-xs text-[#8a9e8a] mt-1">Battle-tested GTM blueprints</p>
            </a>

            {{-- Testimonials --}}
            <a href="{{ route('dashboard.testimonials') }}" class="neomorph-card rounded-2xl p-6 relative group transition hover:border-[#3fb950]/60">
                <div class="flex items-center justify-between mb-4">
                    <span class="w-11 h-11 rounded-xl bg-amber-400/15 border border-amber-400/40 text-amber-400 flex items-center justify-center transition group-hover:scale-110">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    </span>
                </div>
                <p class="text-3xl font-black text-white">{{ $testimonials }}</p>
                <p class="text-xs text-[#8a9e8a] font-semibold uppercase tracking-wider mt-1">Testimonials</p>
                <p class="text-xs text-[#8a9e8a] mt-1">Client reviews &amp; social proof</p>
            </a>

            {{-- Analytics --}}
            <a href="{{ route('dashboard.analytics') }}" class="neomorph-card rounded-2xl p-6 relative group transition hover:border-[#3fb950]/60">
                <div class="flex items-center justify-between mb-4">
                    <span class="w-11 h-11 rounded-xl bg-[#d29922]/15 border border-[#d29922]/40 text-[#d29922] flex items-center justify-center transition group-hover:scale-110">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    </span>
                </div>
                <p class="text-3xl font-black text-white">Insights</p>
                <p class="text-xs text-[#8a9e8a] font-semibold uppercase tracking-wider mt-1">Analytics</p>
                <p class="text-xs text-[#8a9e8a] mt-1">Trends, sources &amp; breakdowns</p>
            </a>

        </div>

        {{-- Recent Activity --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            {{-- Recent Contacts --}}
            <div class="spatial-card rounded-3xl p-6 relative">
                <span class="style-tag spatial">Spatial UI</span>
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-base font-bold uppercase tracking-wider text-white flex items-center gap-2">
                        <span>Latest Contact Messages</span>
                    </h3>
                    <a href="{{ route('dashboard.contacts') }}" class="text-xs font-bold text-[#3fb950] hover:underline flex items-center gap-1">
                        <span>View All</span><span>&rarr;</span>
                    </a>
                </div>

                @if($recentContacts->count() > 0)
                    <ul class="space-y-3">
                        @foreach($recentContacts as $c)
                            <li class="neomorph-well p-3.5 rounded-xl flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-[#3fb950]/20 border border-[#3fb950]/40 text-[#3fb950] flex items-center justify-center font-black text-xs uppercase flex-shrink-0">
                                    {{ substr($c->name, 0, 1) }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between gap-2">
                                        <p class="font-bold text-white text-sm truncate">{{ $c->name }}</p>
                                        <span class="text-[10px] text-[#8a9e8a] font-mono flex-shrink-0">{{ $c->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-xs text-[#8a9e8a] truncate">{{ $c->subject }} — {{ Str::limit($c->message, 60) }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="neomorph-well p-6 rounded-2xl text-center">
                        <p class="text-sm font-bold text-white">No contact messages yet</p>
                        <p class="text-xs text-[#8a9e8a] mt-1">Submissions from the contact page will appear here.</p>
                    </div>
                @endif
            </div>

            {{-- Latest Playbooks --}}
            <div class="spatial-card rounded-3xl p-6 relative">
                <span class="style-tag spatial">Spatial UI</span>
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-base font-bold uppercase tracking-wider text-white flex items-center gap-2">
                        <span>Latest Playbooks</span>
                    </h3>
                    <a href="{{ route('dashboard.playbooks') }}" class="text-xs font-bold text-[#3fb950] hover:underline flex items-center gap-1">
                        <span>View All</span><span>&rarr;</span>
                    </a>
                </div>

                @if($recentPlaybooks->count() > 0)
                    <ul class="space-y-3">
                        @foreach($recentPlaybooks as $p)
                            <li class="neomorph-well p-3.5 rounded-xl flex items-center gap-3">
                                <div class="w-9 h-9 rounded-lg bg-[#3fb950]/20 border border-[#3fb950]/40 text-[#3fb950] flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between gap-2">
                                        <p class="font-bold text-white text-sm truncate">{{ $p->name }}</p>
                                        <span class="text-[10px] text-[#8a9e8a] font-mono flex-shrink-0">{{ $p->created_at->diffForHumans() }}</span>
                                    </div>
                                    @if($p->description)
                                        <p class="text-xs text-[#8b949e] truncate">{{ \Illuminate\Support\Str::limit($p->description, 65) }}</p>
                                    @endif
                                    <p class="text-xs text-[#8a9e8a] truncate">
                                        {{ $p->status }} · <a href="{{ $p->template_url }}" target="_blank" class="hover:text-[#3fb950]">Open template</a>
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="neomorph-well p-6 rounded-2xl text-center">
                        <p class="text-sm font-bold text-white">No playbooks yet</p>
                        <p class="text-xs text-[#8a9e8a] mt-1">Published GTM blueprints will appear here.</p>
                    </div>
                @endif
            </div>

        </div>

    </div>
</x-app-layout>