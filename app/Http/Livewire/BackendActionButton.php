<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BackendActionButton extends Component
{
    public $buttonText;
    public $buttonRoute;

    public function mount($buttonText, $buttonRoute)
    {
        $this->buttonText = $buttonText;
        $this->buttonRoute = $buttonRoute;
    }

    public function render()
    {
        return view('livewire.backend-action-button');
    }
}
