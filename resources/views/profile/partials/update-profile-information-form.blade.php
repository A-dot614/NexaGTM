<section>
    <header>
        <h2 class="text-lg font-bold text-white tracking-tight">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-xs text-gray-400">
            {{ __("Update your account's profile name, company, and primary email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-4">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-1" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="company" :value="__('Company / Agency Name')" />
            <x-text-input id="company" name="company" type="text" class="mt-1 block w-full" :value="old('company', $user->company)" autocomplete="organization" />
            <x-input-error class="mt-1" :messages="$errors->get('company')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Work Email Address')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-1" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 p-3 rounded-lg bg-amber-500/10 border border-amber-500/30">
                    <p class="text-xs text-amber-300">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-xs text-[#3fb950] hover:text-white ml-1 cursor-pointer">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-xs text-[#3fb950]">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-2">
            <x-primary-button>{{ __('Save Changes') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-xs font-semibold text-[#3fb950]"
                >{{ __('✓ Changes saved successfully.') }}</p>
            @endif
        </div>
    </form>
</section>
