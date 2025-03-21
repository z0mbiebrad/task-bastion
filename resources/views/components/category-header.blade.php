    <div class="my-8">
        @if ($category)
            <span class="flex items-center max-w-2xl mx-auto">
                <span class="flex-1 h-px max-w-2xl bg-zinc-700 dark:bg-zinc-200"></span>
                <span class="px-6 text-2xl shrink-0 dark:text-zinc-200">
                    {{ ucwords($category) }}
                </span>
                <span class="flex-1 h-px max-w-2xl bg-zinc-700 dark:bg-zinc-200"></span>
            </span>
        @endif

        @if (!$category)
            <span class="flex items-center max-w-2xl mx-auto">
                <span class="flex-1 h-px max-w-2xl bg-zinc-700 dark:bg-zinc-200"></span>
                <span class="px-6 text-2xl shrink-0 dark:text-zinc-200">
                    Uncategorized
                </span>
                <span class="flex-1 h-px max-w-2xl bg-zinc-700 dark:bg-zinc-200"></span>
            </span>
        @endif
    </div>