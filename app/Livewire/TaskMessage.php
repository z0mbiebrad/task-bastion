<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class TaskMessage extends Component
{
    public ?string $message = null;
    public ?string $key = null;

    #[On('task-message')]
    public function taskMessage($message)
    {
        $this->message = $message;
        $this->key = uniqid();
    }
}
