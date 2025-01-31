<?php

namespace App\Traits;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\On;

trait HandlesTasks
{
    #[On(['task-created', 'task-deleted', 'task-completed'])]
    public function loadTasks()
    {
        $this->tasks = Auth::user()->tasks;
    }

    public function delete(Task $task)
    {
        $task->delete();
        $this->toggleEditButton = false;

        $this->dispatch('task-message', "Task deleted successfully!");
        $this->dispatch('task-deleted');
    }

    public function completeTask(Task $task)
    {
        $task->update(['completed' => !$task->completed]);

        if ($task->completed)
        {
            $this->dispatch('task-message', 'Task marked as complete!');
        }
        $this->dispatch('task-completed');
    }
}
