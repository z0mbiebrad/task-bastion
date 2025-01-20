<div 
    x-data="{ inputValue: '', showFields: @entangle('form.showFields'), typing: false, timeout: null }" 
>
    <form wire:submit.prevent="createTask" class="shadow-md rounded-lg">
        <div>
            {{-- Session Messages --}}
            <x-task-create.session-message />

            {{-- Task Input --}}
            <x-task-create.task-input />
        
            {{-- Task Input Error --}}
            <x-task-create.error-message type="form.task"/>

            <div 
                x-show="showFields"
            >
                <div class="text-blue-400 text-center my-4">
                    (Optional)
                </div>
                    {{-- Category Input --}}
                <x-task-create.category-input />
                
                {{-- Category Input Error --}}  
                <x-task-create.error-message type="form.category"/>
                
                {{-- Custom Category --}}
                <x-task-create.custom-category />

                {{-- Custom Category Error --}}
                <x-task-create.error-message type="form.customCategory"/>

                
                {{-- Days a week Input --}}
                <x-task-create.days-a-week 
                    :days="$form->days" 
                    :taskDays="$form->taskDays"
                    :formContext="$formContext"
                />

                <x-task-create.error-message type="form.taskDays"/>

                <x-task-create.error-message type="form.customTaskDays"/>
            </div>

            <!-- Submit Button -->
            <x-task-create.submit-button />
        </div>
    </form>
</div>
