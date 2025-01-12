<div
    class="mb-4" 
    x-show="$wire.form.daysPerWeek > 0"
    x-transition:enter.duration.500ms
    x-transition:leave.duration.0ms
>
    <div class="text-blue-400 text-center mt-2 mb-4">
        (Optional)
    </div>
    <label for="daysOfWeek" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Days Of Week</label>
    
    <div class="mt-2 flex items-center justify-between">
        @foreach ($days as $day)
            <x-task-create.days-checkbox :day="$day" />
        @endforeach
    </div>
    <div class="text-blue-400 my-4">
        {{ count($daysOfWeek) . ' out of ' . $daysPerWeek . ' days selected.' }}
    </div>
</div>