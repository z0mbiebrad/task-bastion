<div class="mb-4">
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
            :disabled="$wire.daysPerWeek <= 0"
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