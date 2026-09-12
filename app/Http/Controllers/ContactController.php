<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Show the contact inbox — submissions from the public contact form.
     */
    public function index()
    {
        $contacts = Contact::latest()->paginate(12);

        return view('dashboard.contacts', compact('contacts'));
    }

    /**
     * Show a single contact submission's full details.
     */
    public function show(Contact $contact)
    {
        return view('dashboard.contacts.show', compact('contact'));
    }

    /**
     * Update the status of a contact submission (e.g. new → contacted).
     */
    public function update(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:new,contacted,closed',
        ]);

        $contact->update($validated);

        ActivityLog::record('contact', 'status_changed', 'Contact message from ' . $contact->name . ' marked as ' . $validated['status']);

        return redirect()->route('dashboard.contacts.show', $contact)
            ->with('status', 'Contact status updated.');
    }

    /**
     * Delete a contact submission.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        ActivityLog::record('contact', 'deleted', 'Contact message from ' . $contact->name . ' deleted');

        return redirect()->route('dashboard.contacts')
            ->with('status', 'Contact submission deleted.');
    }
}