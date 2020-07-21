<?php

namespace App\Http\Livewire;

use App\Client;
use Livewire\Component;

class ClientList extends Component
{
    public $clients;

    public $clientsCollection;

    public function mount()
    {
        $this->clientsCollection = Client::orderBy('created_at', 'DESC')->get();
        $this->clients = $this->clientsCollection->toArray();
    }

    public function render()
    {
        return view('livewire.client-list');
    }

    public function getCitiesForClient($id)
    {
        $client = $this->clientsCollection->where('id', $id)->first();
        $cities = $client->cities;
        if ($cities) {

            return implode(', ', $cities->pluck('name')->all());
        }

        return 'N/A';
    }
}
