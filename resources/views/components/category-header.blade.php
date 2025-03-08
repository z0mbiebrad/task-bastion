    <div class="my-8">
        @if ($category)
            <span class="flex items-center max-w-3xl mx-auto">
                <span class="h-px flex-1 bg-neutral-700 dark:bg-neutral-200"></span>
                <span class="shrink-0 px-6 text-2xl dark:text-neutral-200">
                    {{ ucwords($category) }}
                </span>
                <span class="h-px flex-1 bg-neutral-700 dark:bg-neutral-200"></span>
            </span>
        @endif

        @if (!$category)
            <span class="flex items-center max-w-3xl mx-auto">
                <span class="h-px flex-1 bg-neutral-700 dark:bg-neutral-200"></span>
                <span class="shrink-0 px-6 text-2xl dark:text-neutral-200">
                    Uncategorized
                </span>
                <span class="h-px flex-1 bg-neutral-700 dark:bg-neutral-200"></span>
            </span>
        @endif
    </div>