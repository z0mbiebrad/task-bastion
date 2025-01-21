<div 
    x-data="{ inputValue: '', showFields: @entangle('form.showFields'), typing: false, timeout: null }" 
>
    <form wire:submit.prevent="{{ $submitAction }}" class="shadow-md rounded-lg">
        <div>
            {{-- Session Messages --}}
            <x-task.session-message />

            {{-- Task Input --}}
            <x-task.input :formContext="$formContext"/>
        
            {{-- Task Input Error --}}
            <x-task.error-message type="form.task"/>

            <div 
                x-show="showFields"
            >
                <div class="text-blue-400 text-center my-4">
                    (Optional)
                </div>
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

            <!-- Submit Button -->
            <x-task.submit-button />
        </div>
    </form>
</div>
