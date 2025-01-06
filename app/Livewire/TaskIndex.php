<?php

namespace App\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class TaskIndex extends Component
{
    public $tasks;

    public function delete(Task $task)
    {
        $task->delete();
        $this->tasks = Auth::user()->tasks;
    }

    #[Computed]
    public function groupedTasks()
    {
        return $this->tasks->groupBy('category');
    }

    #[On('task-created')]
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
