<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNexagtmRequest;
use App\Http\Requests\UpdateNexagtmRequest;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactAdminMail;
use App\Mail\ContactUserMail;
use App\Mail\CallBookedAdminMail;
use App\Mail\CallBookedUserMail;
use App\Models\CallBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Nexagtm;

/**
 * NexagtmController
 * ─────────────────
 * Main controller for NexaGTM public-facing site pages and contact form.
 * 
 * Routes handled:
 *   GET  /              → index()         Home page
 *   GET  /price         → price()         Pricing page
 *   GET  /contact       → contact()       Contact form page
 *   POST /contact       → sendContact()   Process contact form, send emails
 *   GET  /about         → about()         About page
 *   GET  /gtm-playbooks → gtmPlaybooks()  GTM Playbooks library page
 * 
 * CRUD methods (create/store/show/edit/update/destroy) are Laravel resource 
 * scaffolding stubs — not yet implemented. Future use for user GTM records.
 */
class NexagtmController extends Controller
{
    /**
     * Home page — renders the main marketing landing page.
     * View: resources/views/site/index.blade.php
     */
    public function index()
    {
        $testimonials = \App\Models\Testimonial::whereIn('status', ['active', 'featured'])
            ->latest()
            ->get();

        return view('site.index', compact('testimonials'));
    }

    /**
     * Pricing page — shows plan tiers (Starter, Growth, Enterprise).
     * View: resources/views/site/price.blade.php
     */
    public function price()
    {
        return view('site.price');
    }

    /**
     * Contact page — renders the contact form.
     * View: resources/views/site/contact.blade.php
     */
    public function contact()
    {
        return view('site.contact');
    }

    /**
     * About page — team, mission, story.
     * View: resources/views/site/about.blade.php
     */
    public function about()
    {
        return view('site.about');
    }

    /**
     * GTM Playbooks page — strategy playbook library.
     * View: resources/views/site/gtmPlay.blade.php
     */
    public function gtmPlaybooks()
    {
        return view('site.gtmPlay');
    }

    /**
     * sendContact — processes the contact form submission.
     * 
     * Sends two emails:
     *   1. To admin (ADMIN_EMAIL in .env) with form data
     *   2. To submitter with a confirmation/thank-you
     * 
     * Uses ContactRequest for validation (name, email, message required).
     * Falls back gracefully if mail config is placeholder.
     * 
     * @param  ContactRequest $request  Validated form data
     * @return \Illuminate\Http\RedirectResponse Redirect back with status message
     */
    public function sendContact(ContactRequest $request)
    {
        $data = $request->validated();

        $rawAdminEmail = config('services.admin_email') ?: env('ADMIN_EMAIL') ?: config('mail.from.address');
        $adminEmails = array_filter(array_map('trim', explode(',', (string) $rawAdminEmail)));

        if (empty($adminEmails) && config('mail.from.address')) {
            $adminEmails = [config('mail.from.address')];
        }

        try {
            foreach ($adminEmails as $recipient) {
                if (!empty($recipient) && filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
                    Mail::to($recipient)->send(new ContactAdminMail($data));
                }
            }

            if (!empty($data['email'])) {
                Mail::to($data['email'])->send(new ContactUserMail($data));
            }

            return redirect()->route('nexagtm.contact')
                ->with('status', 'Thanks — your message was sent.');
        } catch (\Exception $e) {
            return redirect()->route('nexagtm.contact')
                ->with('status', 'There was an error sending your message. Please try again later.');
        }
    }

    /**
     * Book a Call page — schedule a video or voice strategy consultation.
     * View: resources/views/site/bookCall.blade.php
     */
    public function bookCall()
    {
        return view('site.bookCall');
    }

    /**
     * sendBookCall — processes call booking form, saves to DB, sends admin & user emails.
     * 
     * @param  Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendBookCall(Request $request)
    {
        $validated = $request->validate([
            'call_type' => 'required|string|in:video,voice',
            'date' => 'required|date|after_or_equal:today',
            'time_slot' => 'required|string|max:50',
            'timezone' => 'required|string|max:100',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:255',
            'topic' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:2000',
        ]);

        CallBooking::create($validated);

        // Resolve admin recipients (supports multiple comma-separated emails or single address)
        $rawAdminEmail = config('services.admin_email') ?: env('ADMIN_EMAIL') ?: config('mail.from.address');
        $adminEmails = array_filter(array_map('trim', explode(',', (string) $rawAdminEmail)));

        if (empty($adminEmails) && config('mail.from.address')) {
            $adminEmails = [config('mail.from.address')];
        }

        try {
            // 1. Send notification to admin(s)
            foreach ($adminEmails as $recipient) {
                if (!empty($recipient) && filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
                    Mail::to($recipient)->send(new CallBookedAdminMail($validated));
                }
            }

            // 2. Send confirmation to the client/user
            if (!empty($validated['email'])) {
                Mail::to($validated['email'])->send(new CallBookedUserMail($validated));
            }
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('Call booking email notification failed: ' . $e->getMessage());
        }

        return redirect()->route('nexagtm.book-call')
            ->with('status', 'Your strategy call has been successfully scheduled! We sent a confirmation to your email.');
    }

    /**
     * create() — Show form to create a new Nexagtm record.
     * TODO: Implement when GTM project management feature is built.
     */
    public function create()
    {
        // Not yet implemented
    }

    /**
     * store() — Save a new Nexagtm record.
     * Validation handled by StoreNexagtmRequest.
     * TODO: Implement when GTM project management feature is built.
     */
    public function store(StoreNexagtmRequest $request)
    {
        // Not yet implemented
    }

    /**
     * show() — Display a single Nexagtm record.
     * TODO: Implement when GTM project management feature is built.
     */
    public function show(Nexagtm $nexagtm)
    {
        // Not yet implemented
    }

    /**
     * edit() — Show form to edit a Nexagtm record.
     * TODO: Implement when GTM project management feature is built.
     */
    public function edit(Nexagtm $nexagtm)
    {
        // Not yet implemented
    }

    /**
     * update() — Save changes to a Nexagtm record.
     * Validation handled by UpdateNexagtmRequest.
     * TODO: Implement when GTM project management feature is built.
     */
    public function update(UpdateNexagtmRequest $request, Nexagtm $nexagtm)
    {
        // Not yet implemented
    }

    /**
     * destroy() — Delete a Nexagtm record.
     * TODO: Implement when GTM project management feature is built.
     */
    public function destroy(Nexagtm $nexagtm)
    {
        // Not yet implemented
    }
}
