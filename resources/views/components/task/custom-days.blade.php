<div 
    x-show="$wire.form.taskDays === 'custom'"
    x-data="{
        options: [
            { value: 'monday', label: 'Monday' },
            { value: 'tuesday', label: 'Tuesday' },
            { value: 'wednesday', label: 'Wednesday' },
            { value: 'thursday', label: 'Thursday' },
            { value: 'friday', label: 'Friday' },
            { value: 'saturday', label: 'Saturday' },
            { value: 'sunday', label: 'Sunday' }
        ],
        isOpen: false,
        openedWithKeyboard: false,
        selectedOptions: $wire.entangle('form.customTaskDays'),
        setLabelText() {
            const count = this.selectedOptions.length;

            // if there are no selected options
            if (count === 0) return 'Please Select';

            // join the selected options with a comma
            return this.selectedOptions.join(', ');
        },
        highlightFirstMatchingOption(pressedKey) {
            // if Enter pressed, do nothing
            if (pressedKey === 'Enter') return

            // find and focus the option that starts with the pressed key
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
        handleOptionToggle(option) {
            if (option.checked) {
                this.selectedOptions.push(option.value)
            } else {
                // remove the unchecked option from the selectedOptions array
                this.selectedOptions = this.selectedOptions.filter(
                    (opt) => opt !== option.value,
                )
            }
        },
    }" 
    class="w-full mb-8 flex flex-col gap-1" x-on:keydown="highlightFirstMatchingOption($event.key)" x-on:keydown.esc.window="isOpen = false, openedWithKeyboard = false">
<label for="skills" class="w-fit pl-0.5 text-base text-neutral-600 dark:text-neutral-300">Select Days</label>
<div x-text="selectedOptions" class="text-white"></div>
{{ $form['customTaskDays'] ?? '' }}
<div class="relative">

    <!-- trigger button  -->
    <button type="button" role="combobox" class="inline-flex w-full items-center justify-center gap-2 whitespace-nowrap shadow-sm dark:shadow-neutral-600 border-neutral-300 bg-neutral-50 px-4 py-2 text-sm font-medium capitalize tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-300 dark:focus-visible:outline-white border rounded-sm" aria-haspopup="listbox" aria-controls="skillsList" x-on:click="isOpen = ! isOpen" x-on:keydown.down.prevent="openedWithKeyboard = true" x-on:keydown.enter.prevent="openedWithKeyboard = true" x-on:keydown.space.prevent="openedWithKeyboard = true" x-bind:aria-label="setLabelText()" x-bind:aria-expanded="isOpen || openedWithKeyboard">
        <span class="text-sm w-full font-normal text-start overflow-hidden text-ellipsis  whitespace-nowrap"  x-text="setLabelText()"></span>
        <!-- Chevron  -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
            <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
        </svg>
    </button>

    <ul x-cloak x-show="isOpen || openedWithKeyboard" id="skillsList" class="absolute z-10 left-0 top-11 flex max-h-44 w-full flex-col overflow-hidden overflow-y-auto border-neutral-300 bg-neutral-50 py-1.5 dark:border-neutral-700 dark:bg-neutral-900 border rounded-sm" role="listbox" x-on:click.outside="isOpen = false, openedWithKeyboard = false" x-on:keydown.down.prevent="$focus.wrap().next()" x-on:keydown.up.prevent="$focus.wrap().previous()" x-transition x-trap="openedWithKeyboard">
        <template x-for="(item, index) in options" x-bind:key="item.value">
            <!-- option  -->
            <li role="option">
                <label class="flex items-center gap-2 px-4 py-3 text-sm font-medium text-neutral-600 hover:bg-neutral-950/5 has-focus:bg-neutral-950/5 dark:text-neutral-300 dark:hover:bg-white/5 dark:has-focus:bg-white/5 has-checked:text-neutral-900 dark:has-checked:text-white has-disabled:cursor-not-allowed has-disabled:opacity-75" x-bind:for="'checkboxOption' + index">
                    <div class="relative flex items-center">
                        <input 
                            type="checkbox" 
                            class="combobox-option before:content[''] peer relative size-4 appearance-none overflow-hidden border border-neutral-300 bg-neutral-50 before:absolute before:inset-0 checked:border-black checked:before:bg-black focus:outline-2 focus:outline-offset-2 focus:outline-neutral-800 checked:focus:outline-black active:outline-offset-0 disabled:cursor-not-allowed dark:border-neutral-700 rounded-sm dark:bg-neutral-900 dark:checked:border-white dark:checked:before:bg-white dark:focus:outline-neutral-300 dark:checked:focus:outline-white" 
                            x-init="selectedOptions = []"
                            x-on:change="handleOptionToggle($el)" 
                            x-on:keydown.enter.prevent="$el.checked = ! $el.checked; handleOptionToggle($el)" 
                            x-bind:value="item.value" 
                            x-bind:id="'checkboxOption' + index" 
                            x-bind:checked="selectedOptions.includes(item.value)"
                        />
                        <!-- Checkmark  -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="4" class="pointer-events-none invisible absolute left-1/2 top-1/2 size-3 -translate-x-1/2 -translate-y-1/2 text-neutral-100 peer-checked:visible dark:text-black" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                        </svg>
                    </div>
                    <span x-text="item.label"></span>
                </label>
            </li>
        </template>
    </ul>
</div>
</div>
