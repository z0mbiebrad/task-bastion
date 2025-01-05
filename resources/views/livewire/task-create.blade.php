<div 
    x-data="{ inputValue: '', showFields: false, typing: false, timeout: null }" 
>
    <form wire:submit.prevent="createTask" class="shadow-md rounded-lg">
        <div>
            {{-- Session Messages --}}
            <x-task-create.session-message />

            {{-- Task Input --}}
            <x-task-create.task-input />
        
            {{-- Task Input Error --}}
            <x-task-create.error-message type="task"/>
            
            {{-- Optional Inputs --}}
            <x-task-create.optional-inputs>

                <x-slot:categories>

                    {{-- Category Input --}}
                    <x-task-create.category-input />
                    
                    {{-- Category Input Error --}}  
                    <x-task-create.error-message type="category"/>
                    
                    {{-- Custom Category --}}
                    <x-task-create.custom-category />
                    
                </x-slot>

                <x-slot:daysPerWeek>
                    
                    {{-- Days Per Week Input --}}
                    <x-task-create.days-per-week />
                    
                    {{-- Days Per Week Input Error --}}
                    <x-task-create.error-message type="daysPerWeek"/>

                </x-slot>

                <x-slot:daysOfWeek>
                
                    {{-- Days of week Input --}}
                    <x-task-create.days-of-week 
                        :days="$days" 
                        :daysOfWeek="$daysOfWeek" 
                        :daysPerWeek="$daysPerWeek"
                    />

                    <x-task-create.error-message type="daysOfWeek"/>

                </x-slot>

            </x-task-create.optional-inputs>

            <!-- Submit Button -->
            <x-task-create.submit-button />

        </div>
    </form>
</div>
