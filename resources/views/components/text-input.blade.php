@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'neomorph-input text-white placeholder-gray-500 rounded-xl transition text-sm']) }}>
