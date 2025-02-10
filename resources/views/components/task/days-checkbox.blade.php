<div class="flex items-center">
    <input 
        type="checkbox" 
        id="{{$formContext}}-{{ $day }}" 
        value="{{ $day }}" 
        wire:model="form.customTaskDays" 
        class="form-checkbox h-4 w-4 text-blue-600 transition duration-150 ease-in-out border-gray-300 dark:border-gray-600"
    >
    <label for="{{$formContext}}-{{ $day }}" class="ml-1 text-gray-900 dark:text-gray-200">
        {{ ucwords(substr($day,0,1)) }}
    </label>
</div>