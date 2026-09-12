@props([
    'currentStep' => 3,
    'steps' => [
        ['number' => 1, 'step' => 'STEP 1', 'title' => 'Meeting Format'],
        ['number' => 2, 'step' => 'STEP 2', 'title' => 'Date & Time'],
        ['number' => 3, 'step' => 'STEP 3', 'title' => 'Your Details'],
    ],
    'interactive' => false,
])

@php
    $totalSteps = count($steps);
    $progressPercent = $totalSteps > 1 ? min(100, max(0, (($currentStep - 1) / ($totalSteps - 1)) * 100)) : 0;
@endphp

<!-- Modern Sleek 3-Step Horizontal Stepper -->
<div class="w-full bg-slate-950/80 border border-slate-800/80 p-6 rounded-2xl shadow-xl backdrop-blur-sm">
    <nav aria-label="Progress">
        <ol class="relative flex items-center justify-between">
            
            <!-- Progression Track Line (aligned cleanly behind node circles at vertical center) -->
            <div class="absolute top-5 left-8 right-8 -translate-y-1/2 h-0.5 bg-slate-800/80 z-0 pointer-events-none" aria-hidden="true">
                <!-- Active Emerald Progress Bar -->
                <div id="stepper-progress-fill" 
                     class="h-full bg-emerald-500 transition-all duration-500" 
                     style="width: {{ $progressPercent }}%;">
                </div>
            </div>

            @foreach($steps as $index => $step)
                @php
                    $stepNum = $step['number'] ?? ($index + 1);
                    $isCompleted = $stepNum < $currentStep;
                    $isActive = $stepNum === $currentStep;
                    $isUpcoming = $stepNum > $currentStep;
                @endphp

                <li class="relative z-10 flex flex-col items-center pointer-events-none select-none">
                    <div class="flex flex-col items-center cursor-default">
                        
                        <!-- Step Circle Node -->
                        @if($isCompleted)
                            <!-- 1. Completed State: Solid emerald green circle with checkmark -->
                            <span class="w-10 h-10 rounded-full bg-emerald-500 text-white flex items-center justify-center ring-4 ring-slate-950 shadow-[0_0_12px_rgba(16,185,129,0.25)] transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                        @elseif($isActive)
                            <!-- 2. Active State: Prominent emerald circle with soft ambient glow -->
                            <span class="w-10 h-10 rounded-full bg-emerald-500 text-white font-bold text-sm flex items-center justify-center ring-4 ring-slate-950 shadow-[0_0_20px_rgba(16,185,129,0.3)] transition-all duration-300 scale-105">
                                {{ $stepNum }}
                            </span>
                        @else
                            <!-- 3. Upcoming State: Muted slate/gray with subtle border -->
                            <span class="w-10 h-10 rounded-full bg-slate-900 border border-slate-700/80 text-slate-400 font-medium text-sm flex items-center justify-center ring-4 ring-slate-950 transition-all duration-300">
                                {{ $stepNum }}
                            </span>
                        @endif

                        <!-- Step Labels (Positioned cleanly below circle to eliminate text intersection) -->
                        <span class="mt-3 text-center">
                            @if($isCompleted)
                                <span class="text-[10px] font-semibold uppercase tracking-wider text-emerald-400/90 block">
                                    {{ $step['step'] ?? ('STEP ' . $stepNum) }}
                                </span>
                                <span class="text-sm font-medium text-white block mt-0.5">
                                    {{ $step['title'] }}
                                </span>
                            @elseif($isActive)
                                <span class="text-[10px] font-semibold uppercase tracking-wider text-white block">
                                    {{ $step['step'] ?? ('STEP ' . $stepNum) }}
                                </span>
                                <span class="text-sm font-medium text-white block mt-0.5">
                                    {{ $step['title'] }}
                                </span>
                            @else
                                <span class="text-[10px] font-semibold uppercase tracking-wider text-slate-500 block">
                                    {{ $step['step'] ?? ('STEP ' . $stepNum) }}
                                </span>
                                <span class="text-sm font-medium text-slate-400 block mt-0.5">
                                    {{ $step['title'] }}
                                </span>
                            @endif
                        </span>

                    </div>
                </li>
            @endforeach

        </ol>
    </nav>
</div>
