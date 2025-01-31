<?php

namespace App\Livewire;

use App\Livewire\Forms\TaskForm;
use Livewire\Component;

class TaskCreate extends Component
{
    public ?string $message = null;

    public TaskForm $form;
    public string $formContext = 'create';

    public function createTask(): void
    {
        $this->form->save();
        $this->dispatch('task-created');
        $this->dispatch('task-message', 'Task created successfully!');
    }
}
