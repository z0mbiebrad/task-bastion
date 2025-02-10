<div class="text-right">
    <button
        x-show="showFields"
        :disabled="$wire.form.task.trim() === ''"
        type="submit"
        class="whitespace-nowrap bg-transparent rounded-sm border border-neutral-950 px-4 py-2 text-sm font-medium tracking-wide text-neutral-950 transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-950 active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:border-white dark:text-white dark:focus-visible:outline-white"
    >
        @if ($formContext === 'create')
            Create
        @else
            Edit
        @endif
    </button>
</div>
