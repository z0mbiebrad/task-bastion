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
        $customCurrent = Task::where('custom_task_days', 'LIKE', '%' . $this->currentDay . '%')->get();
        $this->allTasks = Auth::check()
            ? auth()->user()->tasks
            : GuestTask::where('guest_id', session('guest_id'))->get();

        $this->todaysTasks = now()->isWeekday()
            ? $this->allTasks->whereIn('task_days', ['weekdays', 'daily'])
            : $this->allTasks->whereIn('task_days', ['weekends', 'daily']);

        $this->tasks = $this->todaysTasks->merge($customCurrent);
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

    public function taskSortToggle()
    {
        $this->toggle = !$this->toggle;
        if ($this->toggle) {
            $this->tasks = $this->allTasks;
        } else {
            $this->tasks = $this->todaysTasks;
        }
    }
}
