<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Campaign;
use App\Client;

class BackendDashboardComponent extends Component
{
    public $campaignCount;

    public $clientCount;

    public function mount()
    {
        $this->campaignCount = Campaign::count();
        $this->clientCount = Client::count();
    }

    public function render()
    {
        return view('livewire.backend-dashboard-component');
    }
}
