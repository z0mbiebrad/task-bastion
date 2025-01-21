<div class="w-11/12 sm:w-2/3 md:w-3/5 lg:w-2/5 mx-auto my-16">
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Non-Negotiables') }}
        </h1>
    </x-slot>

    <x-task.session-message />

    <livewire:task-create></livewire:task-create>

    @if ($tasks->isEmpty())
    <div class="my-8">
        <h3 class="text-xl text-gray-700 dark:text-gray-200 border-b-2 border-gray-200 dark:border-gray-700 pb-2 text-center">
            You have no tasks yet, {{ Auth::user()->name }}. Add one above!
        </h3>
    </div>
    @else
    <div class="my-8">
        <h3 class="text-xl text-gray-700 dark:text-gray-200 border-b-2 border-gray-200 dark:border-gray-700 pb-2 text-center">
            Get them done, {{ Auth::user()->name }}! You've got this!
        </h3>
    </div>
    @endif

    @foreach ($this->groupedTasks as $category => $tasks)
        <div class="my-8">
            @if ($category)
            <h3 class="text-xl text-gray-700 dark:text-gray-200 border-b-2 border-gray-200 dark:border-gray-700 pb-2">
                {{ ucwords($category) }}
            </h3>
            @endif
            @if (!$category)
            <h3 class="text-xl text-gray-700 dark:text-gray-200 border-b-2 border-gray-200 dark:border-gray-700 pb-2">
                Uncategorized
            </h3>
            @endif
        </div>
        @foreach ($tasks as $task)
        <div class="space-y-2" wire:key="{{ $task->id }}">
            <label for="{{ $task->id }}"
                class="flex cursor-pointer items-start gap-4 rounded-lg border border-gray-200 p-4 transition hover:bg-gray-50 has-[:checked]:bg-blue-50 dark:border-gray-700 dark:hover:bg-gray-900 dark:has-[:checked]:bg-blue-700/10">
                <div class="flex items-center">
                    &#8203;
                    <input type="checkbox"
                        class="size-4 rounded border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:ring-offset-gray-900"
                        id="{{ $task->id }}" />
                </div>

                <div class="flex items-center justify-between w-full">
                    <div>
                        <strong class="font-medium text-gray-900 dark:text-white">
                            {{ $task->task }} 
                        </strong>
                        @if ($task->task_days === 'custom'))
                            <p class="mt-1 text-pretty text-sm text-gray-700 dark:text-gray-200">
                                {{ ucwords(implode(', ', $task->custom_task_days)) }}
                            </p>
                        @else
                            <p class="mt-1 text-pretty text-sm text-gray-700 dark:text-gray-200">
                                {{ ucwords($task->task_days) }}
                            </p>
                        @endif
                    </div>
                    <div class="gap-x-4 flex items-center">
                        <button 
                            class="text-red-500 dark:text-red-400"
                            wire:click="delete({{ $task->id }})"
                            wire:confirm="Are you sure you want to delete this task?"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                        <button 
                            class="text-blue-500 dark:text-blue-400 flex"
                            wire:click="toggleEdit({{ $task->id }})"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                            @isset($editing[$task->id])
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                            </svg>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                            @endisset
                        </button>
                      
                    </div>
                </div>
            
            </label>
            @if (isset($editing[$task->id]))
            <livewire:task-edit :task="$task" :key="$task->id"></livewire:task-edit>
            @endif
            @if ($task->id === $updated)
                <x-task.update-message :updated="$updated"/>
            @endif
        </div>
        @endforeach
    @endforeach
</div>
