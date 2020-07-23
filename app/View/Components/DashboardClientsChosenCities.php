<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardClientsChosenCities extends Component
{
    public $chosenCityNames;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($chosenCityNames)
    {
        $this->chosenCityNames = $chosenCityNames;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.dashboard.clients.chosen-cities');
    }
}
