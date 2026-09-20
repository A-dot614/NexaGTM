<?php

namespace App\Http\Controllers;

use App\Models\Playbook;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlaybookController extends Controller
{
    /**
     * Show the playbook manager — table of existing playbooks.
     */
    public function index()
    {
        $playbooks = Playbook::latest()->paginate(12);

        return view('dashboard.playbooks', compact('playbooks'));
    }

    /**
     * Show the form to create a new playbook.
     */
    public function create()
    {
        return view('dashboard.playbooks.create');
    }

    /**
     * Store a new playbook submitted from the dashboard.
     */
    public function store(Request $request)
    {
        $validated = $this->validatePayload($request);

        $videoSourceType = $request->input('video_source_type', 'file');
        $videoUrl = null;

        if ($videoSourceType === 'file' && $request->hasFile('video')) {
            $videoUrl = $this->storeVideo($request);
        } elseif ($videoSourceType === 'url' && !empty($validated['video_url'])) {
            $videoUrl = $validated['video_url'];
        } elseif ($request->hasFile('video')) {
            $videoUrl = $this->storeVideo($request);
        } elseif (!empty($validated['video_url'])) {
            $videoUrl = $validated['video_url'];
        }

        $validated['video_url'] = $videoUrl;
        $validated['status'] = $validated['status'] ?? 'published';

        unset($validated['video'], $validated['video_source_type'], $validated['remove_video']);

        $playbook = Playbook::create($validated);

        ActivityLog::record('playbook', 'created', 'New playbook added: ' . $validated['name']);

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Playbook added successfully.',
                'redirect' => route('dashboard.playbooks'),
                'playbook' => $playbook,
            ]);
        }

        return redirect()->route('dashboard.playbooks')
            ->with('status', 'Playbook added successfully.');
    }

    /**
     * Show a single playbook's full details.
     */
    public function show(Playbook $playbook)
    {
        return view('dashboard.playbooks.show', compact('playbook'));
    }

    /**
     * Show the edit form for a single playbook.
     */
    public function edit(Playbook $playbook)
    {
        return view('dashboard.playbooks.edit', compact('playbook'));
    }

    /**
     * Update an existing playbook.
     */
    public function update(Request $request, Playbook $playbook)
    {
        $validated = $this->validatePayload($request);

        $videoSourceType = $request->input('video_source_type');
        $removeVideo = $request->boolean('remove_video');

        if ($removeVideo || $videoSourceType === 'none') {
            $this->deleteVideo($playbook->video_url);
            $validated['video_url'] = null;
        } elseif ($videoSourceType === 'file') {
            if ($request->hasFile('video')) {
                $newVideoUrl = $this->storeVideo($request);
                if ($newVideoUrl) {
                    $this->deleteVideo($playbook->video_url);
                    $validated['video_url'] = $newVideoUrl;
                }
            } else {
                $validated['video_url'] = $playbook->video_url;
            }
        } elseif ($videoSourceType === 'url') {
            $inputUrl = $validated['video_url'] ?? null;
            if (!empty($inputUrl)) {
                if ($playbook->video_url !== $inputUrl) {
                    $this->deleteVideo($playbook->video_url);
                }
                $validated['video_url'] = $inputUrl;
            } else {
                $this->deleteVideo($playbook->video_url);
                $validated['video_url'] = null;
            }
        } elseif ($videoSourceType === 'keep') {
            $validated['video_url'] = $playbook->video_url;
        } else {
            // Backward-compatible fallbacks
            if ($request->hasFile('video')) {
                $newVideoUrl = $this->storeVideo($request);
                if ($newVideoUrl) {
                    $this->deleteVideo($playbook->video_url);
                    $validated['video_url'] = $newVideoUrl;
                }
            } elseif ($request->filled('video_url')) {
                if ($playbook->video_url !== $validated['video_url']) {
                    $this->deleteVideo($playbook->video_url);
                }
                $validated['video_url'] = $validated['video_url'];
            } else {
                $validated['video_url'] = $playbook->video_url;
            }
        }

        unset($validated['video'], $validated['video_source_type'], $validated['remove_video']);

        $playbook->update($validated);

        ActivityLog::record('playbook', 'updated', 'Playbook updated: ' . $validated['name']);

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Playbook updated successfully.',
                'redirect' => route('dashboard.playbooks'),
            ]);
        }

        return redirect()->route('dashboard.playbooks')
            ->with('status', 'Playbook updated successfully.');
    }

    /**
     * Delete a playbook.
     */
    public function destroy(Playbook $playbook)
    {
        $this->deleteVideo($playbook->video_url);

        $name = $playbook->name;
        $playbook->delete();

        ActivityLog::record('playbook', 'deleted', 'Playbook deleted: ' . $name);

        return redirect()->route('dashboard.playbooks')
            ->with('status', 'Playbook deleted successfully.');
    }

    /**
     * Shared validation rules for store & update.
     */
    private function validatePayload(Request $request): array
    {
        if ($request->has('template_url') && is_string($request->input('template_url'))) {
            $request->merge(['template_url' => $this->normalizeUrl($request->input('template_url'))]);
        }

        if ($request->has('video_url') && is_string($request->input('video_url'))) {
            $request->merge(['video_url' => $this->normalizeUrl($request->input('video_url'))]);
        }

        return $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'template_url' => 'required|url|max:2048',
            'video_source_type' => 'nullable|string|in:file,url,none,keep',
            'video' => 'nullable|file|mimes:mp4,mov,webm|max:102400',
            'video_url' => 'nullable|url|max:2048',
            'remove_video' => 'nullable|boolean',
        ]);
    }

    private function normalizeUrl(?string $url): ?string
    {
        if (!$url) {
            return null;
        }

        $url = trim($url);

        if ($url === '') {
            return null;
        }

        if (!preg_match('~^(?:f|ht)tps?://~i', $url)) {
            $url = 'https://' . $url;
        }

        return $url;
    }

    /**
     * Upload an optional video file and return its public URL.
     */
    private function storeVideo(Request $request): ?string
    {
        $file = $request->file('video');

        if (!$file) {
            return null;
        }

        $path = $file->store('playbooks/videos', 'public');

        return Storage::disk('public')->url($path);
    }

    /**
     * Delete an uploaded video file from the public disk when its URL
     * points back at local storage.
     */
    private function deleteVideo(?string $url): void
    {
        $path = $this->videoPathFromUrl($url);

        if ($path) {
            Storage::disk('public')->delete($path);
        }
    }

    private function videoPathFromUrl(?string $url): ?string
    {
        if (!$url) {
            return null;
        }

        $base = rtrim(Storage::disk('public')->url(''), '/');

        if (str_starts_with($url, $base . '/')) {
            return substr($url, strlen($base) + 1);
        }

        return null;
    }
}