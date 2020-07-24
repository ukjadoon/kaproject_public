<?php

namespace App\Http\Livewire;

use App\City;
use Livewire\Component;
use Illuminate\Support\Str;

class CampaignCreator extends Component
{
    public $campaign;

    public $cities;

    public $checkedCities;

    public $chosenCityNames;

    protected $casts = [
        'cities' => 'collection',
        'checkedCities' => 'collection',
    ];

    public function mount()
    {
        $this->initialize();
    }

    public function initialize()
    {
        $this->campaign = ['code' => Str::random(10)];
        $this->cities = City::all();
        $this->checkedCities = collect([]);
        $this->chosenCityNames = [];
    }

    public function updatedCheckedCities()
    {
        if (empty($this->chosenCityNames)) {

            return;
        }
        $this->chosenCityNames = implode(', ', City::whereIn('id', $this->checkedCities)->get()->sortBy('name')->pluck('name')->toArray());
    }

    public function render()
    {
        return view('livewire.campaign-creator');
    }

    public function createCampaign()
    {
        $this->validate([
            'campaign.code' => 'required|string',
        ]);
    }
}
