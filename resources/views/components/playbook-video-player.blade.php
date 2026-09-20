@props([
    "playbook" => null,
    "videoUrl" => null,
    "aspect" => "aspect-video",
    "class" => "",
    "autoplay" => false,
    "showBadge" => true,
])

@php
    $embed = null;
    if ($playbook && is_object($playbook)) {
        $embed = $playbook->video_embed;
    } elseif ($videoUrl) {
        $tempPlaybook = new \App\Models\Playbook(["video_url" => $videoUrl]);
        $embed = $tempPlaybook->video_embed;
    }
@endphp

@if($embed)
    <div class="relative w-full {{ $aspect }} overflow-hidden rounded-2xl bg-black border border-[#30363d] shadow-2xl group/player {{ $class }}">
        @if($showBadge && !empty($embed["platform"]))
            <div class="absolute top-3 right-3 z-20 pointer-events-none flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-[#0d1117]/85 backdrop-blur-md border border-[#30363d] text-[10px] font-mono font-bold tracking-wider text-[#8a9e8a] shadow-lg">
                <span class="w-1.5 h-1.5 rounded-full bg-[#3fb950] animate-pulse"></span>
                <span>{{ $embed["platform"] }}</span>
            </div>
        @endif

        @if($embed["type"] === "iframe")
            <iframe
                src="{{ $embed["src"] }}{{ $autoplay ? (str_contains($embed["src"], "?") ? "&autoplay=1" : "?autoplay=1") : "" }}"
                class="w-full h-full border-0 absolute inset-0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; webkitallowfullscreen; mozallowfullscreen"
                allowfullscreen
                loading="lazy">
            </iframe>
        @else
            <video
                controls
                playsinline
                preload="metadata"
                class="w-full h-full object-cover absolute inset-0 bg-black">
                <source src="{{ $embed["src"] }}">
                <p class="text-xs text-white p-4">Your browser does not support the video tag. <a href="{{ $embed["src"] }}" class="text-[#3fb950] underline">Download video</a></p>
            </video>
        @endif
    </div>
@endif
