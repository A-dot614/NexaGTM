<x-app-layout>
    <x-slot name="title">{{ __('Account Settings') }}</x-slot>

    <div class="max-w-7xl mx-auto space-y-6">
        <div class="neomorph-card p-6 sm:p-8 rounded-3xl relative">
            <span class="style-tag neomorph">Neomorphic Card</span>
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="neomorph-card p-6 sm:p-8 rounded-3xl relative">
            <span class="style-tag spatial">Spatial Card</span>
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="neomorph-card p-6 sm:p-8 rounded-3xl border-red-500/30 relative">
            <span class="style-tag brutal">Danger Zone</span>
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
