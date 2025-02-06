<div>
    @if($progress > 0)
        <div>
            <span
                role="progressbar"
                aria-labelledby="ProgressLabel"
                aria-valuenow="{{ $progress }}"
                class="relative block bg-gray-200 dark:bg-gray-700 {{ $tutorialStep === 4 ? 'animate-pulse' : '' }}"
            >
                <span class="block h-4 bg-gradient-to-r from-green-400 via-green-500 to-green-600 text-center text-[10px]/4" style="width: {{ $progress }}%">
                    <span class="font-bold text-white"> {{ $progress }}% </span>
                </span>
            </span>
        </div>
    @endif
</div>
