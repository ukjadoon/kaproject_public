<?php

namespace App\Http\Livewire;

use App\Campaign;
use App\Client;
use App\Municipality;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class CampaignCreator extends Component
{
    public $campaign;

    public $clients;

    public $checkedClients;

    public $chosenClientNames;

    public $checkedMunicipalities;

    public $chosenMunicipalityNames;

    public $municipalities;

    public function mount()
    {
        $this->initialize();
    }

    public function initialize()
    {
        $this->campaign = ['code' => Str::random(10)];
        $this->clients = Client::orderBy('name', 'ASC')->get()->toArray();
        $this->checkedClients = [];
        $this->chosenClientNames = '';
        $this->checkedMunicipalities = [];
        $this->chosenMunicipalityNames = '';
        $this->municipalities = Municipality::all()->toArray();
    }

    public function updatedCampaign()
    {
        $this->validate([
            'campaign.code' => 'required|string',
            'campaign.name' => 'required|string|min:3',
            'campaign.facebook_pixel' => 'string|nullable',
            'campaign.google_tag' => 'string|nullable',
            'campaign.description' => 'string|nullable',
            'chosenClientNames' => 'required',
            'chosenMunicipalityNames' => 'required',
        ]);
    }

    public function updatedCheckedClients()
    {
        $this->chosenClientNames = implode(', ', Client::whereIn('id', $this->checkedClients)->get()->sortBy('name')->pluck('name')->toArray());
    }

    public function updatedCheckedMunicipalities()
    {
        $this->chosenMunicipalityNames = implode(', ', Municipality::whereIn('id', $this->checkedMunicipalities)->get()->sortBy('name')->pluck('name')->toArray());
    }

    public function render()
    {
        return view('livewire.campaign-creator');
    }

    public function createCampaign()
    {
        $validatedData = $this->validate([
            'campaign.code' => 'required|string',
            'campaign.name' => 'required|string|min:3',
            'campaign.facebook_pixel' => 'string|nullable',
            'campaign.google_tag' => 'string|nullable',
            'campaign.description' => 'string|nullable',
            'chosenClientNames' => 'required',
            'chosenMunicipalityNames' => 'required',
        ]);
        $campaignData = Arr::get($validatedData, 'campaign');
        $campaign = Campaign::create($campaignData);
        $campaign->clients()->sync($this->checkedClients);
        $campaign->municipalities()->sync($this->checkedMunicipalities);
        $this->emit('success', 'Campaign created successfully');
        $this->emit('back', route('backend-campaigns'));
    }
}
