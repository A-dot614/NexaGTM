<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    /**
     * Show the activity logs — full audit trail of who did what.
     */
    public function index(Request $request)
    {
        $query = ActivityLog::latest();

        if ($request->filled('event') && $request->event !== 'all') {
            $query->where('event', $request->event);
        }

        if ($request->filled('log') && $request->log !== 'all') {
            $query->where('log_name', $request->log);
        }

        if ($request->filled('q')) {
            $q = trim($request->q);
            $query->where(function ($sub) use ($q) {
                $sub->where('user_name', 'like', "%{$q}%")
                    ->orWhere('user_email', 'like', "%{$q}%")
                    ->orWhere('description', 'like', "%{$q}%")
                    ->orWhere('ip_address', 'like', "%{$q}%");
            });
        }

        $logs = $query->paginate(20)->withQueryString();

        $events = ActivityLog::selectRaw('event, count(*) as total')->groupBy('event')->pluck('total', 'event');
        $logsByModule = ActivityLog::selectRaw('log_name, count(*) as total')->groupBy('log_name')->pluck('total', 'log_name');

        return view('dashboard.audit', compact('logs', 'events', 'logsByModule'));
    }
}