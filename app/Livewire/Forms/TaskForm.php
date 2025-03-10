<?php

namespace App\Livewire\Forms;

use App\Models\GuestTask;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Session;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TaskForm extends Form
{
    #[Validate('required|string|min:1|max:255', onUpdate: false)]
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

    public function setTask(Task|GuestTask $task)
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
        if ($this->task === '') {
            return;
        }

        $this->validate();

        $data = [
            'task' => $this->task,
            'category' => $this->category,
            'custom_category' => $this->customCategory,
            'task_days' => $this->taskDays,
            'custom_task_days' => $this->customTaskDays,
        ];

        Auth::check()
            ? $data['user_id'] = Auth::id()
            : $data['guest_id'] = session()->get('guest_id')
        ;
        
        if ($this->taskModel) {
            $this->taskModel->update($data);
        } else {
            Auth::check() 
                ? Task::create($data)
                : GuestTask::create($data)
            ;
        }

        $this->showFields = false;

        $this->reset([
            'task',
            'category',
            'customCategory',
            'taskDays',
            'customTaskDays',
        ]);
    }
}
