<x-guest-layout>
    <div class="mb-6 text-center">
        <div class="w-12 h-12 bg-[#3fb950]/20 text-[#3fb950] border border-[#3fb950]/40 rounded-full flex items-center justify-center mx-auto mb-3 text-xl">
            🔒
        </div>
        <h2 class="text-2xl font-black text-white tracking-tight">Security Confirmation</h2>
        <p class="text-xs text-gray-400 mt-2 leading-relaxed">
            {{ __('This is a secure area of NexaGTM. Please confirm your account password before proceeding.') }}
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Account Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full justify-center py-3 text-xs tracking-wider">
                {{ __('Confirm & Continue') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
