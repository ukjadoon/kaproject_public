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

    public function getMunicipalitiesForCampaign($id)
    {
        $campaign = $this->campaigns->where('id', $id)->first();

        return $campaign->municipalities;
    }
    public function render()
    {
        return view('livewire.campaign-list');
    }

    public function getClientsFormCampaign($id)
    {
        $campaign = $this->campaigns->where('id', $id)->first();
        return implode(', ', $campaign->clients->pluck('name')->toArray());
    }
}
