<x-app-layout>
    {{-- 
        NexaGTM Playbook Details
        ─────────────────────────────
        Full details of a single playbook, plus delete.
    --}}

    <x-slot name="title">Playbook Details</x-slot>

    <div class="max-w-4xl mx-auto space-y-6">

        @if (session('status'))
            <div class="rounded-2xl border border-[#3fb950]/40 bg-[#3fb950]/10 px-5 py-4 text-sm font-bold text-[#3fb950] flex items-center gap-3">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        <div class="flex flex-wrap items-center justify-between gap-4">
            <a href="{{ route('dashboard.playbooks') }}"
               class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-[#30363d] text-xs font-bold text-[#8b949e] hover:text-white hover:bg-[#21262d] transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                <span>Back to Playbooks</span>
            </a>
            <a href="{{ route('dashboard.playbooks.edit', $playbook) }}"
               class="skeuo-button px-5 py-2.5 text-white font-black text-xs uppercase tracking-wider rounded-xl flex items-center gap-2">
                <i class="fa-solid fa-pen"></i>
                <span>Edit Playbook</span>
            </a>
        </div>

        <div class="liquid-glass-card rounded-3xl p-6 sm:p-10 relative">
            <span class="style-tag style-tag-liquid">Playbook</span>

            <div class="flex flex-col sm:flex-row sm:items-start gap-5 pb-8 mb-8 border-b border-[#30363d]/60">
                <div class="w-16 h-16 rounded-2xl bg-[#3fb950]/20 border border-[#3fb950]/40 text-[#3fb950] flex items-center justify-center font-black text-2xl flex-shrink-0">
                    <i class="fa-solid fa-book-open"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="text-2xl font-black text-white">{{ $playbook->name }}</h3>
                    <p class="text-sm text-[#8a9e8a] mt-0.5">Added {{ $playbook->created_at->format('M j, Y') }}</p>
                </div>
                <span class="text-[11px] px-3 py-1 rounded-full font-mono uppercase font-bold {{ $playbook->status === 'published' ? 'bg-[#3fb950]/20 text-[#3fb950]' : 'bg-[#30363d] text-[#8a9e8a]' }}">
                    {{ $playbook->status }}
                </span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                <div class="bg-[#0d1117] border border-[#30363d] rounded-2xl p-5">
                    <p class="text-[10px] font-bold uppercase tracking-wider text-[#8a9e8a] mb-2">Template URL</p>
                    <a href="{{ $playbook->template_url }}" target="_blank" rel="noopener noreferrer"
                       class="text-sm font-semibold text-[#3fb950] hover:text-white transition inline-flex items-center gap-2 break-all">
                        <i class="fa-solid fa-file-lines text-xs"></i>
                        {{ $playbook->template_url }}
                    </a>
                </div>
                <div class="bg-[#0d1117] border border-[#30363d] rounded-2xl p-5">
                    <p class="text-[10px] font-bold uppercase tracking-wider text-[#8a9e8a] mb-2">Explaining Video URL</p>
                    @if($playbook->video_url)
                        <a href="{{ $playbook->video_url }}" target="_blank" rel="noopener noreferrer"
                           class="text-sm font-semibold text-[#8a9e8a] hover:text-[#3fb950] transition inline-flex items-center gap-2 break-all">
                            <i class="fa-solid fa-video text-xs"></i>
                            {{ $playbook->video_url }}
                        </a>
                    @else
                        <p class="text-sm text-[#8a9e8a]/50">—</p>
                    @endif
                </div>
            </div>

            <form method="POST" action="{{ route('dashboard.playbooks.destroy', $playbook) }}"
                  onsubmit="return confirm('Are you sure you want to delete this playbook?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="inline-flex items-center gap-2 px-5 py-3 rounded-xl border border-red-500/40 text-xs font-bold text-red-400 hover:bg-red-500/10 transition cursor-pointer">
                    <i class="fa-solid fa-trash"></i>
                    <span>Delete Playbook</span>
                </button>
            </form>
        </div>
    </div>
</x-app-layout>