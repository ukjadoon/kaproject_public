<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BackendBackButton extends Component
{
    public $backButtonRoute;

    public function mount($backButtonRoute)
    {
        $this->backButtonRoute = $backButtonRoute;
    }

    public function render()
    {
        return view('livewire.backend-back-button');
    }
}
