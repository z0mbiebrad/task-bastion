<?php

namespace App\Livewire;

use App\Livewire\Forms\TaskForm;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class TaskCreate extends Component
{
    public ?string $message = null;
    #[Reactive]
    public int $tutorialStep;
    public TaskForm $form;
    public string $formContext = 'create';

    public function mount($tutorialStep)
    {
        $this->tutorialStep = $tutorialStep;
    }

    public function createTask(): void
    {
        $this->form->save();
        $this->dispatch('task-created');
        $this->dispatch('task-message', 'Task created successfully!');
        $this->dispatch('form-submitted');
    }
}
