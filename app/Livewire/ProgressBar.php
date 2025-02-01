<?php

namespace App\Livewire;

use App\Models\GuestTask;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Attributes\Session;
use Livewire\Component;

class ProgressBar extends Component
{
    #[Session]
    public int $progress = 0;
    public array|Collection $tasks = [];

    #[On('progress-bar')]
    public function tasks($tasks)
    {
        if (auth()->check()) {
            $this->tasks = Task::hydrate($tasks);
        } else {
            $this->tasks = GuestTask::hydrate($tasks);
        }

        $this->dispatch('progress')->self();
    }

    #[On('progress')]
    public function progress()
    {
        $totalTasks = $this->tasks->count();
        $completedTasks = $this->tasks->where('completed', true)->count();

        $this->progress = $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0;
    }
}
