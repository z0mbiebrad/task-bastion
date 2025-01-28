<?php

namespace App\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class TaskIndex extends Component
{
    public $tasks;
    public $editing = [];
    public $updated = null;
    public $completedMessage = '';
    public $toggleEditButton = false;


    #[Computed]
    public function groupedTasks()
    {
        return $this->tasks->groupBy(function ($task) {
            // Use 'custom_category' if it exists, otherwise fall back to 'category'
            return $task->custom_category ?: $task->category;
        });
    }

    #[On('toggle-Edi')]
    public function toggleEdi()
    {
        $this->toggleEditButton = !$this->toggleEditButton;
    }

    #[On('task-updated')]
    public function toggleEdit($task)
    {
        if (isset($this->editing[$task])) {
            unset($this->editing[$task]);
        } else {
            $this->editing[$task] = true;
        }

        $this->updated = $task;
    }

    public function delete(Task $task)
    {
        $task->delete();
        $this->tasks = Auth::user()->tasks;
        $this->groupedTasks();
        $this->dispatch('task-deleted');
    }

    #[On('update-message')]
    public function editMessage()
    {
        session()->flash("update-message", 'Task updated successfully!');
    }

    #[On(['task-created', 'task-completed'])]
    public function mount()
    {
        $this->taskDaysDisplay();
        $this->groupedTasks();
    }
    #[On('test')]
    public function taskDaysDisplay()
    {
        $tasks = Auth::user()->tasks;
        $currentDay = strtolower(now()->format('l'));
        $isWeekend = in_array($currentDay, ['Saturday', 'Sunday']);
        $isWeekday = !$isWeekend;

        $this->tasks = $tasks->filter(function ($task) use ($currentDay, $isWeekday, $isWeekend) {
            return match ($task->task_days) {
                'daily' => true,
                'weekdays' => $isWeekday,
                'weekends' => $isWeekend,
                'custom' => !empty($task->custom_task_days) && in_array($currentDay, $task->custom_task_days),
                default => empty($task->task_days), // Show tasks with no 'task_days' set
            };
        });
        session()->put('today_tasks', $this->tasks->toArray()); // Store in the session
        $this->dispatch('today-tasks', $this->tasks); // Dispatch for other components
    }
    public function completeTask(Task $task)
    {
        $this->updated = $task->id;

        $task->update(['completed' => !$task->completed]);
        $this->dispatch('task-completed');
        if ($task->completed)
        {
            $this->completedMessage = ucwords($task->task) . ' completed! Way to go!';
        }
    }

    public function render()
    {
        return view('livewire.task-index');
    }
}
