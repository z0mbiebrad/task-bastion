<div>
    @if($progress > 0)
        <div>
            <span
                role="progressbar"
                aria-labelledby="ProgressLabel"
                aria-valuenow="{{ $progress }}"
                class="relative block text-right max-w-2xl mx-auto text-neutral-800 dark:text-neutral-200 {{ $tutorialStep === 4 ? 'animate-pulse' : '' }}"
            >
                <span class="block h-2 bg-black dark:bg-white text-center text-[10px]/4" style="width: {{ $progress }}%">
                </span>
                <span>
                    Daily Progress: {{ $progress }}%
                </span>
            </span>
        </div>
    @endif
</div>
