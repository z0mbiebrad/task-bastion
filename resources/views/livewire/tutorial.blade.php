<div class="text-800 dark:text-gray-100 text-lg leading-relaxed">
    @if($tasksCount === 0)
        <div class="space-y-3">
            <div class="flex items-center">
                <p class="text-xl font-semibold text-gray-700 dark:text-gray-50">
                    Welcome to Tasilisk!
                </p>

            </div>
            <p class="text-gray-900 dark:text-gray-300 space-y-3">
                Easily track and complete tasks. Just enter a task in the above box
                <br>
                <span class="font-medium text-gray-800 dark:text-gray-200">
                - example: “Read for 30 minutes” or “Meditate for 10 minutes”
                </span>
                <br>
                Then optionally choose a category or set a schedule:
                <br>
                <span class="font-medium text-gray-800 dark:text-gray-200">
                (If none of the options suit you, there is custom selections)
                </span>
            </p>
        </div>
    @elseif($tasksCount === 1 && !$firstTaskCompleted)
        <p class="text-xl font-semibold text-gray-700 dark:text-gray-50">
            Congratulations!!
        </p>
        <p class="text-gray-900 dark:text-gray-300">
            You've made your first task!
            <br>
            <span class="text-gray-800 dark:text-gray-200">To mark your task as "completed" simply tap it!</span>
        </p>
    @elseif($firstTaskCompleted)
        <p class="text-xl font-semibold text-gray-700 dark:text-gray-50">
            You completed your first task!
        </p>
        <p class="text-gray-900 dark:text-gray-300">
            Way to go!
            <br>
            <span class="text-gray-800 dark:text-gray-200">Theres also a progress bar for you to see how far youve come!</span>
            <br>
            <span
                x-tra
                class="text-gray-800 dark:text-gray-200">Now lets edit a task!</span>
        </p>
    @endif
</div>
