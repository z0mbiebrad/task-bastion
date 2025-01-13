<div 
    class="mb-4"
    :class="{ 'w-1/3': $wire.form.category === 'custom', 'w-full': $wire.form.category !== 'custom' }"
>
    <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
        Task Category
    </label>
    <select
        wire:model="form.category" 
        id="category"
        class="mt-1 block w-full px-4 py-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
    >
        <option value="" selected class="px-2">Select a category</option>
        <option value="personal">Personal</option>
        <option value="health">Health</option>
        <option value="finance">Finance</option>
        <option value="career">Career</option>
        <option value="school">School</option>
        <option value="home">Home</option>
        <option value="custom">Custom</option>
    </select>
</div>