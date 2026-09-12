<button {{ $attributes->merge(['type' => 'submit', 'class' => 'skeuo-button inline-flex items-center justify-center px-5 py-2.5 text-[#0d1117] font-bold text-xs uppercase tracking-widest rounded-xl transition-all duration-200 cursor-pointer']) }}>
    {{ $slot }}
</button>
