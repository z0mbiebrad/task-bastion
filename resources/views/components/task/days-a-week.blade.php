<div 
    x-data="{
        options: [
            { value: 'daily', label: 'Daily' },
            { value: 'weekdays', label: 'Weekdays' },
            { value: 'weekends', label: 'Weekends' },
            { value: 'custom', label: 'Custom' }
        ],
        isOpen: false,
        openedWithKeyboard: false,
        selectedOption: null,
        selectedValue: $wire.entangle('form.taskDays'),
        setSelectedOption(option) {
            this.selectedValue = option.value
            this.selectedOption = option
            this.isOpen = false
            this.openedWithKeyboard = false
        },
        highlightFirstMatchingOption(pressedKey) {
            const option = this.options.find((item) =>
                item.label.toLowerCase().startsWith(pressedKey.toLowerCase()),
            )
            if (option) {
                const index = this.options.indexOf(option)
                const allOptions = document.querySelectorAll('.combobox-option')
                if (allOptions[index]) {
                    allOptions[index].focus()
                }
            }
        },
        init() {
            this.$watch('selectedValue', (newValue) => {
                if (!newValue) {
                    this.selectedOption = null
                }
            });
        }
    }" 
    class="w-1/2 max-w-xs flex flex-col gap-1 my-8" 
    x-on:keydown="highlightFirstMatchingOption($event.key)" 
    x-on:keydown.esc.window="isOpen = false, openedWithKeyboard = false"
>
    <label
        for="taskDays" 
        class="w-fit pl-0.5 text-base text-neutral-600 dark:text-neutral-300"
    >
        Schedule
    </label>
    <div class="relative">

        <!-- trigger button  -->
        <button type="button" role="combobox" class="inline-flex w-full items-center justify-center gap-2 whitespace-nowrap shadow-sm dark:shadow-neutral-600 border-neutral-300 bg-neutral-50 px-4 py-2 text-sm font-medium capitalize tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-300 dark:focus-visible:outline-white rounded-sm border" aria-haspopup="listbox" aria-controls="industriesList" x-on:click="isOpen = ! isOpen" x-on:keydown.down.prevent="openedWithKeyboard = true" x-on:keydown.enter.prevent="openedWithKeyboard = true" x-on:keydown.space.prevent="openedWithKeyboard = true" x-bind:aria-label="selectedOption ? selectedOption.value : 'Please Select'" x-bind:aria-expanded="isOpen || openedWithKeyboard">
            <span class="text-sm font-normal" x-text="selectedOption ? selectedOption.label : 'Please Select'"></span>
            <!-- Chevron  -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
            </svg>
        </button>

        <ul x-cloak x-show="isOpen || openedWithKeyboard" id="industriesList" class="absolute z-10 left-0 top-11 flex max-h-44 w-full flex-col overflow-hidden overflow-y-auto border-neutral-300 bg-neutral-50 py-1.5 dark:border-neutral-700 dark:bg-neutral-900 rounded-sm border" role="listbox" aria-label="industries list" x-on:click.outside="isOpen = false, openedWithKeyboard = false" x-on:keydown.down.prevent="$focus.wrap().next()" x-on:keydown.up.prevent="$focus.wrap().previous()" x-transition x-trap="openedWithKeyboard">
            <template x-for="(item, index) in options" x-bind:key="item.value">   
                <li class="combobox-option inline-flex justify-between gap-6 bg-neutral-50 px-4 py-2 text-sm text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/5 focus-visible:text-neutral-900 focus-visible:outline-hidden dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white" role="option" x-on:click="setSelectedOption(item)" x-on:keydown.enter="setSelectedOption(item)" x-bind:id="'option-' + index" tabindex="0" >
                    <!-- Label  -->
                    <span x-bind:class="selectedOption == item ? 'font-bold' : null" x-text="item.label"></span>
                    <!-- Screen reader 'selected' indicator  -->
                    <span class="sr-only" x-text="selectedOption == item ? 'selected' : null"></span>
                    <!-- Checkmark  -->
                    <svg x-cloak x-show="selectedOption == item" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2" class="size-4" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                    </svg>
                </li>
            </template>
        </ul>
    </div>
</div>