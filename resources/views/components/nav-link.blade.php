@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-3 pt-1 border-b-2 border-[#3fb950] text-xs font-bold uppercase tracking-wider text-white focus:outline-none transition duration-150 ease-in-out'
            : 'inline-flex items-center px-3 pt-1 border-b-2 border-transparent text-xs font-semibold uppercase tracking-wider text-[#8b949e] hover:text-white hover:border-[#3fb950]/50 focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
