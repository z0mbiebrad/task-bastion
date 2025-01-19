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
    public $formContext = 'edit';

    public function mount(Task $task)
    {
       $this->form->setTask($task);
    }

    public function editTask()
    {
        $this->form->save();

        $this->dispatch('task-updated');
    }

    public function render()
    {
        return view('livewire.task-edit');
    }
}
