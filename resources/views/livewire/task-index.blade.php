<div class="w-11/12 sm:w-2/3 md:w-3/5 lg:w-2/5 mx-auto my-16">

    <div class="my-8">
        <h1 class="text-3xl text-gray-800 dark:text-white">
            Non-negotiables.
        </h1>
        <h3 class="text-lg text-gray-700 dark:text-gray-200">
            Get them done!
        </h3>
    </div>

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

                <div>
                    <strong class="font-medium text-gray-900 dark:text-white"> {{ $task->task }} </strong>

                    <p class="mt-1 text-pretty text-sm text-gray-700 dark:text-gray-200">
                        {{ ucwords($task->category) }}
                    </p>
                    <p class="mt-1 text-pretty text-sm text-gray-700 dark:text-gray-200">
                        {{ $task->daysPerWeek }} days per week
                    </p>
                </div>
            </label>
        </div>
    @endforeach

</div>
