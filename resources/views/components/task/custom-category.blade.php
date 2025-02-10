<template x-if="$wire.form.category === 'custom'" class="w-full">
    <div class="flex mx-auto flex-col text-neutral-600 dark:text-neutral-300 justify-center bg-white dark:bg-black">
        <label 
            for="customCategory" 
            class="w-fit pl-0.5 text-base mb-2"
        >
            Custom Category
        </label>
        <input 
            wire:model="form.customCategory" 
            type="text" 
            id="customCategory"
            class="w-full mb-8 shadow-sm dark:shadow-neutral-600 rounded-sm border border-neutral-300 bg-neutral-100 px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-800 dark:focus-visible:outline-white placeholder:text-neutral-500 dark:placeholder:text-neutral-300" 
            placeholder="Enter category..." 
            required 
        />
    </div>
</template>