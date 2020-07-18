<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Helpers\City;

class CitySelector extends Component
{
    public $cities;

    public $query;

    public $highlightIndex;

    public function updatedQuery()
    {
        $this->cities = (new City)->getAllCities();
        if (! $this->query) {

            return $this->cities;
        }
        $this->cities = collect($this->cities)
            ->filter(function ($city) {

                return false !== stristr($city['name'], $this->query);
            })
            ->values()
            ->all();
    }

    public function mount()
    {
        $this->fill([
            'cities' => (new City)->getAllCities(),
            'query' => '',
            'highlightIndex' => 0,
        ]);
    }

    public function clear()
    {
        $this->cities = (new City)->getAllCities();
        $this->query = '';
        $this->highlightIndex = 0;
    }

    public function render()
    {
        return view('livewire.city-selector');
    }

    public function setCity($cityName)
    {
        $this->query = $cityName;
    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->cities) - 1) {
            $this->highlightIndex = 0;
            return;
        }

        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->cities) - 1;

            return;
        }

        $this->highlightIndex--;
    }
}
