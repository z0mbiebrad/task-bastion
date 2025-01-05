<div class="w-11/12 sm:w-2/3 md:w-3/5 lg:w-2/5 mx-auto my-16">
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Non-Negotiables') }}
        </h1>
    </x-slot>

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


    @foreach ($tasks as $task)
        <div class="space-y-2">
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

                        <p class="mt-1 text-pretty text-sm text-gray-700 dark:text-gray-200">
                            {{ ucwords($task->category) }}
                        </p>
                        @if ($task->daysPerWeek > 0)
                            <p class="mt-1 text-pretty text-sm text-gray-700 dark:text-gray-200">
                                {{ $task->daysPerWeek }} days per week
                            </p>
                        @endif
                       
                        <p class="mt-1 text-pretty text-sm text-gray-700 dark:text-gray-200">
                            {{ ucwords(implode(', ', json_decode($task->daysOfWeek))) }}
                        </p>
                    </div>
                    <button 
                        class="text-red-500 dark:text-red-400"
                        wire:click="delete({{ $task }})"
                        wire:confirm="Are you sure you want to delete this task?"
                    >
                        Delete
                    </button>
                </div>
            </label>
        </div>
    @endforeach

</div>
