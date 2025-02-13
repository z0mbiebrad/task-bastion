@if ($this->toggleEditButton)
    <div class="flex items-center justify-end -mb-6 mt-5 border-t border-neutral-400 rounded-lg max-w-2xl mx-auto">
        <button
            class="inline-block rounded text-neutral-800 dark:text-neutral-200 p-3 text-sm font-medium transition hover:scale-125 hover:shadow-xl focus:outline-none active:text-red-500"
            @if (auth()->check()) wire:click="delete({{ $task->id }})"
    @else
        wire:click="deleteTaskGuest({{ $task->id }})" @endif
            wire:confirm="Are you sure you want to delete this task?">
            <x-svg.trashcan />
        </button>
        <button
            class="flex rounded text-neutral-800 dark:text-neutral-200 p-3 text-sm font-medium transition hover:scale-125 hover:shadow-xl focus:outline-none active:text-blue-500"
            wire:click="editButton({{ $task->id }})">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
            </svg>
            @isset($editing[$task->id])
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                </svg>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            @endisset
        </button>
    </div>
@endif
