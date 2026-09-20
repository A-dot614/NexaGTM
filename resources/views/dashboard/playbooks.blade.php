<x-app-layout>
    {{-- 
        NexaGTM Playbooks Manager
        ─────────────────────────────
        Table of existing playbooks + a "Create Playbook" button
        that links to the dedicated create page.
    --}}

    <x-slot name="title">Playbooks</x-slot>

    <div x-data="{
            videoModalOpen: false,
            modalTitle: '',
            modalSrc: '',
            modalType: 'iframe',
            modalPlatform: '',
            openModal(title, src, type, platform) {
                this.modalTitle = title;
                this.modalSrc = src;
                this.modalType = type;
                this.modalPlatform = platform;
                this.videoModalOpen = true;
            },
            closeModal() {
                this.videoModalOpen = false;
                this.modalSrc = '';
            }
         }"
         x-on:keydown.escape.window="closeModal()"
         class="max-w-7xl mx-auto space-y-6">

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
                <h3 class="text-lg font-black text-white">{{ $playbooks->total() }} Playbook{{ $playbooks->total() === 1 ? '' : 's' }}</h3>
                <p class="text-xs text-[#8a9e8a]">Battle-tested GTM blueprints showcased on the playbooks page.</p>
            </div>
            <a href="{{ route('dashboard.playbooks.create') }}"
                    class="skeuo-button px-5 py-3 text-white font-black text-xs uppercase tracking-wider rounded-xl flex items-center gap-2">
                <i class="fa-solid fa-plus"></i>
                <span>Create Playbook</span>
            </a>
        </div>

        {{-- Playbooks Table --}}
        <div class="minimal-clean bg-[#161b22]/90 rounded-2xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs sm:text-sm border-collapse min-w-[700px]">
                    <thead>
                        <tr class="border-b border-[#30363d] text-[#8b949e] font-semibold uppercase tracking-wider text-[11px]">
                            <th class="py-4 px-4">Playbook</th>
                            <th class="py-4 px-4">Template URL</th>
                            <th class="py-4 px-4">Video URL</th>
                            <th class="py-4 px-4">Status</th>
                            <th class="py-4 px-4">Added</th>
                            <th class="py-4 px-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#30363d]/60 text-slate-300">
                        @forelse($playbooks as $p)
                            <tr class="hover:bg-[#21262d]/50 transition-colors">
                                <td class="py-3.5 px-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-full bg-[#3fb950]/20 border border-[#3fb950]/40 text-[#3fb950] flex items-center justify-center font-black text-sm uppercase flex-shrink-0">
                                            <i class="fa-solid fa-book-open"></i>
                                        </div>
                                        <div class="min-w-0">
                                            <div class="font-bold text-white truncate max-w-xs">{{ $p->name }}</div>
                                            @if($p->description)
                                                <div class="text-[11px] text-[#8b949e] truncate max-w-xs mt-0.5">{{ \Illuminate\Support\Str::limit($p->description, 60) }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3.5 px-4">
                                    <a href="{{ $p->template_url }}" target="_blank" rel="noopener noreferrer"
                                       class="text-[#3fb950] hover:text-white inline-flex items-center gap-1.5 max-w-[220px] truncate transition">
                                        <i class="fa-solid fa-file-lines text-[10px]"></i>
                                        {{ $p->template_url }}
                                    </a>
                                </td>
                                <td class="py-3.5 px-4">
                                    @if($p->video_url)
                                        @php
                                            $embed = $p->video_embed;
                                            $embedSrc = $embed['src'] ?? $p->video_url;
                                            $embedType = $embed['type'] ?? 'html5';
                                            $platform = $embed['platform'] ?? 'Video';
                                        @endphp
                                        <div class="flex items-center gap-2">
                                            <button type="button"
                                                    x-on:click="openModal('{{ addslashes($p->name) }}', '{{ $embedSrc }}', '{{ $embedType }}', '{{ $platform }}')"
                                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-[#21262d] hover:bg-[#3fb950]/20 text-[#8a9e8a] hover:text-[#3fb950] border border-[#30363d] hover:border-[#3fb950]/50 transition text-xs font-bold cursor-pointer">
                                                <i class="fa-solid fa-play text-[10px] text-[#3fb950]"></i>
                                                <span>{{ $platform }}</span>
                                            </button>
                                            <a href="{{ $p->video_url }}" target="_blank" rel="noopener noreferrer"
                                               title="Open original source in new tab"
                                               class="p-1 rounded text-[#8b949e] hover:text-white transition">
                                                <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                                            </a>
                                        </div>
                                    @else
                                        <span class="text-[#8a9e8a]/50">—</span>
                                    @endif
                                </td>
                                <td class="py-3.5 px-4">
                                    <span class="text-[10px] px-2.5 py-1 rounded-full font-mono uppercase font-bold {{ $p->status === 'published' ? 'bg-[#3fb950]/20 text-[#3fb950]' : 'bg-[#30363d] text-[#8a9e8a]' }}">
                                        {{ $p->status }}
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 text-[#8a9e8a] font-mono">{{ $p->created_at->format('M j, Y') }}</td>
                                <td class="py-3.5 px-4">
                                    <div class="flex items-center justify-end gap-1.5">
                                        <a href="{{ route('dashboard.playbooks.show', $p) }}"
                                           title="View"
                                           class="p-2 rounded-lg text-[#8b949e] hover:text-[#3fb950] hover:bg-[#3fb950]/10 border border-[#30363d] hover:border-[#3fb950]/40 transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        </a>
                                        <a href="{{ route('dashboard.playbooks.edit', $p) }}"
                                           title="Edit"
                                           class="p-2 rounded-lg text-amber-400 hover:text-white hover:bg-amber-400/15 border border-amber-400/40 hover:border-amber-400/60 transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        </a>
                                        <form method="POST" action="{{ route('dashboard.playbooks.destroy', $p) }}"
                                              onsubmit="return confirm('Are you sure you want to delete this playbook?');"
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
                                    <div class="text-4xl mb-3">📘</div>
                                    <p class="text-sm font-bold text-white">No playbooks yet</p>
                                    <p class="text-xs text-[#8a9e8a] mt-1">Click "Create Playbook" to add your first GTM blueprint.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($playbooks->hasPages())
                <div class="px-4 py-4 border-t border-[#30363d]/60">
                    {{ $playbooks->links() }}
                </div>
            @endif
        </div>

        {{-- In-Page Video Modal --}}
        <div x-show="videoModalOpen"
             x-cloak
             class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6"
             role="dialog" aria-modal="true">
            {{-- Backdrop --}}
            <div x-show="videoModalOpen"
                 x-transition:enter="ease-out duration-200"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="ease-in duration-150"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 x-on:click="closeModal()"
                 class="fixed inset-0 bg-black/85 backdrop-blur-md"></div>

            {{-- Modal Dialog --}}
            <div x-show="videoModalOpen"
                 x-transition:enter="ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="ease-in duration-150"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="relative w-full max-w-4xl bg-[#161b22] border border-[#30363d] rounded-3xl overflow-hidden shadow-2xl z-10">
                
                {{-- Modal Header --}}
                <div class="flex items-center justify-between px-6 py-4 border-b border-[#30363d]/70 bg-[#0d1117]">
                    <div class="flex items-center gap-3 min-w-0">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#3fb950] animate-pulse flex-shrink-0"></span>
                        <h4 class="text-sm sm:text-base font-bold text-white truncate" x-text="modalTitle"></h4>
                        <span class="text-[10px] font-mono uppercase px-2 py-0.5 rounded-full bg-[#21262d] text-[#8a9e8a] flex-shrink-0" x-text="modalPlatform"></span>
                    </div>
                    <button type="button" x-on:click="closeModal()" class="p-2 rounded-xl text-[#8b949e] hover:text-white hover:bg-[#21262d] transition cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                {{-- Modal Body / Player --}}
                <div class="p-4 sm:p-6 bg-black">
                    <div class="aspect-video w-full rounded-2xl overflow-hidden bg-black relative border border-[#30363d]">
                        <template x-if="videoModalOpen && modalType === 'iframe'">
                            <iframe :src="modalSrc + (modalSrc.includes('?') ? '&autoplay=1' : '?autoplay=1')"
                                    class="w-full h-full border-0 absolute inset-0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; webkitallowfullscreen; mozallowfullscreen"
                                    allowfullscreen></iframe>
                        </template>
                        <template x-if="videoModalOpen && modalType === 'html5'">
                            <video controls autoplay playsinline class="w-full h-full object-cover absolute inset-0 bg-black">
                                <source :src="modalSrc">
                            </video>
                        </template>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>