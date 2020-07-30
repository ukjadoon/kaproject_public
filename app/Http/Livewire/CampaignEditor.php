<?php

namespace App\Http\Livewire;

use App\Campaign;
use App\City;
use App\Client;
use App\Municipality;
use Livewire\Component;
use Illuminate\Support\Arr;

class CampaignEditor extends Component
{
    public $campaignId;

    public $campaign;

    public $campaignModel;

    public $clients;

    public $checkedClients;

    public $chosenClientNames;

    public $municipalities;

    public $checkedMunicipalities;

    public $chosenMunicipalityNames;

    protected $casts = [
        'checkedClients' => 'collection',
        'municipalities' => 'collection',
        'checkedMunicipalities' => 'collection',
    ];

    public function mount($campaignId)
    {
        $this->campaignId = $campaignId;
        $this->initialize();
    }

    public function initialize()
    {
        $this->campaignModel = Campaign::findOrFail($this->campaignId);
        $this->campaign = $this->campaignModel->toArray();
        $this->clients = Client::orderBy('name', 'ASC')->get()->toArray();
        $this->checkedClients = $this->campaignModel->clients->pluck('id')->transform(function ($value) { return (string) $value; });
        $this->chosenClientNames = implode(', ', Client::whereIn('id', $this->checkedClients)->get()->sortBy('name')->pluck('name')->toArray());
        $this->municipalities = Municipality::all();
        $this->checkedMunicipalities = $this->campaignModel->municipalities->pluck('id')->transform(function ($value) {

            return (string) $value;
        });
        $this->chosenMunicipalityNames = implode(', ', $this->campaignModel->municipalities->sortBy('name')->pluck('name')->toArray());
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
        ]);
    }

    public function updated($name, $value)
    {
        if ($name == 'checkedClients') {
            $this->chosenClientNames = implode(', ', Client::whereIn('id', $value)->get()->sortBy('name')->pluck('name')->toArray());
        }
        if ($name == 'checkedMunicipalities') {
            $this->chosenMunicipalityNames = implode(', ', Municipality::whereIn('id', $value)->get()->sortBy('name')->pluck('name')->toArray());
        }
    }

    public function updateCampaign()
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
        $campaign = Campaign::findOrFail($this->campaignId);
        $campaign->update($campaignData);
        $campaign->clients()->sync($this->checkedClients);
        $campaign->municipalities()->sync($this->checkedMunicipalities);
        $this->emit('success', 'Campaign updated successfully');
    }

    public function render()
    {
        return view('livewire.campaign-editor');
    }
}
