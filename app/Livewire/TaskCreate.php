<?php

namespace App\Livewire;

use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Livewire\Attributes\On;
use Livewire\Component;

class TaskCreate extends Component
{   
    public TaskForm $form;
    public $formContext = 'create';

    public function increment()
    {
        $this->form->increment();
    }
 
    public function decrement()
    {
        $this->form->decrement();
    }

    public function updatedDaysPerWeek($value)
    {
        $this->form->updatedDaysPerWeek($value);

        $this->dispatch('updated-days');
    }

    #[On('updated-days')]
    public function updatedDaysOfWeek()
    {
        $this->form->updatedDaysOfWeek();
    }

    public function createTask()
    {
        $this->form->create();
        $this->reset([
            'form.task',
            'form.category',
            'form.daysOfWeek',
            'form.daysPerWeek',
        ]);
        $this->dispatch('task-created');
    }
    
    public function render()
    {
        return view('livewire.task-create');
    }
}
