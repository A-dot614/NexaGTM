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

        if ($videoUrl = $this->storeVideo($request)) {
            $validated['video_url'] = $videoUrl;
        }

        unset($validated['video']);

        Playbook::create($validated);

        ActivityLog::record('playbook', 'created', 'New playbook added: ' . $validated['name']);

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Playbook added successfully.',
                'redirect' => route('dashboard.playbooks'),
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

        if ($videoUrl = $this->storeVideo($request)) {
            $this->deleteVideo($playbook->video_url);
            $validated['video_url'] = $videoUrl;
        }

        unset($validated['video']);

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
        return $request->validate([
            'name' => 'required|string|max:255',
            'template_url' => 'required|url|max:255',
            'video' => 'nullable|file|mimes:mp4,mov,webm|max:102400',
        ]);
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