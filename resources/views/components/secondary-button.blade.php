<button {{ $attributes->merge(['type' => 'button', 'class' => 'neomorph-well inline-flex items-center justify-center px-4 py-2 rounded-xl font-semibold text-xs text-gray-200 uppercase tracking-wider hover:text-white disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer']) }}>
    {{ $slot }}
</button>
