<?php

namespace App\Http\Controllers;

use App\Models\Playbook;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

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

        Playbook::create($validated);

        ActivityLog::record('playbook', 'created', 'New playbook added: ' . $validated['name']);

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

        $playbook->update($validated);

        ActivityLog::record('playbook', 'updated', 'Playbook updated: ' . $validated['name']);

        return redirect()->route('dashboard.playbooks')
            ->with('status', 'Playbook updated successfully.');
    }

    /**
     * Delete a playbook.
     */
    public function destroy(Playbook $playbook)
    {
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
            'video_url' => 'nullable|url|max:255',
        ]);
    }
}