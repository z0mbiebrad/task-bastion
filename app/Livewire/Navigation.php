<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Navigation extends Component
{
    public $today = '';

    public function mount()
    {
        $this->today = Carbon::now()->format('l, j');
    }
}
