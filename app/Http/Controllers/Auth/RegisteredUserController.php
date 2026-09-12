<!-- <?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

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
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
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

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
} -->
