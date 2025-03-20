    <div class="my-8">
        @if ($category)
            <span class="flex items-center">
                <span class="max-w-2xl flex-1 bg-neutral-700 dark:bg-neutral-200"></span>
                <span class="shrink-0 px-6 text-2xl dark:text-neutral-200">
                    {{ ucwords($category) }}
                </span>
                <span class="max-w-2xl flex-1 bg-neutral-700 dark:bg-neutral-200"></span>
            </span>
        @endif

        @if (!$category)
            <span class="flex items-center">
                <span class="max-w-2xl flex-1 bg-neutral-700 dark:bg-neutral-200"></span>
                <span class="shrink-0 px-6 text-2xl dark:text-neutral-200">
                    Uncategorized
                </span>
                <span class="max-w-2xl flex-1 bg-neutral-700 dark:bg-neutral-200"></span>
            </span>
        @endif
    </div>