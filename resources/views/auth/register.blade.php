{{-- <x-guest-layout>
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

    <div class="mb-6 text-center">
        <h2 class="text-2xl font-black text-white tracking-tight">Create Nexa<span class="text-[#3fb950]">GTM</span> Account</h2>
        <p class="text-xs text-gray-400 mt-1">Scale your outbound systems and pipeline with verified leads</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        {{-- Full Name field --}}
        <div>
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text"
                name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Jane Doe" />
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        {{-- Email Address field --}}
        <div>
            <x-input-label for="email" :value="__('Work Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email"
                name="email" :value="old('email')" required autocomplete="username" placeholder="jane@company.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        {{-- Company Name (optional) — used for GTM profile --}}
        <div>
            <x-input-label for="company" :value="__('Company / Agency Name (optional)')" />
            <x-text-input id="company" class="block mt-1 w-full" type="text"
                name="company" :value="old('company')" autocomplete="organization" placeholder="Acme Systems" />
            <x-input-error :messages="$errors->get('company')" class="mt-1" />
        </div>

        {{-- Password field — must be at least 8 characters --}}
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password"
                name="password" required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        {{-- Password confirmation — must match password --}}
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        {{-- Terms agreement checkbox --}}
        <div class="pt-1">
            <label class="inline-flex items-start cursor-pointer">
                <input type="checkbox" name="terms" required
                    class="mt-0.5 rounded border-[#30363d] bg-[#0d1117] text-[#3fb950] shadow-sm focus:ring-[#3fb950] focus:ring-offset-[#161b22]">
                <span class="ms-2 text-xs text-gray-400 leading-relaxed">
                    {{ __('I agree to the') }}
                    <a href="{{ route('home') }}" class="text-[#3fb950] hover:underline">{{ __('Terms of Service') }}</a>
                    {{ __('and') }}
                    <a href="{{ route('home') }}" class="text-[#3fb950] hover:underline">{{ __('Privacy Policy') }}</a>
                </span>
            </label>
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full justify-center py-3 text-xs tracking-wider">
                {{ __('Create Account') }}
            </x-primary-button>
        </div>
    </form>

    <div class="mt-6 pt-5 border-t border-[#30363d] text-center text-xs text-gray-400">
        {{ __('Already registered?') }}
        <a href="{{ route('login') }}" class="font-bold text-[#3fb950] hover:underline ml-1">
            {{ __('Sign in here') }}
        </a>
    </div>
</x-guest-layout> --}}
