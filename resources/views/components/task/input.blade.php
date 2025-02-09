<div class="flex mx-auto max-w-3xl flex-col text-neutral-600 dark:text-neutral-300 justify-center bg-white dark:bg-black">
    <label
        x-show="showFields"
        x-transition:enter.duration.500ms
        x-transition:leave.duration.0ms
        for="task"
        for="textInputDefault" 
        class="w-fit pl-0.5 text-sm mt-6 mb-2"
    >
        Task Description
    </label>
    <input
        wire:model.='form.task'
        x-on:input="
            typing = true;
            showFields = true;
            clearTimeout(timeout);
            timeout = setTimeout(() => typing = false, 500)
        "
        id="task"
        type="text" 
        class="w-full rounded-sm border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white placeholder:text-neutral-500 dark:placeholder:text-neutral-300" 
        placeholder="Start typing to add a task." 
        autocomplete="off"
        required
    />
</div>
