<?php

namespace App\Livewire;

use App\Traits\HandlesTasks;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class TaskIndex extends Component
{
    use HandlesTasks;

    public Collection $tasks;
    public Collection $todaysTasks;
    public Collection $allTasks;

    public $currentDay;
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

    public function mount()
    {
        if (!session()->has('guest_id')) {
            session(['guest_id' => Str::uuid()->toString()]);
        }
        $this->loadTasks();
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
