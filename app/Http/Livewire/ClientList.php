<?php

namespace App\Http\Livewire;

use App\Client;
use Livewire\Component;

class ClientList extends Component
{
    public $clients;

    public function mount()
    {
        $this->clients = Client::all()->toArray();
    }

    public function render()
    {
        return view('livewire.client-list');
    }
}
