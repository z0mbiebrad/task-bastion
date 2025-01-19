<?php

namespace App\Livewire\Forms;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TaskForm extends Form
{
    #[Validate('required|string|min:1|max:255')]
    public $task = '';

    #[Validate('nullable|string')]
    public $category = '';

    #[Validate('nullable|string|max:255')]
    public $customCategory = '';

    #[Validate('nullable|string')]
    public $taskDays = '';

    #[Validate('nullable|array|max:7')]
    public $customTaskDays = [];
    
    public $showFields = false;
    public $taskModel;
    public $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

    public function setTask(Task $task)
    {
        $this->showFields = true;
        $this->fill([
            'taskModel' => $task,
            'task' => $task->task,
            'category' => $task->category,
            'customCategory' => $task->custom_category,
            'taskDays' => $task->task_days,
            'customTaskDays' => $task->custom_task_days,
        ]);
    }

    public function save()
    {
        $this->validate();

        $data = [
            'user_id' => Auth::id(),
            'task' => $this->task,
            'category' => $this->category,
            'custom_category' => $this->customCategory,
            'task_days' => $this->taskDays,
            'custom_task_days' => $this->customTaskDays,
        ];

        $this->taskModel 
            ? $this->taskModel->update($data) 
            : Task::create($data);

        $this->showFields = false;

        $this->reset([
            'task',
            'category',
            'taskDays',
        ]);

        session()->flash('message', $this->taskModel ? 'Task updated successfully!' : 'Task created successfully.');
    }
}
