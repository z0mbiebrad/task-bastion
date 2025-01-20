<template x-if="$wire.form.category === 'custom'" class="w-full">
    <div class="mb-4">
        <label 
            for="customCategory" 
            class="block text-sm font-medium text-gray-700 dark:text-gray-300"
        >
            Custom Category
        </label>
        <input 
            wire:model="form.customCategory" 
            type="text" 
            id="customCategory"
            class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            placeholder="Enter category..." 
            required 
        />
    </div>
</template>