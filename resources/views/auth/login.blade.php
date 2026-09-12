<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-black text-white tracking-tight">Sign In to Nexa<span class="text-[#3fb950]">GTM</span></h2>
        <p class="text-xs text-gray-400 mt-1">Access your outbound pipeline, analytics, and playbooks</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-5" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Work Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="you@company.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between">
                <x-input-label for="password" :value="__('Password')" />
                @if (Route::has('password.request'))
                    <a class="text-xs text-[#8b949e] hover:text-[#3fb950] transition focus:outline-none" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between pt-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded border-[#30363d] bg-[#0d1117] text-[#3fb950] shadow-sm focus:ring-[#3fb950] focus:ring-offset-[#161b22]" name="remember">
                <span class="ms-2 text-xs text-gray-400">{{ __('Remember this device') }}</span>
            </label>
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full justify-center py-3 text-xs tracking-wider">
                {{ __('Sign In') }}
            </x-primary-button>
        </div>
    </form>

    {{-- <div class="mt-6 pt-5 border-t border-[#30363d] text-center text-xs text-gray-400">
        {{ __("Don't have an account?") }}
        <a href="{{ route('register') }}" class="font-bold text-[#3fb950] hover:underline ml-1">
            {{ __('Create one now') }}
        </a>
    </div> --}}
</x-guest-layout>
