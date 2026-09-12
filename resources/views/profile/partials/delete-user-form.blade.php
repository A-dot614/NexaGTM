<section class="space-y-6">
    <header>
        <h2 class="text-lg font-bold text-red-400 tracking-tight">
            {{ __('Danger Zone: Delete Account') }}
        </h2>

        <p class="mt-1 text-xs text-gray-400">
            {{ __('Once your account is deleted, all of its associated NexaGTM data, playbooks, and campaigns will be permanently removed. This action cannot be reversed.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 sm:p-8 space-y-4">
            @csrf
            @method('delete')

            <h2 class="text-xl font-black text-white tracking-tight">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="text-xs text-gray-400 leading-relaxed">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-4">
                <x-input-label for="password" value="{{ __('Account Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="block w-full"
                    placeholder="{{ __('Enter your password to confirm') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-1" />
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button>
                    {{ __('Permanently Delete') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
