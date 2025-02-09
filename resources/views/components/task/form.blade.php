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

        class="p-4 border-b border-neutral-300 dark:border-neutral-700"
        wire:submit.prevent="{{ $submitAction }}"
    >
            {{-- Task Input --}}
            <x-task.input
                :formContext="$formContext"
            />

            {{-- Task Input Error --}}
            <x-task.error-message type="form.task"/>

            <div
                x-show="showFields"
            >
                
                {{-- Category Input --}}
                <x-task.category-input />

                {{-- Category Input Error --}}
                <x-task.error-message type="form.category"/>

                {{-- Custom Category --}}
                <x-task.custom-category />

                {{-- Custom Category Error --}}
                <x-task.error-message type="form.customCategory"/>


                {{-- Days a week Input --}}
                <x-task.days-a-week
                    :days="$form->days"
                    :taskDays="$form->taskDays"
                    :formContext="$formContext"
                />

                <x-task.error-message type="form.taskDays"/>

                <x-task.error-message type="form.customTaskDays"/>
            </div>
    </form>
</div>
