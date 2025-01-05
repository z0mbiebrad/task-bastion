<div 
    x-data="{ inputValue: '', showFields: false, typing: false, timeout: null }" 
>
    <form wire:submit.prevent="createTask" class="shadow-md rounded-lg">
        <div>
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
            
            {{-- Task Input Error --}}
            @error('task')
            <span class="text-red-600">
                {{$message}}
            </span>
            @enderror

            <div 
                x-show="showFields"
                x-transition:enter.duration.500ms
                x-transition:leave.duration.0ms
            >
                <div class="text-blue-400 text-center">
                    (Optional)
                </div>
                <div class="flex justify-between items-center gap-x-4">
                    {{-- Category Input --}}
                    
                    <div class="mb-4 w-full" x-show="$wire.category !== 'custom'">
                        <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Task Category
                        </label>
                        <select
                            wire:model="category" 
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

                    @error('category')
                    <span class="text-red-600">
                        {{$message}}
                    </span>
                    @enderror
                    
                    {{-- CustomCategory Input --}}
                    <template x-if="$wire.category === 'custom'">
                        <div class="mb-4">
                            <label 
                                for="customCategory" 
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                            >
                                Custom Category
                            </label>
                            <input 
                                wire:model="customCategory" 
                                type="text" 
                                id="customCategory"
                                class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Custom category..." 
                                required 
                            />
                        </div>
                    </template>

                    {{-- Days per week Input --}}
                    <div class="mb-4 w-fit">
                        <label
                            for="daysPerWeek" 
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1"
                        >
                            Days Per Week
                        </label>
                            <div class="flex items-center rounded border border-gray-200 dark:border-gray-800">
                                <button
                                    wire:click="decrement"
                                    type="button"
                                    class="rounded-l-lg size-10 leading-10 text-gray-600 bg-gray-600 transition hover:opacity-75 dark:text-gray-300"
                                    :disabled="$wire.daysPerWeek <= 1"
                                >
                                    &minus;
                                </button>
                            
                                <input
                                    wire:model.lazy="daysPerWeek" 
                                    type="number"
                                    id="Quantity"
                                    class="h-10  w-16 border-transparent text-center [-moz-appearance:_textfield] sm:text-sm dark:bg-gray-700 dark:text-white [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none"
                                />
                            
                                <button
                                    wire:click="increment"
                                    type="button"
                                    class="rounded-r-lg size-10 leading-10 text-gray-600 bg-gray-600 transition hover:opacity-75 dark:text-gray-300"
                                    :disabled="$wire.daysPerWeek >= 7"
                                >
                                    &plus;
                                </button>
                            </div>
  
                    </div>
                    @error('daysPerWeek')
                    <span class="text-red-600">
                        {{$message}}
                    </span>
                    @enderror
                </div>
            
                {{-- Days of week Input --}}
                <div
                    class="mb-4" 
                    x-show="$wire.daysPerWeek > 0"
                    x-transition:enter.duration.500ms
                    x-transition:leave.duration.0ms
                >
                    <div class="text-blue-400 text-center">
                        (Optional)
                    </div>
                    <label for="daysOfWeek" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Days Of Week</label>
                    
                    <div class="mt-2 flex items-center justify-between">
                        @foreach ($days as $day)
                            <x-task-create.days-checkbox :day="$day" />
                        @endforeach
                    </div>
                    <div class="text-blue-400">
                        {{ count($daysOfWeek) . ' out of ' . $daysPerWeek . ' days selected.' }}
                    </div>
                </div>

                @error('daysOfWeek')
                <span class="text-red-600">
                    {{$message}}
                </span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="text-right flex justify-between items-center">
                
                <template x-if="$wire.category === 'custom'">
                    <button 
                    wire:click="$set('category', '')"
                    class="text-white flex items-center"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                    </svg>
                        Categories
                    </button>
                </template>

                <div class="flex-grow"></div>

                <button
                    x-show="showFields"
                    x-on:click="showFields = false"
                    wire:click.prevent="createTask"
                    :disabled="$wire.task.trim() === ''"
                    type="submit"
                    class="disabled:bg-blue-200 disabled:hover:bg-blue-200 px-4 py-2 bg-blue-600 dark:bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 dark:hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                >
                    Submit
                </button>
            </div>
        </div>
    </form>
</div>
