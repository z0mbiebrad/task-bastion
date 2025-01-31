<div class="my-8">
    @if ($category)
        <h3 class="text-xl text-gray-700 dark:text-gray-200 border-b-2 border-gray-200 dark:border-gray-700 pb-2">
            {{ ucwords($category) }}
        </h3>
    @endif
    @if (!$category)
        <h3 class="text-xl text-gray-700 dark:text-gray-200 border-b-2 border-gray-200 dark:border-gray-700 pb-2">
            Uncategorized
        </h3>
    @endif
</div>
