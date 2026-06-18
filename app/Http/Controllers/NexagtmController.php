<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNexagtmRequest;
use App\Http\Requests\UpdateNexagtmRequest;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactAdminMail;
use App\Mail\ContactUserMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Nexagtm;

class NexagtmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('site.index');
    }

    public function price()
    {
        return view('site.price');
    }

    public function contact()
    {
        return view('site.contact');
    }

    public function about()
    {
        return view('site.about');
    }

    // public function team()
    // {
    //     return view('site.team');
    // }

    public function gtmPlaybooks()
    {
        return view('site.gtmPlay');
    }

    public function sendContact(ContactRequest $request)
    {
        $data = $request->validated();

        $adminEmail = env('ADMIN_EMAIL') ?: config('mail.from.address');

        // avoid sending to the default placeholder address
        if ($adminEmail === 'hello@example.com') {
            $adminEmail = null;
        }

        try {
            if ($adminEmail) {
                Mail::to($adminEmail)->send(new ContactAdminMail($data));
            }

            if (!empty($data['email'])) {
                Mail::to($data['email'])->send(new ContactUserMail($data));
            }

            return redirect()->route('nexagtm.contact')->with('status', 'Thanks — your message was sent.');
        } catch (\Exception $e) {
            return redirect()->route('nexagtm.contact')->with('status', 'There was an error sending your message. Please try again later.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNexagtmRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Nexagtm $nexagtm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nexagtm $nexagtm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNexagtmRequest $request, Nexagtm $nexagtm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nexagtm $nexagtm)
    {
        //
    }
}
