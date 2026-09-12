<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-red-600/90 hover:bg-red-600 border border-red-500/40 rounded-lg font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:shadow-[0_0_15px_rgba(239,68,68,0.4)] focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-[#161b22] transition ease-in-out duration-150 cursor-pointer']) }}>
    {{ $slot }}
</button>
