<header class="  dark:bg-gray-800 shadow">
    <div class="max-w-3xl mx-auto shadow-lg   ">
        <x-task.form
            :submitAction="'createTask'"
            :form="$form"
            :formContext="$formContext"
            :tutorialStep="$tutorialStep"
        >
        </x-task.form>
    </div>
</header>
