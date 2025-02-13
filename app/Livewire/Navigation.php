<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class Navigation extends Component
{
    public $today = '';
    
    #[Reactive]
    public $tasks;

    public function mount($tasks)
    {
        $this->tasks = $tasks;
        $this->today = Carbon::now()->format('l, j');
    }
}
