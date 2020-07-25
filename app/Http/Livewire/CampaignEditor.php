<?php

namespace App\Http\Livewire;

use App\Campaign;
use App\Client;
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
        $this->checkedClients = $this->campaignModel->clients->pluck('id')->toArray();
        $this->chosenClientNames = '';
    }

    public function updatedCampaign()
    {
        $this->validate([
            'campaign.code' => 'required|string',
            'campaign.name' => 'required|string|min:3',
            'campaign.facebook_pixel' => 'string|nullable',
            'campaign.google_tag' => 'string|nullable',
            'campaign.description' => 'string|nullable',
        ]);
    }

    public function updatedCheckedClients()
    {
        $this->chosenClientNames = implode(', ', Client::whereIn('id', $this->checkedClients)->get()->sortBy('name')->pluck('name')->toArray());
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
        ]);
        $campaignData = Arr::get($validatedData, 'campaign');
        $campaign = Campaign::findOrFail($this->campaignId);
        $campaign->update($campaignData);
        $campaign->clients()->sync($this->checkedClients);
        $this->emit('success', 'Campaign updated successfully');
    }

    public function render()
    {
        return view('livewire.campaign-editor');
    }
}
