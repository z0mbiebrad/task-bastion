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
    public $daysOfWeek = [];

    protected $rules = [
        'task' => 'required|string|min:3|max:255',
        'category' => 'required|string|min:1|max:255',
        'customCategory' => 'string|min:1|max:255',
        'daysPerWeek' => 'required|integer|min:1|max:7',
        'daysOfWeek' => 'nullable|array',
        'daysOfWeek.*' => 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
    ];

    public function updatedDaysOfWeek()
    {
        // Dynamically limit daysOfWeek based on daysPerWeek
        $maxDays = (int) $this->daysPerWeek;
        if ($maxDays && count($this->daysOfWeek) > $maxDays) {
            $this->daysOfWeek = array_slice($this->daysOfWeek, 0, $maxDays);
            $this->addError('daysOfWeek', "You can only select up to {$maxDays} days.");
        }
    }

    public function createTask()
    {
        $finalCategory = $this->category === 'custom' ? $this->customCategory : $this->category;

        $this->validate();

        Task::create([
            'user_id' => Auth::id(),
            'task' => $this->task,
            'category' => $finalCategory,
            'daysPerWeek' => $this->daysPerWeek,
            'daysOfWeek' => json_encode($this->daysOfWeek),
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
