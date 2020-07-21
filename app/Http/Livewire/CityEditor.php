<?php

namespace App\Http\Livewire;

use App\City;
use Livewire\Component;

class CityEditor extends Component
{
    public $cities;

    public $city;

    public function mount()
    {
        $this->fill([
            'cities' => City::all()->toArray()
        ]);
    }

    public function render()
    {
        return view('livewire.city-editor');
    }

    public function updateCity($cityId, $price)
    {
        $city = City::findOrFail($cityId);
        $city->price = round($price);
        $city->save();
        foreach($this->cities as $key => $c) {
            if ($c['id'] == $cityId) {
                $this->cities[$key]['price'] = $city->price;
            }
        }
        $this->emit('success', 'Update applied successfully');
    }
}
