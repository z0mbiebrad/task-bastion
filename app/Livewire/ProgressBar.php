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
    public Collection $tasks;

    public function mount(Collection $tasks)
    {
        $this->tasks = $tasks;
        $this->progress();
    }

    #[On('progress-bar')]
    public function progress()
    {
        $totalTasks = $this->tasks->count();
        $completedTasks = $this->tasks->where('completed', true)->count();

        $this->progress = $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0;
    }
}
