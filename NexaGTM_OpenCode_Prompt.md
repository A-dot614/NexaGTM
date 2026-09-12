# NexaGTM Laravel Project — Complete Fix & Enhancement Prompt for OpenCode

## Project Overview
**NexaGTM** is a Laravel 13 + Breeze project. It's a GTM (Go-To-Market) SaaS marketing website with:
- Public site pages: Home, About, Pricing, Contact, GTM Playbooks
- Auth system (Login, Register, Email Verification)
- Dark-themed frontend using custom `mainlayout.blade.php`
- Breeze's default `layouts/app.blade.php` for the authenticated area (dashboard)

---

## 🔴 BUGS FOUND — Fix All of These

### BUG 1: Dashboard route is broken (///////)
**File:** `routes/web.php` — Line 14

**Problem:**
```php
Route::get('///////dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
```
The route has 7 forward slashes (`///////dashboard`) which makes the URL unreachable. After login, Laravel redirects to `route('dashboard')` — this named route exists but the actual URL is malformed.

**Fix:**
```php
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
```

---

### BUG 2: Dashboard view is empty placeholder
**File:** `resources/views/dashboard.blade.php`

**Problem:** Dashboard only shows "You're logged in!" — no real content, no NexaGTM branding, no user data or stats.

**Fix:** Replace with a proper NexaGTM branded dashboard. See **TASK 3** below for full dashboard requirements.

---

### BUG 3: User Model — MustVerifyEmail is commented out
**File:** `app/Models/User.php`

**Problem:**
```php
// use Illuminate\Contracts\Auth\MustVerifyEmail;
class User extends Authenticatable
```
The interface is commented out, so email verification middleware (`verified`) does nothing — users bypass verification even though the route requires it.

**Fix:**
```php
use Illuminate\Contracts\Auth\MustVerifyEmail;
class User extends Authenticatable implements MustVerifyEmail
```

---

### BUG 4: `nexagtms` table migration is empty
**File:** `database/migrations/2026_06_16_022355_create_nexagtms_table.php`

**Problem:** The table only has `id` and `timestamps` — no columns. The model `Nexagtm` and the controller methods (`store`, `update`, `destroy`) are all empty/unused.

**Fix:** Add relevant columns for a GTM lead/subscription tracker:
```php
Schema::create('nexagtms', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->string('company_name');
    $table->string('industry')->nullable();
    $table->string('plan')->default('starter'); // starter, growth, enterprise
    $table->string('status')->default('active'); // active, paused, cancelled
    $table->date('trial_ends_at')->nullable();
    $table->timestamps();
});
```

---

### BUG 5: Two `tailwind.config` blocks in mainlayout — JS conflict
**File:** `resources/views/components/layout/mainlayout.blade.php`

**Problem:** There are two conflicting JS blocks inside `<script>`:
```js
tailwind.config = { ... }
// Then immediately after:
module.exports = { ... }  // This is Node.js syntax, breaks in browser
```
`module.exports` is Node.js syntax and throws a ReferenceError in the browser.

**Fix:** Remove the `module.exports` block entirely, keep only the `tailwind.config = {}` object. Move the keyframes animation to the `<style>` tag (it's already there).

---

### BUG 6: `env('ADMIN_EMAIL')` instead of `config()`
**File:** `app/Http/Controllers/NexagtmController.php`

**Problem:**
```php
$adminEmail = env('ADMIN_EMAIL') ?: config('mail.from.address');
```
Using `env()` directly in controllers is bad practice in Laravel — it doesn't work with cached config (`php artisan config:cache`).

**Fix:** Add to `config/services.php`:
```php
'admin_email' => env('ADMIN_EMAIL', env('MAIL_FROM_ADDRESS', 'admin@nexagtm.com')),
```
Then in controller:
```php
$adminEmail = config('services.admin_email');
if ($adminEmail === 'hello@example.com') { $adminEmail = null; }
```

---

## ✅ TASK 1: Add 2-Step Verification (Two-Factor Authentication)

### Step 1 — Add `two_factor_*` columns to users migration
**File:** `database/migrations/0001_01_01_000000_create_users_table.php`

Add inside the `users` table schema:
```php
$table->text('two_factor_secret')->nullable();
$table->text('two_factor_recovery_codes')->nullable();
$table->timestamp('two_factor_confirmed_at')->nullable();
```

### Step 2 — Install Laravel Fortify OR implement manual OTP via email

**Option A (Recommended — Simple Email OTP):**

1. Create migration: `php artisan make:migration add_otp_to_users_table`
```php
$table->string('otp_code', 6)->nullable();
$table->timestamp('otp_expires_at')->nullable();
$table->boolean('two_factor_enabled')->default(false);
```

2. Create `app/Http/Controllers/Auth/TwoFactorController.php`:
```php
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

        return redirect()->intended(route('dashboard'));
    }
}
```

3. Create `app/Mail/OtpMail.php`:
```php
<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * OtpMail — sends 6-digit verification code to user after login.
 */
class OtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly string $otp,
        public readonly string $userName
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(subject: 'Your NexaGTM Login Code');
    }

    public function content(): Content
    {
        return new Content(view: 'emails.otp');
    }
}
```

4. Create `resources/views/emails/otp.blade.php`:
```blade
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; background: #0d1117; color: #e6edf3; }
        .container { max-width: 480px; margin: 40px auto; background: #161b22; border-radius: 12px; padding: 32px; }
        .otp { font-size: 36px; font-weight: bold; letter-spacing: 12px; color: #3fb950; text-align: center; padding: 20px; background: #0d1117; border-radius: 8px; margin: 24px 0; }
        .footer { font-size: 12px; color: #8b949e; margin-top: 24px; }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="color:#3fb950;">NexaGTM Security Code</h2>
        <p>Hi {{ $userName }},</p>
        <p>Your one-time login code is:</p>
        <div class="otp">{{ $otp }}</div>
        <p>This code expires in <strong>10 minutes</strong>. Do not share it with anyone.</p>
        <div class="footer">If you didn't request this, please ignore this email.</div>
    </div>
</body>
</html>
```

5. Create `resources/views/auth/two-factor.blade.php`:
```blade
<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('We sent a 6-digit code to your email. Enter it below to continue.') }}
    </div>

    @if (session('status'))
        <div class="mb-4 text-sm text-green-600">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('two-factor.verify') }}">
        @csrf

        <!-- OTP Code -->
        <div>
            <x-input-label for="otp" :value="__('Verification Code')" />
            <x-text-input id="otp" class="block mt-1 w-full text-center text-2xl tracking-widest"
                type="text" name="otp" maxlength="6" required autofocus
                placeholder="000000" inputmode="numeric" pattern="[0-9]{6}" />
            <x-input-error :messages="$errors->get('otp')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <!-- Resend -->
            <form method="POST" action="{{ route('two-factor.send') }}" class="inline">
                @csrf
                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Resend Code') }}
                </button>
            </form>

            <x-primary-button>
                {{ __('Verify') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
```

6. Add routes to `routes/auth.php` (inside `middleware('guest')` group — add after login POST):
```php
// Two-Factor Authentication
Route::get('two-factor', [TwoFactorController::class, 'show'])->name('two-factor.show');
Route::post('two-factor/send', [TwoFactorController::class, 'send'])->name('two-factor.send');
Route::post('two-factor/verify', [TwoFactorController::class, 'verify'])->name('two-factor.verify');
```
Add import at top: `use App\Http\Controllers\Auth\TwoFactorController;`

7. Modify `AuthenticatedSessionController::store()` to intercept after password check:
```php
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
```

---

## ✅ TASK 2: Register Page — Add Comments & Enhance

**File:** `resources/views/auth/register.blade.php`

Add the following fields AND detailed Blade comments:

```blade
<x-guest-layout>
    {{-- 
        NexaGTM Registration Page
        ─────────────────────────
        Fields:
          - name        : Full name (required)
          - email       : Unique email address (required)
          - company     : Company name (optional, stored for GTM profile)
          - password    : Min 8 chars, must confirm
          - password_confirmation : Must match password
        
        On submit → RegisteredUserController@store
        On success → redirect to /dashboard (after email verification)
        
        Validation rules defined in RegisteredUserController::store()
        Email verification required before dashboard access (MustVerifyEmail)
    --}}

    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Full Name field --}}
        <div>
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text"
                name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- Email Address field --}}
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email"
                name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- Company Name (optional) — used for GTM profile --}}
        <div class="mt-4">
            <x-input-label for="company" :value="__('Company Name (optional)')" />
            <x-text-input id="company" class="block mt-1 w-full" type="text"
                name="company" :value="old('company')" autocomplete="organization" />
            <x-input-error :messages="$errors->get('company')" class="mt-2" />
        </div>

        {{-- Password field — must be at least 8 characters --}}
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password"
                name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- Password confirmation — must match password --}}
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        {{-- Terms agreement checkbox --}}
        <div class="mt-4">
            <label class="inline-flex items-center">
                <input type="checkbox" name="terms" required
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                <span class="ms-2 text-sm text-gray-600">
                    {{ __('I agree to the') }}
                    <a href="#" class="underline hover:text-gray-900">{{ __('Terms of Service') }}</a>
                    {{ __('and') }}
                    <a href="#" class="underline hover:text-gray-900">{{ __('Privacy Policy') }}</a>
                </span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Create Account') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
```

Also update `RegisteredUserController::store()` to accept `company` and add `terms` validation:
```php
$request->validate([
    'name'     => ['required', 'string', 'max:255'],
    'email'    => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    'company'  => ['nullable', 'string', 'max:255'],
    'password' => ['required', 'confirmed', Rules\Password::defaults()],
    'terms'    => ['required', 'accepted'],
]);

$user = User::create([
    'name'     => $request->name,
    'email'    => $request->email,
    'company'  => $request->company,
    'password' => Hash::make($request->password),
]);
```
Also add `company` column to users migration and `$fillable`.

---

## ✅ TASK 3: Build Real Dashboard

**File:** `resources/views/dashboard.blade.php`

Replace completely with a NexaGTM-branded dashboard using `x-app-layout`:

```blade
<x-app-layout>
    {{-- 
        NexaGTM Dashboard
        ─────────────────
        Shows:
          - Welcome greeting with user name
          - Account stats cards (Plan, Status, Days Remaining)
          - Quick actions (Update Profile, View Playbooks, Contact Support)
          - Recent activity / onboarding checklist
        
        Layout: uses layouts/app.blade.php (Breeze default)
        Auth: requires auth + verified middleware (set in routes/web.php)
        Data: $user from Auth::user() — passed automatically via middleware
    --}}

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <span class="text-sm text-gray-500">
                {{ now()->format('l, F j, Y') }}
            </span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Welcome Banner --}}
            <div class="bg-gradient-to-r from-green-600 to-green-800 rounded-xl p-6 text-white shadow">
                <h1 class="text-2xl font-bold">
                    Welcome back, {{ Auth::user()->name }} 👋
                </h1>
                <p class="mt-1 text-green-100">
                    You're all set with NexaGTM. Here's your account overview.
                </p>
            </div>

            {{-- Stats Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

                {{-- Email Status --}}
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <p class="text-sm text-gray-500 font-medium">Email Verified</p>
                    <p class="mt-2 text-2xl font-bold
                        {{ Auth::user()->email_verified_at ? 'text-green-600' : 'text-red-500' }}">
                        {{ Auth::user()->email_verified_at ? '✓ Verified' : '✗ Not Verified' }}
                    </p>
                    @unless(Auth::user()->email_verified_at)
                        <form method="POST" action="{{ route('verification.send') }}" class="mt-2">
                            @csrf
                            <button type="submit" class="text-xs text-indigo-600 underline hover:text-indigo-800">
                                Resend verification email
                            </button>
                        </form>
                    @endunless
                </div>

                {{-- Account Type --}}
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <p class="text-sm text-gray-500 font-medium">Account</p>
                    <p class="mt-2 text-2xl font-bold text-gray-800">
                        {{ Auth::user()->company ?? 'Personal' }}
                    </p>
                    <p class="text-xs text-gray-400 mt-1">{{ Auth::user()->email }}</p>
                </div>

                {{-- Member Since --}}
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <p class="text-sm text-gray-500 font-medium">Member Since</p>
                    <p class="mt-2 text-2xl font-bold text-gray-800">
                        {{ Auth::user()->created_at->format('M Y') }}
                    </p>
                    <p class="text-xs text-gray-400 mt-1">
                        {{ Auth::user()->created_at->diffForHumans() }}
                    </p>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center gap-3 p-4 rounded-lg bg-gray-50 hover:bg-green-50 hover:border-green-200 border border-transparent transition">
                        <span class="text-2xl">👤</span>
                        <div>
                            <p class="font-medium text-gray-700">Edit Profile</p>
                            <p class="text-xs text-gray-500">Update your info & password</p>
                        </div>
                    </a>
                    <a href="{{ route('nexagtm.gtm-playbooks') }}"
                        class="flex items-center gap-3 p-4 rounded-lg bg-gray-50 hover:bg-green-50 hover:border-green-200 border border-transparent transition">
                        <span class="text-2xl">📋</span>
                        <div>
                            <p class="font-medium text-gray-700">GTM Playbooks</p>
                            <p class="text-xs text-gray-500">Browse strategy playbooks</p>
                        </div>
                    </a>
                    <a href="{{ route('nexagtm.contact') }}"
                        class="flex items-center gap-3 p-4 rounded-lg bg-gray-50 hover:bg-green-50 hover:border-green-200 border border-transparent transition">
                        <span class="text-2xl">💬</span>
                        <div>
                            <p class="font-medium text-gray-700">Contact Support</p>
                            <p class="text-xs text-gray-500">Get help from our team</p>
                        </div>
                    </a>
                </div>
            </div>

            {{-- Getting Started Checklist --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Getting Started</h3>
                <ul class="space-y-3">
                    <li class="flex items-center gap-3">
                        <span class="w-6 h-6 rounded-full bg-green-100 text-green-700 flex items-center justify-center text-sm font-bold">✓</span>
                        <span class="text-gray-700">Create your account</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="w-6 h-6 rounded-full {{ Auth::user()->email_verified_at ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-400' }} flex items-center justify-center text-sm font-bold">
                            {{ Auth::user()->email_verified_at ? '✓' : '2' }}
                        </span>
                        <span class="{{ Auth::user()->email_verified_at ? 'text-gray-700' : 'text-gray-400' }}">Verify your email address</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="w-6 h-6 rounded-full bg-gray-100 text-gray-400 flex items-center justify-center text-sm font-bold">3</span>
                        <span class="text-gray-400">Choose a GTM plan</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="w-6 h-6 rounded-full bg-gray-100 text-gray-400 flex items-center justify-center text-sm font-bold">4</span>
                        <span class="text-gray-400">Explore your first playbook</span>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>
```

---

## ✅ TASK 4: Comment All Controllers

### `NexagtmController.php` — Add comments to all methods:

```php
<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNexagtmRequest;
use App\Http\Requests\UpdateNexagtmRequest;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactAdminMail;
use App\Mail\ContactUserMail;
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
        return view('site.index');
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
     * @return RedirectResponse         Redirect back with status message
     */
    public function sendContact(ContactRequest $request)
    {
        $data = $request->validated();

        $adminEmail = config('services.admin_email');

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

            return redirect()->route('nexagtm.contact')
                ->with('status', 'Thanks — your message was sent.');
        } catch (\Exception $e) {
            return redirect()->route('nexagtm.contact')
                ->with('status', 'There was an error sending your message. Please try again later.');
        }
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
```

Also comment `RegisteredUserController.php`:
```php
/**
 * RegisteredUserController
 * ────────────────────────
 * Handles new user registration for NexaGTM.
 * 
 * Routes:
 *   GET  /register → create()   Show registration form
 *   POST /register → store()    Validate + create user + send verification email
 * 
 * After registration:
 *   - Fires Registered event (triggers email verification notification)
 *   - Redirects to /two-factor for OTP verification (if 2FA enabled)
 *   - Otherwise redirects to /dashboard
 * 
 * Email verification: User model implements MustVerifyEmail.
 * Dashboard access requires 'verified' middleware.
 */
```

---

## 📋 Summary of All Changes

| # | File | Change |
|---|------|--------|
| 1 | `routes/web.php` | Fix `///////dashboard` → `/dashboard` |
| 2 | `app/Models/User.php` | Implement `MustVerifyEmail` interface |
| 3 | `resources/views/dashboard.blade.php` | Replace with full NexaGTM dashboard |
| 4 | `app/Http/Controllers/NexagtmController.php` | Add comments + fix env() → config() |
| 5 | `app/Http/Controllers/Auth/RegisteredUserController.php` | Add company field, terms validation, comments |
| 6 | `resources/views/auth/register.blade.php` | Add company field, terms checkbox, full comments |
| 7 | `resources/views/components/layout/mainlayout.blade.php` | Remove `module.exports` JS conflict |
| 8 | `database/migrations/*_create_nexagtms_table.php` | Add real columns |
| 9 | `database/migrations/*_create_users_table.php` | Add `otp_code`, `otp_expires_at`, `company` columns |
| 10 | `app/Http/Controllers/Auth/TwoFactorController.php` | **NEW** — 2FA OTP controller |
| 11 | `app/Http/Controllers/Auth/AuthenticatedSessionController.php` | Intercept login for OTP |
| 12 | `app/Mail/OtpMail.php` | **NEW** — OTP email mailable |
| 13 | `resources/views/emails/otp.blade.php` | **NEW** — OTP email template |
| 14 | `resources/views/auth/two-factor.blade.php` | **NEW** — OTP entry page |
| 15 | `routes/auth.php` | Add 2FA routes |
| 16 | `config/services.php` | Add `admin_email` config key |

## After Making Changes Run:
```bash
php artisan migrate:fresh --seed
php artisan config:clear
php artisan view:clear
npm run dev
php artisan serve
```
