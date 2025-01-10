<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Lazy]
class TaskEdit extends Component
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

    public $taskModel;
    public $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];


    public function mount(Task $task)
    {
        $this->taskModel = $task;
        $this->task = $task->task;
        $this->category = $task->category;
        $this->daysOfWeek = $task->daysOfWeek;
        $this->daysPerWeek = $task->daysPerWeek;
    }

    public function save()
    {
        $this->validate();

        $this->taskModel->update([
            'task' => $this->task,
            'category' => $this->category,
            'daysOfWeek' => $this->daysOfWeek,
            'daysPerWeek' => $this->daysPerWeek,
        ]);
        
        session()->flash('message', 'Task updated successfully!');
    }

    public function increment()
    {
        $this->daysPerWeek++;
    }
 
    public function decrement()
    {
        $this->daysPerWeek--;
    }

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

    public function render()
    {
        return view('livewire.task-edit');
    }
}
