@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'p-3 rounded-lg bg-[#3fb950]/15 border border-[#3fb950]/30 text-[#3fb950] font-medium text-sm flex items-center gap-2']) }}>
        <span>✓</span>
        <span>{{ $status }}</span>
    </div>
@endif
