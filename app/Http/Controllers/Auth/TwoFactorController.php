<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use Carbon\Carbon;

/**
 * TwoFactorController
 * Handles email-based OTP verification after login.
 * Flow: Login → send OTP email → user enters OTP → access dashboard
 */
class TwoFactorController extends Controller
{
    /**
     * Show the OTP entry form.
     * Only accessible if user has passed first-factor auth (session flag).
     */
    public function show(Request $request)
    {
        // Guard: user must have completed first factor
        if (!$request->session()->has('auth.2fa.user_id')) {
            return redirect()->route('login');
        }
        return view('auth.two-factor');
    }

    /**
     * Send OTP code to the user's email.
     * Called automatically after successful password auth.
     */
    public function send(Request $request)
    {
        $userId = $request->session()->get('auth.2fa.user_id');
        if (!$userId) {
            return redirect()->route('login');
        }
        $user = \App\Models\User::findOrFail($userId);

        // Generate 6-digit OTP, expires in 10 minutes
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $user->update([
            'otp_code'       => bcrypt($otp),
            'otp_expires_at' => Carbon::now()->addMinutes(10),
        ]);

        Mail::to($user->email)->send(new OtpMail($otp, $user->name));

        return redirect()->route('two-factor.show')
            ->with('status', 'OTP sent to your email.');
    }

    /**
     * Verify the submitted OTP and complete login.
     */
    public function verify(Request $request)
    {
        $request->validate(['otp' => 'required|digits:6']);

        $userId = $request->session()->get('auth.2fa.user_id');
        if (!$userId) {
            return redirect()->route('login');
        }
        $user = \App\Models\User::findOrFail($userId);

        // Check expiry
        if (Carbon::now()->isAfter($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'OTP has expired. Please request a new one.']);
        }

        // Check code
        if (!password_verify($request->otp, $user->otp_code)) {
            return back()->withErrors(['otp' => 'Invalid OTP code.']);
        }

        // Clear OTP, complete login
        $user->update(['otp_code' => null, 'otp_expires_at' => null]);
        $request->session()->forget('auth.2fa.user_id');

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }
}
