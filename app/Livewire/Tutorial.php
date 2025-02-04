<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class Tutorial extends Component
{
    #[Reactive]
    public Collection $tasks;
    #[Reactive]
    public int $tasksCount = 0;
    #[Reactive]
    public bool $firstTaskCompleted = false;
    public function mount($tasks, $tasksCount, $firstTaskCompleted)
    {
        $this->tasks = $tasks;
        $this->tasksCount = $tasksCount;
        $this->firstTaskCompleted = $firstTaskCompleted;
    }
}
