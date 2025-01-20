<div class="text-right">
    <button
        x-show="showFields"
        :disabled="$wire.form.task.trim() === ''"
        type="submit"
        class="disabled:bg-blue-200 disabled:hover:bg-blue-200 px-4 py-2 my-4 bg-blue-600 dark:bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 dark:hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
    >
        Submit
    </button>
</div>