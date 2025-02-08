<div class="">
    <div class="flex items-center justify-between">
        <label
        x-show="showFields"
        x-transition:enter.duration.500ms
        x-transition:leave.duration.0ms
        for="task"
        class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-2"
        >
            Describe your task
        </label>
        <!-- Submit Button -->
        <x-task.submit-button :formContext="$formContext"/>
    </div>

    <input
        wire:model.='form.task'
        x-on:input="
            typing = true;
            showFields = true;
            clearTimeout(timeout);
            timeout = setTimeout(() => typing = false, 500)
        "
        x-bind:class="{
                'animate-bounce': tutorialStep === 1 && inputValue === '',
            }"
        autocomplete="off"
        type="text"
        id="task"
        class="py-1 px-2 block w-full bg-gradient-to-br from-gray-200 to-white dark:bg-gray-700 text-gray-900 dark:text-gray-200 border dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 placeholder:text-black/80 dark:placeholder-gray-100 @error('form.task') required:border-red-500 @enderror"
        placeholder="Add a task"
        required
    />
</div>
