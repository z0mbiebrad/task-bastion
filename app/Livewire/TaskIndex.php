<?php

namespace App\Livewire;

use App\Models\Task;
use App\Traits\HandlesTasks;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Session;
use Livewire\Component;

class TaskIndex extends Component
{
    use HandlesTasks;

    #[Session]
    public array|Collection $taskList = [];
    public $tasks;
    public $editing = [];
    public $toggleEditButton = false;
    #[Computed]
    public function groupedTasks()
    {
        return $this->tasks->groupBy(function ($task) {
            return $task->custom_category ?: $task->category;
        });
    }

    public function mount()
    {
        $this->loadTasks();
    }

    #[On('edit-toggle')]
    public function editToggle()
    {
        $this->toggleEditButton = !$this->toggleEditButton;
    }

    #[On('task-updated')]
    public function editButton($task)
    {
        $this->editing[$task] = !($this->editing[$task] ?? false);
        $this->toggleEditButton = false;
    }
}
