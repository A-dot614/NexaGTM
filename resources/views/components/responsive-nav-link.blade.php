@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-[#3fb950] text-start text-xs font-bold uppercase tracking-wider text-[#3fb950] bg-[#3fb950]/10 focus:outline-none transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-xs font-semibold uppercase tracking-wider text-gray-400 hover:text-white hover:bg-[#21262d] focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
