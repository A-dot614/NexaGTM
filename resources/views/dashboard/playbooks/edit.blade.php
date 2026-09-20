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
                      video: null,
                      videoError: '',
                      uploadError: '',
                      uploadProgress: 0,
                      uploading: false,
                      validationErrors: {},
                      ACCEPTED_TYPES: ['video/mp4', 'video/quicktime', 'video/x-quicktime', 'video/webm'],
                      ACCEPTED_EXTS: ['mp4', 'mov', 'webm'],
                      MAX_SIZE_MB: 100,
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
                          this.video = null;
                          this.videoError = '';
                          if (this.$refs.videoInput) this.$refs.videoInput.value = '';
                      },
                      setVideo(file) {
                          this.videoError = '';
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
                      },
                      rejectVideo(message) {
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

                          const data = new FormData(this.$refs.playbookForm);
                          this.uploading = true;
                          this.uploadProgress = this.video ? 0 : 100;

                          const xhr = new XMLHttpRequest();
                          xhr.open('POST', this.$refs.playbookForm.action);
                          xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                          xhr.setRequestHeader('Accept', 'application/json');
                          xhr.upload.onprogress = (e) => {
                              if (e.lengthComputable) this.uploadProgress = Math.round((e.loaded / e.total) * 100);
                          };
                          xhr.onload = () => {
                              if (xhr.status >= 200 && xhr.status < 300) {
                                  try {
                                      const res = JSON.parse(xhr.responseText);
                                      window.location.href = res.redirect || this.$refs.playbookForm.action;
                                  } catch (err) {
                                      window.location.href = this.$refs.playbookForm.action;
                                  }
                                  return;
                              }
                              this.uploading = false;
                              if (xhr.status === 422) {
                                  try {
                                      const res = JSON.parse(xhr.responseText);
                                      this.validationErrors = res.errors || {};
                                      if (this.validationErrors.video && this.validationErrors.video[0]) {
                                          this.videoError = this.validationErrors.video[0];
                                      }
                                  } catch (err) {
                                      this.uploadError = 'Something went wrong. Please try again.';
                                  }
                              } else if (xhr.status === 419) {
                                  this.uploadError = 'Your session expired. Please refresh the page and try again.';
                              } else {
                                  this.uploadError = 'Upload failed. Please try again.';
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

                <div>
                    <label for="name" class="block text-xs font-bold uppercase tracking-wider text-[#8a9e8a] mb-1.5">Playbook Name *</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $playbook->name) }}" required
                           class="w-full rounded-xl bg-[#0d1117] border border-[#30363d] px-4 py-2.5 text-sm text-white placeholder-[#8b949e] focus:border-[#3fb950] focus:ring-2 focus:ring-[#3fb950]/30 outline-none transition">
                    <template x-if="validationErrors.name">
                        <p class="mt-1.5 text-[11px] font-bold text-red-400" x-text="validationErrors.name[0]"></p>
                    </template>
                </div>

                <div>
                    <label for="template_url" class="block text-xs font-bold uppercase tracking-wider text-[#8a9e8a] mb-1.5">Playbook Template URL *</label>
                    <input type="url" name="template_url" id="template_url" value="{{ old('template_url', $playbook->template_url) }}" required
                           class="w-full rounded-xl bg-[#0d1117] border border-[#30363d] px-4 py-2.5 text-sm text-white placeholder-[#8b949e] focus:border-[#3fb950] focus:ring-2 focus:ring-[#3fb950]/30 outline-none transition">
                    <p class="text-[11px] text-[#778da9] mt-1.5">Link to the playbook template (e.g. Google Docs, Notion, or a shareable file).</p>
                    <template x-if="validationErrors.template_url">
                        <p class="mt-1.5 text-[11px] font-bold text-red-400" x-text="validationErrors.template_url[0]"></p>
                    </template>
                </div>

                <div>
                    <span class="block text-xs font-bold uppercase tracking-wider text-[#8a9e8a] mb-1.5">Playbook Explaining Video</span>

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
                                <p class="text-sm font-bold text-white">Click to choose a video <span class="text-[#8b949e]">or drag &amp; drop</span></p>
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

                    <template x-if="existingVideoUrl && !video">
                        <div class="mt-3 flex items-center justify-between gap-3 rounded-xl border border-[#30363d] bg-[#0d1117] px-4 py-3">
                            <a :href="existingVideoUrl" target="_blank" rel="noopener noreferrer" class="text-[11px] font-bold text-[#3fb950] hover:underline break-all" x-text="existingVideoUrl"></a>
                            <span class="text-[10px] uppercase tracking-wider text-[#8a9e8a] shrink-0">Current video</span>
                        </div>
                    </template>

                    <template x-if="video && !uploading">
                        <button type="button" x-on:click.prevent="clearVideo" class="mt-3 inline-flex items-center gap-1.5 text-[11px] font-bold text-[#8b949e] hover:text-red-400 transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            Remove video
                        </button>
                    </template>

                    <p x-show="videoError" class="mt-2 text-[11px] font-bold text-red-400" x-text="videoError"></p>

                    <p class="text-[11px] text-[#778da9] mt-1.5">Optional walkthrough video (local MP4, MOV, or WebM) explaining how to execute the playbook.</p>

                    <div x-show="uploading" class="mt-4 rounded-xl border border-[#30363d] bg-[#0d1117] p-4">
                        <div class="flex items-center justify-between gap-3 mb-2">
                            <p class="text-xs font-bold text-white" x-text="video ? 'Uploading video — ' + video.name + '…' : 'Submitting…'"></p>
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