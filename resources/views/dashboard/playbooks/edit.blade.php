<x-app-layout>
    {{-- 
        NexaGTM Edit Playbook
        ─────────────────────────────
        Full-page form to edit an existing playbook.
    --}}

    <x-slot name="title">Edit Playbook</x-slot>

    <div class="max-w-3xl mx-auto space-y-6">

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
            <a href="{{ route('dashboard.playbooks') }}"
               class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-[#30363d] text-xs font-bold text-[#8b949e] hover:text-white hover:bg-[#21262d] transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                <span>Back to Playbooks</span>
            </a>
            <p class="text-xs text-[#8a9e8a] font-mono">Edit playbook details</p>
        </div>

        <div class="neomorph-card rounded-3xl p-6 sm:p-10 relative">
            <span class="style-tag style-tag-neomorph">Edit Playbook</span>

            <h3 class="text-lg font-black text-white flex items-center gap-2 mb-1">
                <span class="text-[#3fb950]">✏️</span> Edit: {{ $playbook->name }}
            </h3>
            <p class="text-xs text-[#8a9e8a] mb-8">Update the playbook's links and details.</p>

            <form method="POST" action="{{ route('dashboard.playbooks.update', $playbook) }}" class="space-y-5">
                @csrf
                @method('PATCH')

                <div>
                    <label for="name" class="block text-xs font-bold uppercase tracking-wider text-[#8a9e8a] mb-1.5">Playbook Name *</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $playbook->name) }}" required
                           class="w-full rounded-xl bg-[#0d1117] border border-[#30363d] px-4 py-2.5 text-sm text-white placeholder-[#8b949e] focus:border-[#3fb950] focus:ring-2 focus:ring-[#3fb950]/30 outline-none transition">
                </div>

                <div>
                    <label for="template_url" class="block text-xs font-bold uppercase tracking-wider text-[#8a9e8a] mb-1.5">Playbook Template URL *</label>
                    <input type="url" name="template_url" id="template_url" value="{{ old('template_url', $playbook->template_url) }}" required
                           class="w-full rounded-xl bg-[#0d1117] border border-[#30363d] px-4 py-2.5 text-sm text-white placeholder-[#8b949e] focus:border-[#3fb950] focus:ring-2 focus:ring-[#3fb950]/30 outline-none transition">
                    <p class="text-[11px] text-[#778da9] mt-1.5">Link to the playbook template (e.g. Google Docs, Notion, or a shareable file).</p>
                </div>

                <div>
                    <label for="video_url" class="block text-xs font-bold uppercase tracking-wider text-[#8a9e8a] mb-1.5">Playbook Explaining Video URL</label>
                    <input type="url" name="video_url" id="video_url" value="{{ old('video_url', $playbook->video_url) }}" placeholder="https://www.youtube.com/watch?v=..."
                           class="w-full rounded-xl bg-[#0d1117] border border-[#30363d] px-4 py-2.5 text-sm text-white placeholder-[#8b949e] focus:border-[#3fb950] focus:ring-2 focus:ring-[#3fb950]/30 outline-none transition">
                    <p class="text-[11px] text-[#778da9] mt-1.5">Optional walkthrough video (YouTube / Vimeo / Loom) explaining how to execute the playbook.</p>
                </div>

                <div class="flex flex-wrap items-center gap-3 pt-2">
                    <button type="submit"
                            class="flex-1 skeuo-button py-3.5 px-4 text-white font-black text-xs uppercase tracking-wider rounded-xl flex items-center justify-center gap-2">
                        <i class="fa-solid fa-floppy-disk"></i>
                        <span>Save Changes</span>
                    </button>
                    <a href="{{ route('dashboard.playbooks') }}"
                       class="px-5 py-3.5 rounded-xl border border-[#30363d] text-xs font-bold text-[#8b949e] hover:text-white hover:bg-[#21262d] transition text-center">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>