<div class="mb-4">
    <label
        x-show="showFields"
        x-transition:enter.duration.500ms
        x-transition:leave.duration.0ms
        for="task" 
        class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-2"
    >
        Describe your non-negotiable
        <span class="block text-gray-500 dark:text-gray-400 text-sm italic mt-1">
            e.g., "Read for 30 minutes" or "Meditate for 10 minutes"
        </span>
    </label>
    <input 
        wire:model.blur='task' 
        x-on:input="
            typing = true; 
            showFields = true;
            clearTimeout(timeout); 
            timeout = setTimeout(() => typing = false, 500)
        "
        autocomplete="off"
        type="text" 
        id="task"
        class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 placeholder-gray-100"
        placeholder="Add a non-negotiable..." 
        required 
    />
</div>