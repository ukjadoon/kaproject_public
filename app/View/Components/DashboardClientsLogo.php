<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardClientsLogo extends Component
{
    public $logo;
    public $client;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($logo, $client)
    {
        $this->logo = $logo;
        $this->client = $client;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.dashboard.clients.logo');
    }
}
