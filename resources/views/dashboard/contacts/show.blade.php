<x-app-layout>
    {{-- 
        NexaGTM Contact Message Details
        ─────────────────────────────
        Full details of a single contact-form submission, plus status toggle & delete.
    --}}

    <x-slot name="title">Contact Message</x-slot>

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
            <a href="{{ route('dashboard.contacts') }}"
               class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-[#30363d] text-xs font-bold text-[#8b949e] hover:text-white hover:bg-[#21262d] transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                <span>Back to Inbox</span>
            </a>
            <a href="mailto:{{ $contact->email }}?subject=RE: {{ $contact->subject }}"
               class="skeuo-button px-5 py-2.5 text-white font-black text-xs uppercase tracking-wider rounded-xl flex items-center gap-2">
                <i class="fa-solid fa-reply"></i>
                <span>Reply by Email</span>
            </a>
        </div>

        <div class="liquid-glass-card rounded-3xl p-6 sm:p-10 relative">
            <span class="style-tag style-tag-liquid">Contact</span>

            <div class="flex flex-col sm:flex-row sm:items-start gap-5 pb-8 mb-8 border-b border-[#30363d]/60">
                <div class="w-16 h-16 rounded-2xl bg-[#3fb950]/20 border border-[#3fb950]/40 text-[#3fb950] flex items-center justify-center font-black text-2xl uppercase flex-shrink-0">
                    {{ substr($contact->name, 0, 1) }}
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="text-2xl font-black text-white">{{ $contact->name }}</h3>
                    <p class="text-sm text-[#8a9e8a] mt-0.5">{{ $contact->email }}</p>
                    <div class="flex flex-wrap items-center gap-2 mt-2">
                        @if($contact->phone)
                            <span class="text-[11px] px-2.5 py-1 rounded-full bg-[#21262d] border border-[#30363d] text-[#c9d1d9] font-mono">{{ $contact->phone }}</span>
                        @endif
                        @if($contact->company)
                            <span class="text-[11px] px-2.5 py-1 rounded-full bg-[#21262d] border border-[#30363d] text-[#c9d1d9] font-mono">{{ $contact->company }}</span>
                        @endif
                        @if($contact->linkedin)
                            <a href="{{ $contact->linkedin }}" target="_blank" rel="noopener noreferrer"
                               class="text-[11px] px-2.5 py-1 rounded-full bg-[#21262d] border border-[#30363d] text-[#3fb950] hover:text-white hover:border-[#3fb950]/60 font-mono inline-flex items-center gap-1.5 transition">
                                <i class="fa-brands fa-linkedin"></i>
                                {{ $contact->linkedin }}
                            </a>
                        @endif
                    </div>
                </div>
                <div class="flex flex-col items-start sm:items-end gap-2">
                    <span class="text-[11px] px-3 py-1 rounded-full font-mono uppercase font-bold {{ $contact->status === 'new' ? 'bg-[#3fb950]/20 text-[#3fb950]' : ($contact->status === 'contacted' ? 'bg-amber-400/15 text-amber-400' : 'bg-[#30363d] text-[#8a9e8a]') }}">
                        {{ $contact->status }}
                    </span>
                    <span class="text-[11px] text-[#8a9e8a] font-mono">Received {{ $contact->created_at->format('M j, Y \a\t g:i A') }}</span>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                <div class="bg-[#0d1117] border border-[#30363d] rounded-2xl p-4">
                    <p class="text-[10px] font-bold uppercase tracking-wider text-[#8a9e8a] mb-1">Subject</p>
                    <p class="text-sm font-semibold text-white">{{ $contact->subject }}</p>
                </div>
                <div class="bg-[#0d1117] border border-[#30363d] rounded-2xl p-4">
                    <p class="text-[10px] font-bold uppercase tracking-wider text-[#8a9e8a] mb-1">Budget</p>
                    <p class="text-sm font-semibold text-white">{{ $contact->budget ?: '—' }}</p>
                </div>
                <div class="bg-[#0d1117] border border-[#30363d] rounded-2xl p-4">
                    <p class="text-[10px] font-bold uppercase tracking-wider text-[#8a9e8a] mb-1">Source</p>
                    <p class="text-sm font-semibold text-white">{{ $contact->source ?: '—' }}</p>
                </div>
            </div>

            <div class="bg-[#0d1117] border border-[#30363d] rounded-2xl p-6 sm:p-8">
                <p class="text-xs font-bold uppercase tracking-wider text-[#3fb950] mb-3">Message</p>
                <p class="text-sm sm:text-base text-[#c9d1d9] leading-relaxed whitespace-pre-line">{{ $contact->message }}</p>
            </div>

            <div class="flex flex-wrap items-center justify-between gap-4 mt-8">
                <form method="POST" action="{{ route('dashboard.contacts.update', $contact) }}" class="flex items-end gap-3">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="status" class="block text-[10px] font-bold uppercase tracking-wider text-[#8a9e8a] mb-1.5">Update Status</label>
                        <select name="status" id="status"
                                class="rounded-xl bg-[#0d1117] border border-[#30363d] px-4 py-2.5 text-sm text-white focus:border-[#3fb950] focus:ring-2 focus:ring-[#3fb950]/30 outline-none transition cursor-pointer">
                            <option value="new" {{ $contact->status === 'new' ? 'selected' : '' }}>New</option>
                            <option value="contacted" {{ $contact->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                            <option value="closed" {{ $contact->status === 'closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                    </div>
                    <button type="submit"
                            class="skeuo-button px-5 py-2.5 text-white font-black text-xs uppercase tracking-wider rounded-xl flex items-center gap-2">
                        <i class="fa-solid fa-check"></i>
                        <span>Save</span>
                    </button>
                </form>

                <form method="POST" action="{{ route('dashboard.contacts.destroy', $contact) }}"
                      onsubmit="return confirm('Are you sure you want to delete this message?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="inline-flex items-center gap-2 px-5 py-3 rounded-xl border border-red-500/40 text-xs font-bold text-red-400 hover:bg-red-500/10 transition cursor-pointer">
                        <i class="fa-solid fa-trash"></i>
                        <span>Delete Message</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>