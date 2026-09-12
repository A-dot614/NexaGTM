<?php

namespace App\Http\Controllers;

use App\Models\CallBooking;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class CallBookingController extends Controller
{
    /**
     * Show the call bookings — submissions from the book-a-call form.
     */
    public function index()
    {
        $bookings = CallBooking::latest()->paginate(12);

        return view('dashboard.bookings', compact('bookings'));
    }

    /**
     * Show a single call booking's full details.
     */
    public function show(CallBooking $booking)
    {
        return view('dashboard.bookings.show', compact('booking'));
    }

    /**
     * Update the status of a booking (e.g. scheduled → completed).
     */
    public function update(Request $request, CallBooking $booking)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:scheduled,contacted,completed,cancelled',
        ]);

        $booking->update($validated);

        ActivityLog::record('booking', 'status_changed', 'Booking for ' . $booking->name . ' marked as ' . $validated['status']);

        return redirect()->route('dashboard.bookings.show', $booking)
            ->with('status', 'Booking status updated.');
    }

    /**
     * Delete a booking.
     */
    public function destroy(CallBooking $booking)
    {
        $booking->delete();

        ActivityLog::record('booking', 'deleted', 'Booking for ' . $booking->name . ' deleted');

        return redirect()->route('dashboard.bookings')
            ->with('status', 'Call booking deleted.');
    }
}