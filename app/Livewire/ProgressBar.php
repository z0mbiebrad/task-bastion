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
    public $tasks = [];
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

    #[On('today-tasks')]
    public function setTasks($tasks)
    {
        $this->tasks = Task::hydrate($tasks);
        $completed = $this->completedTasks();
        if($this->tasks->count() === 0){
            $this->progress = 0;
        } else {
            $this->progress = $completed->count() / $this->tasks->count() * 100;
        }
    }

    #[On(['task-completed', 'task-created', 'task-deleted'])]
    public function mount(): void
    {
        $cachedTasks = session()->get('today_tasks', []); // Fetch tasks from session
        $this->setTasks($cachedTasks); // Call setTasks to handle initialization
    }

}
