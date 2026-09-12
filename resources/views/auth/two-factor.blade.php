<x-guest-layout>
    <div class="mb-6 text-center">
        <div class="w-12 h-12 bg-[#3fb950]/20 text-[#3fb950] border border-[#3fb950]/40 rounded-full flex items-center justify-center mx-auto mb-3 text-xl">
            🔒
        </div>
        <h2 class="text-2xl font-black text-white tracking-tight">Two-Factor Authentication</h2>
        <p class="text-xs text-gray-400 mt-1">We sent a 6-digit security code to your verified email. Enter it below to complete login.</p>
    </div>

    @if (session('status'))
        <div class="mb-5 p-3 rounded-lg bg-[#3fb950]/15 border border-[#3fb950]/30 text-[#3fb950] text-xs font-semibold flex items-center gap-2">
            <span>✓</span> {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('two-factor.verify') }}" class="space-y-5">
        @csrf

        <!-- OTP Code -->
        <div>
            <x-input-label for="otp" :value="__('6-Digit Verification Code')" class="text-center" />
            <x-text-input id="otp" class="block mt-2 w-full text-center text-3xl font-mono tracking-[0.5em] py-3 bg-[#0d1117] border-[#30363d] text-white focus:border-[#3fb950] focus:ring-[#3fb950]"
                type="text" name="otp" maxlength="6" required autofocus
                placeholder="000000" inputmode="numeric" pattern="[0-9]{6}" />
            <x-input-error :messages="$errors->get('otp')" class="mt-2 text-center" />
        </div>

        <div class="pt-2 flex flex-col sm:flex-row items-center justify-between gap-3">
            <!-- Resend -->
            <button type="submit" formaction="{{ route('two-factor.send') }}" formmethod="POST" formnovalidate class="text-xs font-semibold text-gray-400 hover:text-[#3fb950] transition underline cursor-pointer">
                {{ __('Resend Security Code') }}
            </button>

            <x-primary-button class="w-full sm:w-auto px-6 py-2.5">
                {{ __('Verify & Continue') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
