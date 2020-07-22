<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Client;
use App\City;

class ClientEditor extends Component
{
    public $clientId;

    public $clientModel;

    public $client;

    public $cities;

    public $checkedCities;

    public $chosenCityNames;

    public function mount($clientId)
    {
        $this->clientId = $clientId;
        $this->clientModel = Client::findOrFail($this->clientId);
        $this->client = $this->clientModel->toArray();
        $this->cities = City::all()->toArray();
        $this->checkedCities = $this->clientModel->cities->pluck('id')->toArray();
        $this->chosenCityNames = implode(', ', $this->clientModel->cities->sortBy('name')->pluck('name')->toArray());
    }

    public function render()
    {
        return view('livewire.client-editor');
    }
}
