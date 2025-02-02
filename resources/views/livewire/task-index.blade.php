<div class="w-11/12 sm:w-2/3 md:w-3/5 lg:w-2/5 mx-auto">
    <x-slot name="header">
        <livewire:task-create></livewire:task-create>
    </x-slot>

    <livewire:task-message></livewire:task-message>

{{--    <livewire:progress-bar></livewire:progress-bar>--}}

    <livewire:progress-bar :tasks="$tasks" wire:key="{{ now() }}" />

    @foreach ($this->groupedTasks as $category => $tasks)

        <x-category-header :category="$category" />

        @foreach ($tasks as $task)
        <div wire:key="{{ $task->id }}">

            <x-task.edit-buttons :task="$task" :editing="$editing"/>

            <x-task-card :task="$task" />

            @if (($editing[$task->id] ?? false) === true)
            <livewire:task-edit :taskID="$task->id" :key="$task->id"></livewire:task-edit>
            @endif

        </div>
        @endforeach
    @endforeach
</div>
