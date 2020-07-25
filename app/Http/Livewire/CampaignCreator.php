<?php

namespace App\Http\Livewire;

use App\Campaign;
use App\Client;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class CampaignCreator extends Component
{
    public $campaign;

    public $clients;

    public $checkedClients;

    public $chosenClientNames;

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
        ]);
        $campaignData = Arr::get($validatedData, 'campaign');
        $campaign = Campaign::create($campaignData);
        $campaign->clients()->sync($this->checkedClients);
        $this->emit('back', route('backend-campaigns'));
        $this->emit('success', 'Campaign created successfully');
    }
}
