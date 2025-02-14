<?php

namespace App\Livewire;

use App\Livewire\Forms\TaskForm;
use App\Models\GuestTask;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class TaskEdit extends Component
{
    public TaskForm $form;
    public string $formContext = 'edit';
    public GuestTask|Task $task;


    public function mount($taskID): void
    {
        $this->task = Auth::check() ? Task::findOrFail($taskID) : GuestTask::findOrFail($taskID);
        
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
