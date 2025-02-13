<?php

namespace App\Livewire;

use App\Livewire\Forms\TaskForm;
use App\Models\GuestTask;
use App\Models\Task;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;

#[Lazy]
class TaskEdit extends Component
{
    public TaskForm $form;
    public string $formContext = 'edit';
    public GuestTask|Task $task;


    public function mount($taskID): void
    {
        if (auth()->check()){
            $this->task = Task::findorfail($taskID);
        } else {
            $this->task = GuestTask::findorfail($taskID);
        }
        $this->form->setTask($this->task);
    }

    public function update(): void
    {
        $this->form->save();

        $this->dispatch('task-message', 'Task updated successfully!');
        $this->dispatch('task-updated', $this->form->taskModel->id);
    }

    public function updatedFormTaskDays($value): void
    {
        if ($value !== 'custom') {
            // Reset customTaskDays if taskDays is not "custom"
            $this->form->customTaskDays = [];
        }
    }
}
