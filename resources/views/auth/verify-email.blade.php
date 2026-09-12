<x-guest-layout>
    <div class="mb-6 text-center">
        <div class="w-12 h-12 bg-[#3fb950]/20 text-[#3fb950] border border-[#3fb950]/40 rounded-full flex items-center justify-center mx-auto mb-3 text-xl">
            ✉️
        </div>
        <h2 class="text-2xl font-black text-white tracking-tight">Verify Your Email</h2>
        <p class="text-xs text-gray-400 mt-2 leading-relaxed">
            {{ __('Thanks for signing up for NexaGTM! Before accessing your dashboard, please verify your work email by clicking the link we just sent.') }}
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-5 p-3 rounded-lg bg-[#3fb950]/15 border border-[#3fb950]/30 text-[#3fb950] text-xs font-semibold flex items-center gap-2">
            <span>✓</span> {{ __('A new verification link has been sent to your registered email.') }}
        </div>
    @endif

    <div class="pt-2 flex flex-col sm:flex-row items-center justify-between gap-4">
        <form method="POST" action="{{ route('verification.send') }}" class="w-full sm:w-auto">
            @csrf
            <x-primary-button class="w-full justify-center">
                {{ __('Resend Verification Email') }}
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-xs text-gray-400 hover:text-red-400 underline transition cursor-pointer">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
