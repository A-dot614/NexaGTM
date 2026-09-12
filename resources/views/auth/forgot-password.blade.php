<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-black text-white tracking-tight">Reset Password</h2>
        <p class="text-xs text-gray-400 mt-2 leading-relaxed">
            {{ __('Forgot your password? Enter your verified work email address and we will send you a secure password reset link.') }}
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-5" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Work Email Address')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="you@company.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full justify-center py-3 text-xs tracking-wider">
                {{ __('Send Reset Link') }}
            </x-primary-button>
        </div>
    </form>

    <div class="mt-6 pt-5 border-t border-[#30363d] text-center text-xs text-gray-400">
        <a href="{{ route('login') }}" class="font-bold text-[#3fb950] hover:underline">
            {{ __('← Back to sign in') }}
        </a>
    </div>
</x-guest-layout>
