<div 
    x-data="{ showFields: @entangle('form.showFields') }" 
>
    <form wire:submit.prevent="save" class="shadow-md rounded-lg" x-show="showFields">
        <div>
            {{-- Session Messages --}}
            <x-task-create.session-message />

            {{-- Task Input --}}
            <div class="mb-4">
                <label
                    for="task" 
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2"
                >
                    Non-Negotiable
                </label>
                <input 
                    wire:model.blur='form.task' 
                    autocomplete="off"
                    type="text" 
                    id="task"
                    class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 placeholder-gray-100"
                    required 
                />
            </div>
        
            {{-- Task Input Error --}}
            <x-task-create.error-message type="task"/>

            <div class="flex justify-between items-center gap-x-4">
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
                
                        
                {{-- Category Input Error --}}  
                <x-task-create.error-message type="category"/>
                
                {{-- Custom Category --}}
                <template x-if="$wire.form.category === 'custom'" class="w-full">
                    <div class="mb-4">
                        <label 
                            for="category" 
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                        >
                            Custom Category
                        </label>
                        <input 
                            wire:model="category" 
                            type="text" 
                            id="category"
                            class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter category..." 
                            required 
                        />
                    </div>
                </template>

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
                            :disabled="$wire.form.daysPerWeek <= 0"
                        >
                            &minus;
                        </button>
                    
                        <input
                            wire:model.lazy="form.daysPerWeek" 
                            type="number"
                            id="Quantity"
                            class="h-10 w-16 border-transparent text-center [-moz-appearance:_textfield] sm:text-sm dark:bg-gray-700 dark:text-white [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none"
                        />
                    
                        <button
                            wire:click="increment"
                            type="button"
                            class="rounded-r-lg size-10 leading-10 text-gray-600 bg-gray-600 transition hover:opacity-75 dark:text-gray-300"
                            :disabled="$wire.form.daysPerWeek >= 7"
                        >
                            &plus;
                        </button>
                    </div>
                </div>
            </div>

            <x-task-create.error-message type="daysPerWeek"/>

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
                    @foreach ($form->days as $day)
                        <x-task-create.days-checkbox :day="$day" :daysOfWeek="$form->daysOfWeek"/>
                    @endforeach
                </div>
                <div class="text-blue-400 my-4">
                    {{ count($form->daysOfWeek) . ' out of ' . $form->daysPerWeek . ' days selected.' }}
                </div>
            </div>

            <x-task-create.error-message type="daysOfWeek"/>

            <div class="text-right">
                <button
                    :disabled="$wire.form.task.trim() === ''"
                    type="submit"
                    class="disabled:bg-blue-200 disabled:hover:bg-blue-200 px-4 py-2 my-4 bg-blue-600 dark:bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 dark:hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                >
                    Submit
                </button>
            </div>

        </div>
    </form>
</div>
