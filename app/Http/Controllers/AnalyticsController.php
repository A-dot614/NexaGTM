<?php

namespace App\Http\Controllers;

use App\Models\CallBooking;
use App\Models\Contact;
use App\Models\Testimonial;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    /**
     * Show the analytics overview — real stats from contacts, bookings & testimonials.
     */
    public function index()
    {
        $totalContacts = Contact::count();
        $totalBookings = CallBooking::count();
        $totalTestimonials = Testimonial::count();

        $newContacts = Contact::where('status', 'new')->count();
        $scheduledBookings = CallBooking::where('status', 'scheduled')->count();

        $contactsByStatus = Contact::selectRaw('status, count(*) as total')
            ->groupBy('status')->pluck('total', 'status');
        $bookingsByStatus = CallBooking::selectRaw('status, count(*) as total')
            ->groupBy('status')->pluck('total', 'status');

        $contactsBySubject = Contact::selectRaw('subject, count(*) as total')
            ->groupBy('subject')->orderByDesc('total')->limit(5)->get();
        $contactsBySource = Contact::whereNotNull('source')
            ->selectRaw('source, count(*) as total')
            ->groupBy('source')->orderByDesc('total')->limit(6)->get();
        $contactsByBudget = Contact::whereNotNull('budget')
            ->selectRaw('budget, count(*) as total')
            ->groupBy('budget')->orderByDesc('total')->limit(6)->get();

        $bookingsByType = CallBooking::selectRaw('call_type, count(*) as total')
            ->groupBy('call_type')->pluck('total', 'call_type');

        $monthlyContacts = Contact::selectRaw('strftime("%Y-%m", created_at) as month, count(*) as total')
            ->groupBy('month')->orderBy('month')->limit(6)->get();
        $monthlyBookings = CallBooking::selectRaw('strftime("%Y-%m", created_at) as month, count(*) as total')
            ->groupBy('month')->orderBy('month')->limit(6)->get();

        $recentContacts = Contact::latest()->take(5)->get();
        $recentBookings = CallBooking::latest()->take(5)->get();

        return view('dashboard.analytics', compact(
            'totalContacts',
            'totalBookings',
            'totalTestimonials',
            'newContacts',
            'scheduledBookings',
            'contactsByStatus',
            'bookingsByStatus',
            'contactsBySubject',
            'contactsBySource',
            'contactsByBudget',
            'bookingsByType',
            'monthlyContacts',
            'monthlyBookings',
            'recentContacts',
            'recentBookings',
        ));
    }
}