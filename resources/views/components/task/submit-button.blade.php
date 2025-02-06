<div class="text-right">
    <button
        x-show="showFields"
        x-bind:class="{'animate-pulse': tutorialStep === 2 || tutorialStep === 6}"
        @click="
            if (tutorialStep === 2) {
                $dispatch('set-tutorial-step', [3]);
            } else if (tutorialStep === 6) {
                $dispatch('set-tutorial-step', [7]);
                $dispatch('set-tutorial-complete');
            }
        "
        :disabled="$wire.form.task.trim() === ''"
        type="submit"
        class="disabled:bg-blue-200 disabled:hover:bg-blue-200 px-4 py-2 my-4 bg-gradient-to-tr from-blue-400 via-blue-500 to-blue-400 dark:bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 dark:hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
    >
        @if ($formContext === 'create')
            Create
        @else
            Edit
        @endif
    </button>
</div>
