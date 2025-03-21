<div class="text-right">
    <button
        x-show="showFields"
        :disabled="$wire.form.task.trim() === ''"
        type="submit"
        class="px-4 py-2 text-sm font-medium tracking-wide text-center transition bg-transparent border rounded-sm whitespace-nowrap border-neutral-950 text-neutral-950 hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-950 active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:border-white dark:text-white hover:cursor-pointer hover:scale-110 dark:focus-visible:outline-white"
    >
        @if ($formContext === 'create')
            Create
        @else
            Edit
        @endif
    </button>
</div>
