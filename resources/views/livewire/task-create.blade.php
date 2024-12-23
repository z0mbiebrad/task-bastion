<div class="flex justify-center mt-24 bg-gray-100 dark:bg-gray-900">
    <form wire:submit.prevent="createTask" class="w-2/3 p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">
        <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-200">Create a Task</h2>

        @if (session()->has('message'))
            <div 
                x-data="{ show: true }" 
                x-show="show" 
                x-init="setTimeout(() => show = false, 3000)" 
                class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                role="alert"
            >
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
        @endif

        <!-- First Text Input -->
        <div class="mb-4">
            <label for="input1" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Describe your
                Task</label>
            <input wire:model='task' type="text" id="input1"
                class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter your task description" required />
        </div>

        <!-- Second Text Input -->
        <div class="mb-4">
            <label for="input2" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Task
                Category</label>
            <input wire:model='category' type="text" id="input2"
                class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter your task category" required />
        </div>

        <!-- Submit Button -->
        <div class="text-right">
            <button type="submit"
                class="px-4 py-2 bg-blue-600 dark:bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 dark:hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Submit
            </button>
        </div>
    </form>
</div>
