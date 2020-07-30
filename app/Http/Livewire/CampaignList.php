<?php

namespace App\Http\Livewire;

use App\Campaign;
use Livewire\Component;

class CampaignList extends Component
{
    public $campaigns;

    protected $casts = [
        'campaigns' => 'collection',
    ];

    public function mount()
    {
        $this->campaigns = Campaign::orderBy('created_at', 'DESC')->get();
    }

    public function getMunicipalityForCampaign($id)
    {
        $campaign = $this->campaigns->where('id', $id)->first();

        return $campaign->municipalities ? $this->getMunicipalityNamesForCampaign($campaign) : '';
    }
    public function render()
    {
        return view('livewire.campaign-list');
    }

    public function getMunicipalityNamesForCampaign(Campaign $campaign)
    {
        return implode(', ', $campaign->municipalities->pluck('name')->toArray());
    }
}
