<div class="mb-4">
    <div class="flex items-center justify-between">
        <label
        x-show="showFields"
        x-transition:enter.duration.500ms
        x-transition:leave.duration.0ms
        for="task" 
        class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-2"
        >
            Describe your task
            <span class="block text-gray-500 dark:text-gray-400 text-sm italic mt-1">
                e.g., "Read for 30 minutes" or "Meditate for 10 minutes"
            </span>
        </label>
        <!-- Submit Button -->
        <x-task.submit-button />
    </div>
    
    <input 
        wire:model.blur='form.task' 
        x-on:input="
            typing = true; 
            showFields = true;
            clearTimeout(timeout); 
            timeout = setTimeout(() => typing = false, 500)
        "
        autocomplete="off"
        type="text" 
        id="task"
        class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200 border dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 placeholder-gray-100 @error('form.task') required:border-red-500 @enderror"
        placeholder="Add a task" 
        required 
    />
</div>