<div
    x-data="{
            inputValue: $wire.entangle('form.task'),
            showFields: $wire.entangle('form.showFields'),
            typing: false,
            timeout: null
        }"
    x-effect="if (!inputValue) {
                    $nextTick(() => showFields = false);
                }"
>
    <form

        class="px-6 py-4 border-b max-w-2xl mx-auto border-neutral-300 dark:border-neutral-700"
        wire:submit.prevent="{{ $submitAction }}"
    >
            <x-task.input
                :formContext="$formContext"
            />

            <x-task.error-message type="form.task"/>

            <div
                x-show="showFields"
            >
                
                <div class="flex justify-between mx-auto gap-4">
                    <x-task.category-input />

                    <x-task.days-a-week
                        :taskDays="$form->taskDays"
                    />
                </div>
                <x-task.custom-category />
                <x-task.custom-days 
                    :formContext="$formContext"
                />
                <x-task.error-message type="form.customCategory"/>
                <x-task.error-message type="form.customTaskDays"/>
            </div>
            <x-task.submit-button :formContext="$formContext" />
    </form>
</div>
