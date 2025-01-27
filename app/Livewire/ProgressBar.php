<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Task;

class ProgressBar extends Component
{
    public Task $task;
    public int $progress = 0;

    #[Computed]
    public function tasks(): Collection
    {
        return Auth::user()->tasks ?? new Collection();
    }

    #[Computed]
    public function completedTasks(): Collection
    {
        return $this->tasks()->where('completed', true);
    }

    #[On(['task-completed', 'task-created', 'task-deleted'])]
    public function mount(): void
    {
        $tasks = $this->tasks();
        $completed = $this->completedTasks();

        if($tasks->count() === 0){
            $this->progress = 0;
        } else {
            $this->progress = $completed->count() / $tasks->count() * 100;
        }
    }

}
