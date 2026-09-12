<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate(); // validates credentials

        // Get the authenticated user (not yet session-logged-in)
        $user = \App\Models\User::where('email', $request->email)->first();

        // Store user ID in session for 2FA step
        $request->session()->put('auth.2fa.user_id', $user->id);
        Auth::guard('web')->logout(); // log them back out until OTP verified

        // Send OTP
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $user->update([
            'otp_code'       => bcrypt($otp),
            'otp_expires_at' => \Carbon\Carbon::now()->addMinutes(10),
        ]);
        \Illuminate\Support\Facades\Mail::to($user->email)
            ->send(new \App\Mail\OtpMail($otp, $user->name));

        return redirect()->route('two-factor.show');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
