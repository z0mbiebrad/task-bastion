<div 
    x-show="showFields"
    x-transition:enter.duration.500ms
    x-transition:leave.duration.0ms
>
    <div class="text-blue-400 text-center my-4">
        (Optional)
    </div>
    <div class="flex justify-between items-center gap-x-4">

        {{ $categories }}

        {{ $daysPerWeek }}

    </div>

        {{ $daysOfWeek }}
        
</div>