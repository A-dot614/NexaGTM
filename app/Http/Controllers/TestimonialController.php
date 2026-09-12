<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Show the testimonial manager — table of existing testimonials.
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(12);

        return view('dashboard.testimonials', compact('testimonials'));
    }

    /**
     * Show the form to create a new testimonial.
     */
    public function create()
    {
        return view('dashboard.testimonials.create');
    }

    /**
     * Store a new testimonial submitted from the dashboard.
     */
    public function store(Request $request)
    {
        $validated = $this->validatePayload($request);

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('testimonials', 'public');
        }

        Testimonial::create($validated + $this->resolveStatus($request));

        return redirect()->route('dashboard.testimonials')
            ->with('status', 'Testimonial added successfully.');
    }

    /**
     * Show a single testimonial's full details.
     */
    public function show(Testimonial $testimonial)
    {
        return view('dashboard.testimonials.show', compact('testimonial'));
    }

    /**
     * Show the edit form for a single testimonial.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('dashboard.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update an existing testimonial.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $this->validatePayload($request, $testimonial);

        if ($request->hasFile('avatar')) {
            if ($testimonial->avatar) {
                Storage::disk('public')->delete($testimonial->avatar);
            }
            $validated['avatar'] = $request->file('avatar')->store('testimonials', 'public');
        }

        $testimonial->update($validated + $this->resolveStatus($request));

        return redirect()->route('dashboard.testimonials')
            ->with('status', 'Testimonial updated successfully.');
    }

    /**
     * Delete a testimonial.
     */
    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->avatar) {
            Storage::disk('public')->delete($testimonial->avatar);
        }

        $testimonial->delete();

        return redirect()->route('dashboard.testimonials')
            ->with('status', 'Testimonial deleted successfully.');
    }

    /**
     * Shared validation rules for store & update.
     */
    private function validatePayload(Request $request, ?Testimonial $testimonial = null): array
    {
        return $request->validate([
            'client_name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
            'content' => 'required|string|max:2000',
            'rating' => 'required|integer|between:1,5',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
    }

    private function resolveStatus(Request $request): array
    {
        return ['status' => $request->boolean('featured') ? 'featured' : 'active'];
    }
}