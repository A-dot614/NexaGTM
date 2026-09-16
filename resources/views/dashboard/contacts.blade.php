<x-app-layout>
    {{-- 
        NexaGTM Contact Inbox
        ─────────────────────────────
        Table of submissions from the public contact form
        (contact page → sendContact → contacts table).
    --}}

    <x-slot name="title">Contact Inbox</x-slot>

    <div class="max-w-7xl mx-auto space-y-6">

        @if (session('status'))
            <div class="rounded-2xl border border-[#3fb950]/40 bg-[#3fb950]/10 px-5 py-4 text-sm font-bold text-[#3fb950] flex items-center gap-3">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="rounded-2xl border border-red-500/40 bg-red-500/10 px-5 py-4 text-sm font-bold text-red-400 flex items-center gap-3">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <h3 class="text-lg font-black text-white">{{ $contacts->total() }} Message{{ $contacts->total() === 1 ? '' : 's' }}</h3>
                <p class="text-xs text-[#8a9e8a]">Submissions received from the public contact form.</p>
            </div>
            <a href="{{ route('nexagtm.contact') }}" target="_blank"
               class="skeuo-button px-5 py-3 text-white font-black text-xs uppercase tracking-wider rounded-xl flex items-center gap-2">
                <i class="fa-solid fa-earth-americas"></i>
                <span>View Contact Page</span>
            </a>
        </div>

        {{-- Contacts Table --}}
        <div class="minimal-clean bg-[#161b22]/90 rounded-2xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs sm:text-sm border-collapse min-w-[700px]">
                    <thead>
                        <tr class="border-b border-[#30363d] text-[#8b949e] font-semibold uppercase tracking-wider text-[11px]">
                            <th class="py-4 px-4">Sender</th>
                            <th class="py-4 px-4">Subject</th>
                            <th class="py-4 px-4">Budget</th>
                            <th class="py-4 px-4">Status</th>
                            <th class="py-4 px-4">Received</th>
                            <th class="py-4 px-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#30363d]/60 text-slate-300">
                        @forelse($contacts as $c)
                            <tr class="hover:bg-[#21262d]/50 transition-colors">
                                <td class="py-3.5 px-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-full bg-[#3fb950]/20 border border-[#3fb950]/40 text-[#3fb950] flex items-center justify-center font-black text-sm uppercase flex-shrink-0">
                                            {{ substr($c->name, 0, 1) }}
                                        </div>
                                        <div class="min-w-0">
                                            <div class="font-bold text-white">{{ $c->name }}</div>
                                            <div class="text-[11px] text-[#8a9e8a] truncate max-w-[220px]">{{ $c->email }}{{ $c->company ? ' · ' . $c->company : '' }}</div>
                                            @if($c->linkedin)
                                                <a href="{{ $c->linkedin }}" target="_blank" rel="noopener noreferrer"
                                                   class="text-[11px] text-[#3fb950] hover:text-white transition-colors inline-flex items-center gap-1 max-w-[220px] truncate">
                                                    <i class="fa-brands fa-linkedin"></i>
                                                    {{ $c->linkedin }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3.5 px-4 max-w-[260px]">
                                    <div class="font-semibold text-[#c9d1d9] truncate">{{ $c->subject }}</div>
                                    @if($c->source)
                                        <div class="text-[11px] text-[#8a9e8a]">via {{ $c->source }}</div>
                                    @endif
                                </td>
                                <td class="py-3.5 px-4">{{ $c->budget ?: '—' }}</td>
                                <td class="py-3.5 px-4">
                                    <span class="text-[10px] px-2.5 py-1 rounded-full font-mono uppercase font-bold {{ $c->status === 'new' ? 'bg-[#3fb950]/20 text-[#3fb950]' : ($c->status === 'contacted' ? 'bg-amber-400/15 text-amber-400' : 'bg-[#30363d] text-[#8a9e8a]') }}">
                                        {{ $c->status }}
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 text-[#8a9e8a] font-mono">{{ $c->created_at->format('M j, Y') }}</td>
                                <td class="py-3.5 px-4">
                                    <div class="flex items-center justify-end gap-1.5">
                                        <a href="{{ route('dashboard.contacts.show', $c) }}"
                                           title="View message"
                                           class="p-2 rounded-lg text-[#8b949e] hover:text-[#3fb950] hover:bg-[#3fb950]/10 border border-[#30363d] hover:border-[#3fb950]/40 transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        </a>
                                        <form method="POST" action="{{ route('dashboard.contacts.destroy', $c) }}"
                                              onsubmit="return confirm('Are you sure you want to delete this message?');"
                                              class="inline-flex">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Delete"
                                                    class="p-2 rounded-lg text-red-400 hover:text-white hover:bg-red-500/15 border border-red-500/40 hover:border-red-500/60 transition cursor-pointer">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-14 text-center">
                                    <div class="text-4xl mb-3">📬</div>
                                    <p class="text-sm font-bold text-white">No contact submissions yet</p>
                                    <p class="text-xs text-[#8a9e8a] mt-1">Messages from your contact page will appear here.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($contacts->hasPages())
                <div class="px-4 py-4 border-t border-[#30363d]/60">
                    {{ $contacts->links() }}
                </div>
            @endif
        </div>

    </div>
</x-app-layout>