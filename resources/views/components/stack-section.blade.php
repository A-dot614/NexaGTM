<div {{ $attributes->merge(['class' => 'stack-section']) }}>
  <div class="stack-section-header flex items-center gap-3 mb-4">
    <span class="row-icon text-xl">{{ $icon ?? '' }}</span>
    <div class="text-sm font-bold uppercase">{{ $title ?? '' }}</div>
  </div>

  <div class="stack-section-badges flex flex-wrap gap-2">
    {{ $slot }}
  </div>
</div>
