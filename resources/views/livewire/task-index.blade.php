<div
    x-data="{
        clicked: false,
    }"
>

    <livewire:navigation :$tasks/>

    <livewire:task-create />

    <livewire:progress-bar
        :tasks="$tasks"
        wire:key="{{ now() }}"
    />

    <div class="mx-6">

        <div class="h-8">
            <livewire:task-message></livewire:task-message>
        </div>

        @if($tasks->count() === 0)
            <x-hero />
        @endif

        @foreach ($this->groupedTasks as $category => $tasks)

            <x-category-header :category="$category"/>

            @foreach ($tasks as $task)
                <div wire:key="{{ $task->id }}">

                    <x-task.edit-buttons
                        :task="$task"
                        :editing="$editing"
                    />

                    <x-task-card
                        :task="$task"
                    />

                    @if (($editing[$task->id] ?? false) === true)
                        <livewire:task-edit
                            :taskID="$task->id"
                            :key="$task->id"
                        ></livewire:task-edit>
                    @endif

                </div>
            @endforeach
        @endforeach
    </div>
</div>
