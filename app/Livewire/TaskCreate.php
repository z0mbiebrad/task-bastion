<?php

namespace App\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

use function Laravel\Prompts\clear;

class TaskCreate extends Component
{   

    #[Validate('required|string|min:3|max:255')]
    public $task = '';

    #[Validate('nullable|string|min:1|max:255')]
    public $category = '';

    #[Validate('nullable|string|min:1|max:255')]
    public $customCategory = '';

    #[Validate('nullable|integer|min:0|max:7')]
    public $daysPerWeek = 0;

    #[Validate('nullable|array')]
    public $daysOfWeek = [];
    
    public $showFields = false;

    public $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

    public function updatedDaysPerWeek($value)
    {
        if ($value < 0) {
            $this->daysPerWeek = 1;
            $this->addError('daysPerWeek', "You can't go below 1 day.");
        } elseif ($value > 7) {
            $this->daysPerWeek = 7;
            $this->addError('daysPerWeek', "You can only select up to 7 days.");
        }
    }

    public function updatedDaysOfWeek()
    {
        // Dynamically limit daysOfWeek based on daysPerWeek
        $maxDays = (int) $this->daysPerWeek;
        if ($maxDays && count($this->daysOfWeek) > $maxDays) {
            $this->daysOfWeek = array_slice($this->daysOfWeek, 0, $maxDays);
            $this->addError('daysOfWeek', "You can only select up to {$maxDays} days.");
        }
    }

    public function increment()
    {
        $this->daysPerWeek++;
    }
 
    public function decrement()
    {
        $this->daysPerWeek--;
    }

    public function createTask()
    {
        $this->validate();

        $finalCategory = $this->category === 'custom' ? $this->customCategory : $this->category;

        Task::create([
            'user_id' => Auth::id(),
            'task' => $this->task,
            'category' => $finalCategory,
            'daysPerWeek' => $this->daysPerWeek ?: 0,
            'daysOfWeek' => json_encode($this->daysOfWeek),
        ]);

        $this->clearInput();

        session()->flash('message', 'Task created successfully.');

        $this->dispatch('task-created');
    }
    
    public function clearInput()
    {
        $this->showFields = false;
        $this->task = '';
        $this->category = '';
        $this->customCategory = '';
        $this->daysPerWeek = '';
        $this->daysOfWeek = [];
    }

    public function render()
    {
        return view('livewire.task-create');
    }
}
