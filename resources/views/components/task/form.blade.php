<div
    x-data="{
            inputValue: $wire.entangle('form.task'),
            showFields: $wire.entangle('form.showFields'),
            tutorialStep: $wire.entangle('tutorialStep'),
            typing: false,
            dispatched: false,
            formSubmitted: false,
            timeout: null
        }"
    x-on:form-submitted="formSubmitted = true"
    x-effect="
        if (typing && !dispatched && tutorialStep === 1) {
            $dispatch('set-tutorial-step', [2]);
            dispatched = true;
        } else if (inputValue === '') {
            showFields = false;
        }
    "
    class="p-4 bg-gradient-to-r from-white to-gray-200"
>
    <form
        wire:submit.prevent="{{ $submitAction }}"
    >
        <div>
            {{-- Task Input --}}
            <x-task.input
                :formContext="$formContext"
                :tutorialStep="$tutorialStep"
            />

            {{-- Task Input Error --}}
            <x-task.error-message type="form.task"/>

            <div
                x-show="showFields"
            >
                @if ($tutorialStep === 2)
                    <div class="text-blue-400 text-center mt-4">
                        (Optional)
                    </div>
                @endif
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
        </div>
    </form>
</div>
