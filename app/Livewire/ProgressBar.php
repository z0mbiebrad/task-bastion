<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Session;
use Livewire\Component;
use App\Models\Task;

class ProgressBar extends Component
{
    #[Session]
    public int $progress = 0;
    #[Computed]
    public function tasks()
    {
        return Auth::user()->tasks;
    }

    public function mount()
    {
        if ($this->tasks === 0) {
            $this->progress = 0;
        }
    }

    #[On(['task-created', 'task-completed', 'task-deleted'])]
    public function progress()
    {
        $totalTasks = $this->tasks->count();
        $completedTasks = $this->tasks->where('completed', true)->count();

        $this->progress = $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0;
    }
}
