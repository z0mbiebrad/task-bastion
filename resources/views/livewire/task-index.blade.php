<div class="w-11/12 sm:w-2/3 md:w-3/5 lg:w-2/5 mx-auto my-16">
    <x-slot name="header">
        <livewire:task-create></livewire:task-create>
    </x-slot>

    <x-task.session-message />

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
        @if ($completedMessage && $task->id === $updated)
            <div 
                class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                x-data="{ 
                    show: true, 
                    completedMessage: $wire.entangle('completedMessage').live}" 
                x-show="show" 
                x-init="setTimeout(() => { 
                    show = false; 
                    completedMessage = ''; 
                }, 3000)" 
                role="alert"
            >
                <span class="block sm:inline">{{ $completedMessage }}</span>
            </div>
        @endif

        <div wire:key="{{ $task->id }}">
            <x-task.edit-buttons :task="$task" :editing="$editing"/>
            <label for="{{ $task->id }}"
                class="flex my-4 cursor-pointer items-start gap-4 rounded-lg border border-gray-200 p-4 transition hover:bg-gray-50 has-[:checked]:bg-gray-500 dark:border-slate-500 dark:hover:bg-gray-800 dark:has-[:checked]:bg-gray-700/10 dark:has-[:checked]:border-[#2563eb]">
                <div class="flex items-center">
                    &#8203;
                    <input 
                        type="checkbox"
                        class="size-4 rounded border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:ring-offset-gray-900"
                        id="{{ $task->id }}" 
                        wire:click="completeTask({{$task->id}})"
                        @if($task->completed) checked @endif
                    />
                </div>
                <div class="flex items-center justify-between w-full">
                    <div>
                        <strong 
                            class="font-medium {{ 
                                $task->completed 
                                ? 'line-through text-[#2563eb]' 
                                : 'text-gray-900 dark:text-white' 
                            }}">
                            {{ ucwords($task->task) }} 
                        </strong>
                        @if (!$task->completed)
                            @if ($task->task_days === 'custom'))
                            <p class="mt-1 text-pretty text-sm text-gray-700 dark:text-gray-200">
                                {{ ucwords(implode(', ', $task->custom_task_days)) }}
                            </p>
                            @else
                                <p class="mt-1 text-pretty text-sm text-gray-700 dark:text-gray-200">
                                    {{ ucwords($task->task_days) }}
                                </p>
                            @endif
                        @endif
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
