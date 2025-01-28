<div
    x-data="{
        progress: $wire.entangle('progress').live,
        show: true
    }"
    wire:model="$this->tasks"
    x-init="setTimeout(() => show=false, 6000)"
>
    @if (empty($this->tasks))
        <div class="">
            <h3 class="text-xl text-gray-700 dark:text-gray-200 border-b-2 border-gray-200 dark:border-gray-700 pb-2">
                You have no tasks yet, {{ Auth::user()->name }}. Add one above!
            </h3>
        </div>
    @elseif ($progress === 100)
        <div class="">
            <h3 class="text-xl text-gray-700 dark:text-gray-200 pb-2">
                Way to go! {{ Auth::user()->name }}! You did all your tasks!
            </h3>
        </div>
    @elseif ($progress >= 50)
        <div class="">
            <h3 class="text-xl text-gray-700 dark:text-gray-200 pb-2">
                Keep it up! {{ Auth::user()->name }}! You're on your way!
            </h3>
        </div>
    @else
        <div class="">
            <h3 class="text-xl text-gray-700 dark:text-gray-200 border-b-2 border-gray-200 dark:border-gray-700 pb-2">
                Get them done, {{ Auth::user()->name }}! You've got this!
            </h3>
        </div>
    @endif
    <div
        x-show="progress > 0"
    >
        <span id="ProgressLabel" class="sr-only">Loading</span>

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
