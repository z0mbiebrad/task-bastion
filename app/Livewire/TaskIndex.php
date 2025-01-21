<?php

namespace App\Livewire;

use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class TaskIndex extends Component
{
    public $tasks;
    public $editing = [];
    public $updated = null;

    #[Computed]
    public function groupedTasks()
    {
        return $this->tasks->groupBy(function ($task) {
            // Use 'custom_category' if it exists, otherwise fall back to 'category'
            return $task->custom_category ?: $task->category;
        });
    }

    #[On('task-updated')]
    public function toggleEdit($task)
    {
        if (isset($this->editing[$task])) {
            unset($this->editing[$task]);
        } else {
            $this->editing[$task] = true;
        }
    }

    public function delete(Task $task)
    {
        $task->delete();
        $this->tasks = Auth::user()->tasks;
        $this->groupedTasks;
    }

    #[On('update-message')]
    public function editMessage($task)
    {
        $this->updated = $task;
        session()->flash("update-message", 'Task updated successfully!');
    }

    #[On('task-created', 'task-updated')]
    public function mount()
    {
        $this->tasks = Auth::user()->tasks;
        $this->groupedTasks;
    }

    public function render()
    {
        return view('livewire.task-index');
    }
}
