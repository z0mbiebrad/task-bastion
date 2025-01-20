<?php

namespace App\Livewire;

use App\Livewire\Forms\TaskForm;
use Livewire\Attributes\On;
use Livewire\Component;

class TaskCreate extends Component
{   
    public TaskForm $form;
    public $formContext = 'create';

    public function createTask()
    {
        $this->form->save();
       
        $this->dispatch('task-created');
    }
    
    public function render()
    {
        return view('livewire.task-create');
    }
}
