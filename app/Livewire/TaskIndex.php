<?php

namespace App\Livewire;

use App\Traits\HandlesTasks;
use App\Traits\HandlesGuestTasks;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Session;
use Livewire\Component;

class TaskIndex extends Component
{
    use HandlesTasks;
    use HandlesGuestTasks;

    public array|Collection $tasks = [];

    public string $guest_id = '';
    public array $editing = [];
    public $toggleEditButton = false;
    #[Computed]
    public function groupedTasks()
    {
        return $this->tasks->groupBy(function ($task) {
            return $task->custom_category ?: $task->category;
        });
    }

    #[On(['task-created', 'task-deleted', 'task-completed'])]
    public function determineUser()
    {
        auth()->check() ? $this->loadTasks() : $this->loadGuestTasks();
    }

    public function mount()
    {
        if (!session()->has('guest_id')) {
            session(['guest_id' => Str::uuid()->toString()]);
        }
        $this->determineUser();
    }

    #[On('edit-toggle')]
    public function editToggle()
    {
        $this->toggleEditButton = !$this->toggleEditButton;
    }

    #[On('task-updated')]
    public function editButton($task)
    {
        $this->editing[$task] = !($this->editing[$task] ?? false);
        $this->toggleEditButton = false;
    }
}
