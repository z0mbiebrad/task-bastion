<div
    x-data="{
        tutorialStep: $wire.entangle('tutorialStep'),
        tutorialStarted: $wire.entangle('tutorialStarted'),
        clicked: false,
    }"
{{--    x-on:tutorial-start="tutorialStarted = true"--}}
>
    <livewire:progress-bar
        :tasks="$tasks"
        :tutorialStep="$tutorialStep"
        wire:key="{{ now() }}"
    />

    <div>

        <div class="h-8">
            <livewire:task-message></livewire:task-message>
        </div>

        <livewire:tutorial :tutorialStep="$tutorialStep"></livewire:tutorial>

        @if($tasks->count() === 0 && !auth()->check() && !$tutorialStarted)
            <x-hero />
        @endif

        @foreach ($this->groupedTasks as $category => $tasks)

            <x-category-header :category="$category"/>

            @foreach ($tasks as $task)
                <div wire:key="{{ $task->id }}">

                    <x-task.edit-buttons
                        :task="$task"
                        :tutorialStep="$tutorialStep"
                        :editing="$editing"
                    />

                    <x-task-card
                        :task="$task"
                        :tutorialStep="$tutorialStep"
                    />

                    @if (($editing[$task->id] ?? false) === true)
                        <livewire:task-edit
                            :taskID="$task->id"
                            :tutorialStep="$tutorialStep"
                            :key="$task->id"
                        ></livewire:task-edit>
                    @endif

                </div>
            @endforeach
        @endforeach
    </div>
</div>
