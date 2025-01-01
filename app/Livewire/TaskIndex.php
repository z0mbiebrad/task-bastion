<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TaskIndex extends Component
{
    public $tasks = '';

    public function mount()
    {
        $this->tasks = Auth::user()->tasks;
    }

    public function render()
    {
        return view('livewire.task-index');
    }
}
