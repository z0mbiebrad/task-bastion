<?php

namespace App\Livewire;

use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Lazy]
class TaskEdit extends Component
{
    public TaskForm $form;

    public function mount(Task $task)
    {
       $this->form->setTask($task);
    }

    public function save()
    {
        $this->form->update();

        $this->dispatch('task-updated');
    }

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

    public function render()
    {
        return view('livewire.task-edit');
    }
}
