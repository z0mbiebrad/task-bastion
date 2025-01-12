<?php

namespace App\Livewire\Forms;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TaskForm extends Form
{
    #[Validate('required|string|min:3|max:255')]
    public $task = '';

    #[Validate('nullable|string|min:1|max:255')]
    public $category = '';

    #[Validate('nullable|integer|min:0|max:7')]
    public $daysPerWeek = 0;

    #[Validate('nullable|array')]
    public $daysOfWeek = [];
    
    public $showFields = false;
    public $taskModel;
    public $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

    public function increment()
    {
        $this->daysPerWeek++;
        $this->updatedDaysPerWeek($this->daysPerWeek); 
    }
 
    public function decrement()
    {
        $this->daysPerWeek--;
        $this->updatedDaysPerWeek($this->daysPerWeek); 
    }

    public function updatedDaysPerWeek($value)
    {
        if ($value === 0) {
            $this->daysOfWeek = [];
        } elseif ($value < 0) {
            $this->daysPerWeek = 0;
        } elseif ($value > 7) {
            $this->daysPerWeek = 7;
        }
    }

    public function updatedDaysOfWeek()
    {
        // Dynamically limit daysOfWeek based on daysPerWeek
        $maxDays = (int) $this->daysPerWeek;
        if (count($this->daysOfWeek) > $maxDays) {
            $this->daysOfWeek = array_slice($this->daysOfWeek, 0, $maxDays);
            $this->addError('daysOfWeek', "You can only select up to {$maxDays} daasdasys.");
        }
    }

    public function setTask(Task $task)
    {
        $this->taskModel = $task;
        $this->task = $task->task;
        $this->category = $task->category;
        $this->daysOfWeek = $task->daysOfWeek;
        $this->daysPerWeek = $task->daysPerWeek;
    }

    public function create()
    {
        $this->validate();

        Task::create([
            'user_id' => Auth::id(),
            'task' => $this->task,
            'category' => $this->category,
            'daysPerWeek' => $this->daysPerWeek,
            'daysOfWeek' => $this->daysOfWeek,
        ]);

        $this->showFields = false;

        session()->flash('message', 'Task created successfully.');
    }

    public function update()
    {
        $this->validate();

        if (count($this->daysOfWeek) !== $this->daysPerWeek) {
            $this->addError('daysOfWeek', "You must select exactly {$this->daysPerWeek} days.");
            return;
        }

        $this->taskModel->update([
            'task' => $this->task,
            'category' => $this->category,
            'daysOfWeek' => $this->daysOfWeek,
            'daysPerWeek' => $this->daysPerWeek,
        ]);
        
        session()->flash('message', 'Task updated successfully!');
    }
}
