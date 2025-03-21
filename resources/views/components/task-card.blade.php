<label
    for="{{ $task->id }}"
    class="flex items-center w-11/12 max-w-2xl gap-4 p-4 mx-auto my-6 transition border rounded-lg shadow-sm cursor-pointer dark:shadow-neutral-600 text-neutral-800 dark:text-neutral-200 bg-neutral-100 dark:border-neutral-700 dark:bg-zinc-800"
    @click="clicked = true"
>
    <span class="inline-flex items-center">
        <label class="relative flex items-center cursor-pointer">
            <input
                type="checkbox"
                class="w-5 h-5 transition-all border rounded shadow appearance-none cursor-pointer peer hover:shadow-md border-neutral-600 checked:bg-neutral-600 checked:border-slate-800"
                id="{{ $task->id }}"
                wire:click="completeTask({{$task->id}})"
                @if($task->completed) checked @endif
            />
            <span class="absolute text-white transform -translate-x-1/2 -translate-y-1/2 opacity-0 pointer-events-none peer-checked:opacity-100 top-1/2 left-1/2">
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
                <p class="mt-1 text-sm text-gray-700 text-pretty dark:text-gray-200">
                    {{ ucwords(implode(', ', $task->custom_task_days)) }}
                </p>
            @else
                <p class="mt-1 text-sm text-gray-700 text-pretty dark:text-gray-200">
                    {{ ucwords($task->task_days) }}
                </p>
            @endif
        @endif
    </span>
</label>