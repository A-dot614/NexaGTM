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

            <form method="POST" action="{{ route('dashboard.playbooks.update', $playbook) }}" enctype="multipart/form-data" class="space-y-5"
                  x-ref="playbookForm"
                  x-data="{
                      existingVideoUrl: @json($playbook->video_url),
                      videoSource: @json($playbook->video_url ? 'keep' : 'file'),
                      videoUrlInput: @json(str_contains($playbook->video_url ?? '', '/storage/') ? '' : ($playbook->video_url ?? '')),
                      video: null,
                      videoPreviewUrl: '',
                      videoError: '',
                      uploadError: '',
                      uploadProgress: 0,
                      uploading: false,
                      retrying419: false,
                      validationErrors: {},
                      ACCEPTED_TYPES: ['video/mp4', 'video/quicktime', 'video/x-quicktime', 'video/webm'],
                      ACCEPTED_EXTS: ['mp4', 'mov', 'webm'],
                      MAX_SIZE_MB: 100,
                      get parsedVideoEmbed() {
                          if (!this.videoUrlInput || !this.videoUrlInput.trim()) return null;
                          let url = this.videoUrlInput.trim();
                          if (!url.startsWith('http://') && !url.startsWith('https://') && !url.startsWith('/')) {
                              url = 'https://' + url;
                          }
                          const ytMatch = url.match(/(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|shorts\/|watch\?(?:.*&)?v=))([a-zA-Z0-9_-]{11})/i);
                          if (ytMatch) {
                              return { type: 'iframe', src: 'https://www.youtube-nocookie.com/embed/' + ytMatch[1] + '?rel=0', platform: 'YouTube' };
                          }
                          const loomMatch = url.match(/loom\.com\/(?:share|embed)\/([a-zA-Z0-9]+)/i);
                          if (loomMatch) {
                              return { type: 'iframe', src: 'https://www.loom.com/embed/' + loomMatch[1], platform: 'Loom' };
                          }
                          const vimeoMatch = url.match(/(?:vimeo\.com\/|player\.vimeo\.com\/video\/)(\d+)/i);
                          if (vimeoMatch) {
                              return { type: 'iframe', src: 'https://player.vimeo.com/video/' + vimeoMatch[1], platform: 'Vimeo' };
                          }
                          const gdriveMatch = url.match(/drive\.google\.com\/file\/d\/([a-zA-Z0-9_-]+)/i);
                          if (gdriveMatch) {
                              return { type: 'iframe', src: 'https://drive.google.com/file/d/' + gdriveMatch[1] + '/preview', platform: 'Google Drive' };
                          }
                          const path = url.split('?')[0].toLowerCase();
                          if (path.endsWith('.mp4') || path.endsWith('.webm') || path.endsWith('.mov') || path.endsWith('.ogg') || url.includes('/storage/')) {
                              return { type: 'html5', src: url, platform: 'Video File' };
                          }
                          return null;
                      },
                      setVideoSource(source) {
                          this.videoSource = source;
                          this.videoError = '';
                          this.uploadError = '';
                          if (source === 'file') {
                              // Ready for file selection
                          } else if (source === 'url' && !this.videoUrlInput && this.existingVideoUrl && !this.existingVideoUrl.includes('/storage/')) {
                              this.videoUrlInput = this.existingVideoUrl;
                          }
                      },
                      formatBytes(bytes) {
                          if (!bytes) return '0 B';
                          const units = ['B', 'KB', 'MB', 'GB'];
                          const i = Math.floor(Math.log(bytes) / Math.log(1024));
                          return (bytes / Math.pow(1024, i)).toFixed(i < 2 ? 0 : 1) + ' ' + units[i];
                      },
                      pickFile(e) {
                          this.setVideo(e.target.files[0]);
                      },
                      clearVideo() {
                          if (this.videoPreviewUrl) {
                              try { URL.revokeObjectURL(this.videoPreviewUrl); } catch(e) {}
                              this.videoPreviewUrl = '';
                          }
                          this.video = null;
                          this.videoError = '';
                          if (this.$refs.videoInput) this.$refs.videoInput.value = '';
                      },
                      setVideo(file) {
                          this.videoError = '';
                          if (this.videoPreviewUrl) {
                              try { URL.revokeObjectURL(this.videoPreviewUrl); } catch(e) {}
                              this.videoPreviewUrl = '';
                          }
                          if (!file) { this.video = null; return; }

                          const ext = (file.name.split('.').pop() || '').toLowerCase();
                          if (!this.ACCEPTED_TYPES.includes(file.type) && !this.ACCEPTED_EXTS.includes(ext)) {
                              this.rejectVideo('Please choose a valid video file (MP4, MOV, or WebM).');
                              return;
                          }
                          if (file.size > this.MAX_SIZE_MB * 1024 * 1024) {
                              this.rejectVideo('Video is too large. Maximum size is ' + this.MAX_SIZE_MB + 'MB.');
                              return;
                          }
                          this.video = file;
                          try {
                              this.videoPreviewUrl = URL.createObjectURL(file);
                          } catch(e) {}
                      },
                      rejectVideo(message) {
                          if (this.videoPreviewUrl) {
                              try { URL.revokeObjectURL(this.videoPreviewUrl); } catch(e) {}
                              this.videoPreviewUrl = '';
                          }
                          this.video = null;
                          this.videoError = message;
                          if (this.$refs.videoInput) this.$refs.videoInput.value = '';
                      },
                      onDrop(e) {
                          const file = e.dataTransfer && e.dataTransfer.files ? e.dataTransfer.files[0] : null;
                          if (file && this.$refs.videoInput) {
                              this.$refs.videoInput.files = e.dataTransfer.files;
                          }
                          this.setVideo(file);
                      },
                      submit() {
                          if (this.uploading) return;
                          if (this.videoError) return;

                          this.validationErrors = {};
                          this.uploadError = '';

                          const form = this.$refs.playbookForm;
                          const data = new FormData(form);

                          if (this.videoSource === 'url') {
                              data.delete('video');
                          } else if (this.videoSource === 'file') {
                              data.delete('video_url');
                          } else if (this.videoSource === 'keep') {
                              data.delete('video');
                          }

                          this.uploading = true;
                          this.uploadProgress = (this.videoSource === 'file' && this.video) ? 0 : 100;

                          const xhr = new XMLHttpRequest();
                          xhr.open('POST', form.action);
                          xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                          xhr.setRequestHeader('Accept', 'application/json');
                          xhr.upload.onprogress = (e) => {
                              if (e.lengthComputable) this.uploadProgress = Math.round((e.loaded / e.total) * 100);
                          };
                          xhr.onload = async () => {
                              this.uploading = false;
                              if (xhr.status >= 200 && xhr.status < 300) {
                                  try {
                                      const res = JSON.parse(xhr.responseText);
                                      if (res.redirect) {
                                          window.location.href = res.redirect;
                                          return;
                                      }
                                  } catch (err) {}
                                  window.location.href = '{{ route("dashboard.playbooks") }}';
                                  return;
                              }

                              if (xhr.status === 422) {
                                  try {
                                      const res = JSON.parse(xhr.responseText);
                                      this.validationErrors = res.errors || {};
                                      const firstKey = Object.keys(this.validationErrors)[0];
                                      if (firstKey && this.validationErrors[firstKey][0]) {
                                          this.uploadError = this.validationErrors[firstKey][0];
                                      }
                                      if (this.validationErrors.video && this.validationErrors.video[0]) {
                                          this.videoError = this.validationErrors.video[0];
                                      }
                                      if (this.validationErrors.video_url && this.validationErrors.video_url[0]) {
                                          this.videoError = this.validationErrors.video_url[0];
                                      }
                                  } catch (err) {
                                      this.uploadError = 'Validation failed. Please check the form fields.';
                                  }
                              } else if (xhr.status === 419) {
                                  if (!this.retrying419) {
                                      this.retrying419 = true;
                                      try {
                                          const resp = await fetch(window.location.href, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
                                          const html = await resp.text();
                                          const doc = new DOMParser().parseFromString(html, 'text/html');
                                          const tokenEl = doc.querySelector('input[name=_token]');
                                          if (tokenEl && tokenEl.value) {
                                              this.$refs.playbookForm.querySelector('input[name=_token]').value = tokenEl.value;
                                              this.submit();
                                              return;
                                          }
                                      } catch (err) {}
                                      this.retrying419 = false;
                                      this.uploadError = 'Your session expired. Please refresh the page and try again.';
                                  } else {
                                      this.retrying419 = false;
                                      this.uploadError = 'Your session expired. Please refresh the page and try again.';
                                  }
                              } else {
                                  this.uploadError = 'Failed to update playbook (Status ' + xhr.status + '). Please try again.';
                              }
                          };
                          xhr.onerror = () => {
                              this.uploading = false;
                              this.uploadError = 'Network error. Please check your connection and try again.';
                          };
                          xhr.send(data);
                      }
                  }"
                  x-on:submit.prevent="submit">
                @csrf
                @method('PATCH')

                <div x-show="uploadError" x-cloak
                     class="rounded-2xl border border-red-500/40 bg-red-500/10 px-5 py-3.5 text-sm font-bold text-red-400 flex items-center gap-3">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    <span x-text="uploadError"></span>
                </div>

                <div>
                    <label for="name" class="block text-xs font-bold uppercase tracking-wider text-[#8a9e8a] mb-1.5">Playbook Name *</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $playbook->name) }}" required
                           class="w-full rounded-xl bg-[#0d1117] border border-[#30363d] px-4 py-2.5 text-sm text-white placeholder-[#8b949e] focus:border-[#3fb950] focus:ring-2 focus:ring-[#3fb950]/30 outline-none transition">
                    <template x-if="validationErrors.name">
                        <p class="mt-1.5 text-[11px] font-bold text-red-400" x-text="validationErrors.name[0]"></p>
                    </template>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="description" class="block text-xs font-bold uppercase tracking-wider text-[#8a9e8a]">Playbook Description</label>
                        <span class="text-[11px] text-[#778da9]">Few lines or long detailed explanation</span>
                    </div>
                    <textarea name="description" id="description" rows="4"
                              placeholder="Write a brief overview or detailed multi-line explanation of the playbook strategy, targeting parameters, tools used, and outbound workflow..."
                              class="w-full rounded-xl bg-[#0d1117] border border-[#30363d] px-4 py-3 text-sm text-white placeholder-[#8b949e] focus:border-[#3fb950] focus:ring-2 focus:ring-[#3fb950]/30 outline-none transition resize-y leading-relaxed">{{ old('description', $playbook->description) }}</textarea>
                    <p class="text-[11px] text-[#778da9] mt-1.5">Enter a few sentences or a full walkthrough describing this playbook.</p>
                    <template x-if="validationErrors.description">
                        <p class="mt-1.5 text-[11px] font-bold text-red-400" x-text="validationErrors.description[0]"></p>
                    </template>
                </div>

                <div>
                    <label for="template_url" class="block text-xs font-bold uppercase tracking-wider text-[#8a9e8a] mb-1.5">Playbook Template URL *</label>
                    <input type="text" inputmode="url" name="template_url" id="template_url" value="{{ old('template_url', $playbook->template_url) }}" required
                           class="w-full rounded-xl bg-[#0d1117] border border-[#30363d] px-4 py-2.5 text-sm text-white placeholder-[#8b949e] focus:border-[#3fb950] focus:ring-2 focus:ring-[#3fb950]/30 outline-none transition">
                    <p class="text-[11px] text-[#778da9] mt-1.5">Link to the playbook template (e.g. Google Docs, Notion, Clay table, or shareable document).</p>
                    <template x-if="validationErrors.template_url">
                        <p class="mt-1.5 text-[11px] font-bold text-red-400" x-text="validationErrors.template_url[0]"></p>
                    </template>
                </div>

                <div class="space-y-4">
                    <div class="flex flex-wrap items-center justify-between gap-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#8a9e8a]">Playbook Explaining Video</label>
                        <span class="text-[11px] text-[#778da9]">Enter from folder or URL</span>
                    </div>

                    <!-- Video Source Switcher Tabs -->
                    <div class="flex flex-wrap items-center gap-1.5 p-1 rounded-xl bg-[#0d1117] border border-[#30363d] w-fit">
                        <template x-if="existingVideoUrl">
                            <button type="button"
                                    x-on:click="setVideoSource('keep')"
                                    :class="videoSource === 'keep' ? 'bg-[#3fb950] text-[#0d1117] font-black shadow-sm' : 'text-[#8b949e] hover:text-white font-bold'"
                                    class="px-3.5 py-1.5 rounded-lg text-xs transition flex items-center gap-1.5 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span>Keep Current Video</span>
                            </button>
                        </template>

                        <button type="button"
                                x-on:click="setVideoSource('file')"
                                :class="videoSource === 'file' ? 'bg-[#3fb950] text-[#0d1117] font-black shadow-sm' : 'text-[#8b949e] hover:text-white font-bold'"
                                class="px-3.5 py-1.5 rounded-lg text-xs transition flex items-center gap-1.5 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/></svg>
                            <span x-text="existingVideoUrl ? 'Upload New from Folder' : 'Upload from Folder'"></span>
                        </button>

                        <button type="button"
                                x-on:click="setVideoSource('url')"
                                :class="videoSource === 'url' ? 'bg-[#3fb950] text-[#0d1117] font-black shadow-sm' : 'text-[#8b949e] hover:text-white font-bold'"
                                class="px-3.5 py-1.5 rounded-lg text-xs transition flex items-center gap-1.5 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                            <span x-text="existingVideoUrl ? 'Edit / Enter Video URL' : 'Enter Video URL'"></span>
                        </button>

                        <template x-if="existingVideoUrl">
                            <button type="button"
                                    x-on:click="setVideoSource('none')"
                                    :class="videoSource === 'none' ? 'bg-red-500 text-white font-black shadow-sm' : 'text-[#8b949e] hover:text-red-400 font-bold'"
                                    class="px-3.5 py-1.5 rounded-lg text-xs transition flex items-center gap-1.5 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                <span>Remove Video</span>
                            </button>
                        </template>
                    </div>

                    <input type="hidden" name="video_source_type" :value="videoSource">
                    <input type="hidden" name="remove_video" :value="videoSource === 'none' ? '1' : '0'">

                    <!-- Option 1: Keep Current Active Video -->
                    <div x-show="videoSource === 'keep' && existingVideoUrl" class="rounded-2xl border border-[#30363d] bg-[#0d1117] p-5 space-y-4">
                        <div class="flex items-center justify-between gap-3">
                            <div class="flex items-center gap-2.5 min-w-0">
                                <div class="w-8 h-8 rounded-lg bg-[#3fb950]/15 text-[#3fb950] flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <div class="min-w-0">
                                    <div class="flex items-center gap-2">
                                        <p class="text-xs font-bold text-white">Current Active Video</p>
                                        <span class="text-[9px] font-mono uppercase tracking-wider px-2 py-0.5 rounded-full bg-[#21262d] text-[#8a9e8a]"
                                              x-text="existingVideoUrl.includes('/storage/') ? 'Uploaded File' : 'Web URL'"></span>
                                    </div>
                                    <a :href="existingVideoUrl" target="_blank" rel="noopener noreferrer"
                                       class="text-[11px] text-[#3fb950] hover:underline truncate block max-w-md mt-0.5 font-medium"
                                       x-text="existingVideoUrl"></a>
                                </div>
                            </div>
                            <a :href="existingVideoUrl" target="_blank" rel="noopener noreferrer"
                               class="shrink-0 px-3 py-1.5 rounded-lg border border-[#30363d] text-xs font-bold text-white hover:bg-[#21262d] transition flex items-center gap-1.5">
                                <span>Source</span>
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            </a>
                        </div>

                        <!-- Current Embedded Player -->
                        <div class="rounded-2xl overflow-hidden border border-[#30363d] shadow-lg">
                            <x-playbook-video-player :playbook="$playbook" />
                        </div>

                        <p class="text-[11px] text-[#778da9]">This video remains attached unless you choose to replace it with a file from folder, enter a URL, or remove it.</p>
                    </div>

                    <!-- Option 2: Upload new file from Folder -->
                    <div x-show="videoSource === 'file'" class="space-y-2">
                        <div x-on:click.prevent="$refs.videoInput.click()"
                             x-on:dragover.prevent
                             x-on:drop.prevent="onDrop"
                             class="flex flex-col items-center justify-center gap-3 rounded-xl border-2 border-dashed border-[#30363d] bg-[#0d1117] px-6 py-10 text-center cursor-pointer transition select-none hover:border-[#3fb950]/50"
                             :class="{ 'border-[#3fb950]/60 bg-[#3fb950]/5': video, 'border-red-500/60': videoError }">
                            <span class="w-12 h-12 rounded-xl flex items-center justify-center text-[#3fb950]" :class="video ? 'bg-[#3fb950]/15' : 'bg-[#3fb950]/10'">
                                <template x-if="!video">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                </template>
                                <template x-if="video">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </template>
                            </span>

                            <div class="space-y-1">
                                <template x-if="!video">
                                    <p class="text-sm font-bold text-white">Click to choose a video from your folder <span class="text-[#8b949e]">or drag &amp; drop</span></p>
                                </template>
                                <template x-if="video">
                                    <p class="text-sm font-black text-white break-all px-2" x-text="video.name"></p>
                                </template>
                                <template x-if="video">
                                    <p class="text-xs text-[#8a9e8a]" x-text="formatBytes(video.size)"></p>
                                </template>
                                <p class="text-[11px] text-[#778da9]">MP4, MOV, or WebM · up to 100MB</p>
                            </div>
                        </div>

                        <input type="file" name="video" id="video" x-ref="videoInput" accept=".mp4,video/mp4,.mov,video/quicktime,.webm,video/webm" class="hidden" x-on:change="pickFile">

                        <template x-if="video && !uploading">
                            <button type="button" x-on:click.prevent="clearVideo" class="mt-2 inline-flex items-center gap-1.5 text-[11px] font-bold text-[#8b949e] hover:text-red-400 transition cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                <span>Remove selected video</span>
                            </button>
                        </template>

                        <!-- Video File Live Preview Player -->
                        <div x-show="video && videoPreviewUrl" class="mt-3 space-y-1.5">
                            <div class="flex items-center justify-between text-xs font-bold text-[#3fb950]">
                                <span class="flex items-center gap-1.5">
                                    <i class="fa-solid fa-play text-[10px]"></i>
                                    <span>New Video Live Preview</span>
                                </span>
                                <span class="text-[11px] text-[#8a9e8a]" x-text="video ? video.name : ''"></span>
                            </div>
                            <div class="aspect-video w-full rounded-2xl overflow-hidden bg-black border border-[#30363d] shadow-lg">
                                <video :src="videoPreviewUrl" controls playsinline preload="metadata" class="w-full h-full object-cover bg-black"></video>
                            </div>
                        </div>

                        <template x-if="validationErrors.video">
                            <p class="mt-1.5 text-[11px] font-bold text-red-400" x-text="validationErrors.video[0]"></p>
                        </template>
                    </div>

                    <!-- Option 3: Enter Video URL -->
                    <div x-show="videoSource === 'url'" class="space-y-2">
                        <input type="text" inputmode="url" name="video_url" id="video_url"
                               x-model="videoUrlInput"
                               placeholder="https://www.youtube.com/watch?v=... or https://loom.com/share/..."
                               class="w-full rounded-xl bg-[#0d1117] border border-[#30363d] px-4 py-2.5 text-sm text-white placeholder-[#8b949e] focus:border-[#3fb950] focus:ring-2 focus:ring-[#3fb950]/30 outline-none transition">
                        <p class="text-[11px] text-[#778da9]">Paste an explainer link from Loom, YouTube, Vimeo, Google Drive, or any direct MP4/video link.</p>

                        <!-- Video URL Live Preview Player -->
                        <div x-show="parsedVideoEmbed" class="mt-3 space-y-1.5">
                            <div class="flex items-center justify-between text-xs font-bold text-[#3fb950]">
                                <span class="flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-[#3fb950] animate-pulse"></span>
                                    <span x-text="parsedVideoEmbed ? (parsedVideoEmbed.platform + ' Live Preview') : 'Video Preview'"></span>
                                </span>
                            </div>
                            <div class="aspect-video w-full rounded-2xl overflow-hidden bg-black border border-[#30363d] shadow-lg">
                                <template x-if="parsedVideoEmbed && parsedVideoEmbed.type === 'iframe'">
                                    <iframe :src="parsedVideoEmbed.src"
                                            class="w-full h-full border-0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; webkitallowfullscreen; mozallowfullscreen"
                                            allowfullscreen></iframe>
                                </template>
                                <template x-if="parsedVideoEmbed && parsedVideoEmbed.type === 'html5'">
                                    <video :src="parsedVideoEmbed.src" controls playsinline class="w-full h-full object-cover bg-black"></video>
                                </template>
                            </div>
                        </div>

                        <template x-if="validationErrors.video_url">
                            <p class="mt-1.5 text-[11px] font-bold text-red-400" x-text="validationErrors.video_url[0]"></p>
                        </template>
                    </div>

                    <!-- Option 4: Removed Video Notice -->
                    <div x-show="videoSource === 'none'" class="rounded-2xl border border-red-500/30 bg-red-500/10 p-4 flex items-center justify-between gap-3">
                        <div class="flex items-center gap-2 text-red-400 text-xs font-bold">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            <span>The video will be detached and deleted from this playbook upon saving.</span>
                        </div>
                        <button type="button" x-on:click="setVideoSource('keep')" class="px-3 py-1.5 rounded-lg border border-red-500/40 text-xs font-bold text-white hover:bg-red-500/20 transition cursor-pointer shrink-0">
                            Undo
                        </button>
                    </div>

                    <p x-show="videoError" class="mt-2 text-[11px] font-bold text-red-400" x-text="videoError"></p>

                    <p class="text-[11px] text-[#778da9]">Walkthrough video explaining how to execute the playbook.</p>

                    <!-- Upload Progress Bar -->
                    <div x-show="uploading && videoSource === 'file' && video" class="mt-4 rounded-xl border border-[#30363d] bg-[#0d1117] p-4">
                        <div class="flex items-center justify-between gap-3 mb-2">
                            <p class="text-xs font-bold text-white" x-text="'Uploading new video — ' + (video ? video.name : '') + '…'"></p>
                            <p class="text-xs font-black text-[#3fb950]" x-text="uploadProgress + '%'"></p>
                        </div>
                        <div class="h-2 rounded-full bg-[#21262d] overflow-hidden">
                            <div class="h-full rounded-full bg-[#3fb950] transition-all duration-200" :style="'width:' + uploadProgress + '%'"></div>
                        </div>
                    </div>

                    <p x-show="uploadError" class="mt-2 flex items-center gap-1.5 text-[11px] font-bold text-red-400" x-text="uploadError"></p>
                </div>

                <div class="flex flex-wrap items-center gap-3 pt-2">
                    <button type="submit" :disabled="uploading"
                            class="flex-1 skeuo-button py-3.5 px-4 text-white font-black text-xs uppercase tracking-wider rounded-xl flex items-center justify-center gap-2 disabled:opacity-60 disabled:cursor-not-allowed">
                        <i class="fa-solid" :class="uploading ? 'fa-spinner fa-spin' : 'fa-floppy-disk'"></i>
                        <span x-text="uploading ? 'Uploading…' : 'Save Changes'">Save Changes</span>
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