<?php

namespace App\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TaskIndex extends Component
{
    public $tasks = '';

    public function delete(Task $task)
    {
        $task->delete();
        $this->tasks = Auth::user()->tasks;
    }

    public function mount()
    {
        $this->tasks = Auth::user()->tasks;
    }

    public function render()
    {
        return view('livewire.task-index');
    }
}
