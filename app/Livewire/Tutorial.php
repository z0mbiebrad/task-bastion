<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class Tutorial extends Component
{
    #[Reactive]
    public int $tutorialStep;

    public function mount($tutorialStep)
    {
        $this->tutorialStep = $tutorialStep;
    }
}
