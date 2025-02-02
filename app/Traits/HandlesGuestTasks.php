<?php

namespace App\Traits;

use App\Models\GuestTask;
use Livewire\Attributes\On;

trait HandlesGuestTasks
{
    public function loadGuestTasks()
    {
        $this->guest_id = session('guest_id');

        $this->tasks = GuestTask::where('guest_id', $this->guest_id)->get();

        $this->dispatch('progress-bar');
    }

    public function deleteTaskGuest(GuestTask $task)
    {
        $task->delete();
        $this->toggleEditButton = false;

        $this->dispatch('task-message', "Task deleted successfully!");
        $this->dispatch('task-deleted');
    }

    public function completeTaskGuest(GuestTask $task)
    {
        $task->update(['completed' => !$task->completed]);

        if ($task->completed)
        {
            $this->dispatch('task-message', 'Task marked as complete!');
        }
        $this->dispatch('task-completed');
    }
}
