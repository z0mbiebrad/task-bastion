<?php

namespace App\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TaskCreate extends Component
{
    public $task;
    public $category;

    protected $rules = [
        'task' => 'required|string|min:3|max:255',
        'category' => 'required|string|min:1|max:255',
    ];

    public function createTask()
    {
        $this->validate();

        Task::create([
            'user_id' => Auth::id(),
            'task' => $this->task,
            'category' => $this->category,
        ]);

        $this->task = '';
        $this->category = '';

        session()->flash('message', 'Task created successfully.');
    }

    public function render()
    {
        return view('livewire.task-create');
    }
}
