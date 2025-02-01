<label for="{{ $task->id }}"
       class="flex my-4 cursor-pointer items-start gap-4 rounded-lg border border-gray-200 p-4 transition hover:bg-gray-50 has-[:checked]:bg-gray-500 dark:border-slate-500 dark:hover:bg-gray-800 dark:has-[:checked]:bg-gray-700/10 dark:has-[:checked]:border-green-600/50">
                <span class="flex items-center">
                    &#8203;
                    <input
                        type="checkbox"
                        class="size-4 rounded border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:ring-offset-gray-900 focus:ring-offset-gray-900 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 text-green-600/90"
                        id="{{ $task->id }}"
                        @if(auth()->check())
                            wire:click="completeTask({{$task->id}})"
                        @else
                            wire:click="completeTaskGuest({{$task->id}})"
                        @endif
                        @if($task->completed) checked @endif
                    />
                </span>
    <span class="flex items-center justify-between w-full">
        <span>
            <strong
                class="font-medium {{
                    $task->completed
                    ? 'line-through text-green-600/40'
                    : 'text-gray-900 dark:text-white'
                }}">
                {{ ucwords($task->task) }}
            </strong>
            @if (!$task->completed)
                @if ($task->task_days === 'custom')
                    )
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
    </span>
</label>
