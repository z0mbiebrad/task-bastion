<?php

namespace App\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Reactive;
use Livewire\Attributes\Validate;
use Livewire\Component;

use function Laravel\Prompts\clear;

class TaskCreate extends Component
{   
    public $task = '';
    public $category = '';
    public $customCategory = '';
    public $daysPerWeek = '';

    protected $rules = [
        'task' => 'required|string|min:3|max:255',
        'category' => 'required|string|min:1|max:255',
        'customCategory' => 'string|min:1|max:255',
        'daysPerWeek' => 'required',
    ];

    public function createTask()
    {
        $finalCategory = $this->category === 'custom' ? $this->customCategory : $this->category;

        $this->validate();

        Task::create([
            'user_id' => Auth::id(),
            'task' => $this->task,
            'category' => $finalCategory,
            'daysPerWeek' => $this->daysPerWeek,
        ]);

        $this->clearInput();

        session()->flash('message', 'Task created successfully.');
    }
    
    public function clearInput()
    {
        $this->task = '';
        $this->category = '';
        $this->customCategory = '';
        $this->daysPerWeek = '';
    }

    public function render()
    {
        return view('livewire.task-create');
    }
}
