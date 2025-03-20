<?php

namespace App\Traits;

use App\Models\GuestTask;
use App\Models\Task;
use Carbon\WeekDay;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

use function Termwind\ask;

trait HandlesTasks
{
    #[On(['task-created', 'task-deleted', 'task-completed'])]
    public function loadTasks()
    {
        $this->currentDay = strtolower(now()->format('l'));

        $this->allTasks = Auth::check()
            ? auth()->user()->tasks
            : GuestTask::where('guest_id', session('guest_id'))->get();

        $this->todaysTasks = now()->isWeekday()
            ? $this->allTasks->whereIn('task_days', ['weekdays', 'daily', 'custom', ''])
            : $this->allTasks->whereIn('task_days', ['weekends', 'daily', 'custom', '']);

        $this->tasks = $this->todaysTasks;

        $this->dispatch('progress-bar');
    }

    public function delete(int $taskID)
    {
        $task = Auth::check() ? Task::findorfail($taskID) : GuestTask::findorfail($taskID);

        $task->delete();

        $this->dispatch('task-message', "Task deleted successfully!");
        $this->dispatch('task-deleted');
    }

    public function completeTask($taskID)
    {
        $task = Auth::check() ? Task::findorfail($taskID) : GuestTask::findorfail($taskID);

        $task->update(['completed' => !$task->completed]);

        if ($task->completed) 
        {
            $this->dispatch('task-message', 'Task marked as complete!');
        }
        $this->dispatch('task-completed');
    }

    public function taskSortToggle($toggle)
    {
        if ($toggle) {
            $this->tasks = $this->todaysTasks;
        } else {
            $this->tasks = $this->allTasks;
        }
    }
}
