<div
    x-data="{ progress: $wire.entangle('progress').live }"
    wire:model="tasks"
>
    <x-progress-text :progress="$progress" />

    <div
        x-show="progress > 0"
    >
        <span
            role="progressbar"
            aria-labelledby="ProgressLabel"
            aria-valuenow="{{ $progress }}"
            class="relative block rounded-full bg-gray-200 dark:bg-gray-700"
        >
            <span class="absolute inset-0 flex items-center justify-center text-[10px]/4">
              <span class="font-bold text-white"> {{ $progress }}% </span>
            </span>
            <span class="block h-4 rounded-full bg-green-600 text-center" style="width: {{ $progress }}%"></span>
        </span>
    </div>
</div>
