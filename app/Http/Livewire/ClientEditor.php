<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Client;
use App\City;
use Illuminate\Support\Arr;

class ClientEditor extends Component
{
    public $clientId;

    public $clientModel;

    public $client;

    public $cities;

    public $checkedCities;

    public $chosenCityNames;

    protected $casts = [
        'cities' => 'collection',
        'checkedCities' => 'collection',
    ];

    public function mount($clientId)
    {
        $this->clientId = $clientId;
        $this->initialize();
    }

    public function initialize()
    {
        $this->clientModel = Client::findOrFail($this->clientId);
        $this->client = $this->clientModel->toArray();
        $this->cities = City::all();
        $this->checkedCities = $this->clientModel->cities->pluck('id');
        $this->chosenCityNames = implode(', ', $this->clientModel->cities->sortBy('name')->pluck('name')->toArray());
    }

    public function render()
    {
        return view('livewire.client-editor');
    }

    public function updatedCheckedCities()
    {
        /*$this->checkedCities = collect($this->checkedCities)->transform(function ($value) {
            
            return (int) $value;
        })->unique()->toArray();*/
        $this->chosenCityNames = implode(', ', City::whereIn('id', $this->checkedCities)->get()->sortBy('name')->pluck('name')->toArray());
    }

    public function updateClient()
    {
        $validatedData = $this->validate([
            'client.name' => 'required|min:3|string',
            'client.email' => 'required|email',
            'client.homepage_url' => 'url|nullable',
            'client.about' => 'string|nullable',
        ]);
        $clientData = Arr::get($validatedData, 'client');
        $this->clientModel->update($clientData);
        $this->emit('success', 'The client was updated successfully');
    }
}
