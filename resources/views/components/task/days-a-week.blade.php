<div 
    class="mb-4"
>
    <label for="taskDays" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
        How many days a week?
    </label>
    <select
        wire:model.lazy="form.taskDays" 
        id="taskDays"
        class="mt-1 block w-full px-4 py-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
    >
        <option value="" selected class="px-2">Select how often</option>
        <option value="daily">Everyday</option>
        <option value="weekdays">Weekdays</option>
        <option value="weekends">Weekends</option>
        <option value="custom">Custom</option>
    </select>
</div>

<div
    class="mb-4" 
    x-show="$wire.form.taskDays === 'custom'"
>
    <label for="daysOfWeek" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Days Of Week</label>
    <div class="mt-2 flex items-center justify-between">
        @foreach ($days as $day)
            <x-task.days-checkbox :day="$day" :formContext="$formContext" />
        @endforeach
    </div>
</div>