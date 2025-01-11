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

        $finalCategory = $this->category === 'custom' ? $this->customCategory : $this->category;

        if (count($this->daysOfWeek) !== $this->daysPerWeek) {
            $this->addError('daysOfWeek', "You must select exactly {$this->daysPerWeek} days.");
            return;
        }

        $this->taskModel->update([
            'task' => $this->task,
            'category' => $finalCategory,
            'daysOfWeek' => $this->daysOfWeek,
            'daysPerWeek' => $this->daysPerWeek,
        ]);
        
        session()->flash('message', 'Task updated successfully!');

        $this->dispatch('task-updated');
    }

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

        $this->dispatch('updated-days');
    }

    #[On('updated-days')]
    public function updatedDaysOfWeek()
    {
        // Dynamically limit daysOfWeek based on daysPerWeek
        $maxDays = (int) $this->daysPerWeek;
        if (count($this->daysOfWeek) > $maxDays) {
            $this->daysOfWeek = array_slice($this->daysOfWeek, 0, $maxDays);
            $this->addError('daysOfWeek', "You can only select up to {$maxDays} daasdasys.");
        }
    }

    public function render()
    {
        return view('livewire.task-edit');
    }
}
