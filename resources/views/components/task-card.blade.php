<label
    for="{{ $task->id }}"
    class="flex my-6 cursor-pointer items-center shadow-sm dark:shadow-neutral-600 gap-4 rounded-lg border text-neutral-800 dark:text-neutral-200 bg-neutral-100 dark:border-neutral-700 dark:bg-neutral-900 w-11/12 max-w-2xl mx-auto p-4 transition"
    @click="if (tutorialStep === 3) { $dispatch('set-tutorial-step', [4]) }; clicked = true"
>
    <span class="inline-flex items-center">
        <label class="flex items-center cursor-pointer relative">
            <input
                type="checkbox"
                class="peer h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-neutral-600 checked:bg-neutral-600 checked:border-slate-800"
                id="{{ $task->id }}"
                @if(auth()->check())
                    wire:click="completeTask({{$task->id}})"
                @else
                    wire:click="completeTaskGuest({{$task->id}})"
                @endif
                @if($task->completed) checked @endif
            />
            <span class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor" stroke-width="1">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
            </span>
        </label>
    </span>

    <span class="w-full">
        <strong
            class="font-medium {{
                $task->completed
                ? 'line-through '
                : ''
            }}">
            {{ ucwords($task->task) }}
        </strong>
        @if (!$task->completed)
            @if ($task->task_days === 'custom')
                <p class="mt-1 text-pretty text-sm text-gray-700 dark:text-gray-200">
                    {{ ucwords(implode(', ', $task->custom_task_days)) }}
                </p>
            @else
                <p class="mt-1 text-pretty text-sm text-gray-700 dark:text-gray-200">
                    {{ ucwords($task->task_days) }}
                </p>
            @endif
        @endif
    </span>
</label>