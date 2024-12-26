<div x-data="{ category: '' }" class="flex justify-center mt-24 bg-gray-100 dark:bg-gray-900">
    <form wire:submit.prevent="createTask" class="w-2/3 p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">
        <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-200">Create a Task</h2>

        {{-- Session Messages --}}
        @if (session()->has('message'))
            <div 
                x-data="{ show: true }" 
                x-show="show" 
                x-init="setTimeout(() => show = false, 6000)" 
                class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                role="alert"
            >
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
        @endif

        {{-- Task Input --}}
        <div class="mb-4">
            <label for="input1" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Describe your
                Task</label>
            <input wire:model='task' type="text" id="input1"
                class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter your task description" required />
        </div>
        
        {{-- Task Input Error --}}
        @error('task')
        <span class="text-red-600">
            {{$message}}
        </span>
        @enderror

        {{-- Category Input --}}
        <div class="mb-4">
            <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Task Category</label>
            <select
                x-model="category"
                wire:model="category" 
                id="category"
                class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            >
                <option value="" selected>Select a category</option>
                <option value="personal">Personal</option>
                <option value="health">Health</option>
                <option value="finance">Finance</option>
                <option value="career">Career</option>
                <option value="school">School</option>
                <option value="home">Home</option>
                <option value="custom">Custom</option>
            </select>
        </div>

        @error('category')
        <span class="text-red-600">
            {{$message}}
        </span>
        @enderror
        
        {{-- CustomCategory Input --}}
        <template x-if="category === 'custom'">
            <div class="mb-4">
                <label for="customCategory" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Custom Category</label>
                <input wire:model="customCategory" type="text" id="customCategory"
                    class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Enter your custom category" required />
            </div>
        </template>

        {{-- Days per week Input --}}
        <div class="mb-4">
            <label for="daysPerWeek" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Days Per Week</label>
            <select
                wire:model="daysPerWeek" 
                class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            >
                <option value="" selected>How many days per week?</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>
        </div>

        @error('customCategory')
        <span class="text-red-600">
            {{$message}}
        </span>
        @enderror

        <!-- Submit Button -->
        <div class="text-right">
            <button
                wire:dirty.remove.attr="disabled"
                disabled
                type="submit"
                class="disabled:bg-blue-200 disabled:hover:bg-blue-200 px-4 py-2 bg-blue-600 dark:bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 dark:hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
            >
                Submit
            </button>
        </div>
    </form>
</div>
