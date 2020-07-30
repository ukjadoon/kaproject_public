<?php

namespace App\Http\Livewire;

use App\Municipality;
use Livewire\Component;

class MunicipalityEditor extends Component
{
    public $municipalities;

    public function mount()
    {
        $this->fill([
            'municipalities' => Municipality::all()->toArray()
        ]);
    }

    public function render()
    {
        return view('livewire.municipality-editor');
    }

    public function updateMunicipality($municipalityId, $price)
    {
        $municipality = Municipality::findOrFail($municipalityId);
        $municipality->price = round($price);
        $municipality->save();
        foreach($this->municipalities as $key => $m) {
            if ($m['id'] == $municipalityId) {
                $this->municipalities[$key]['price'] = $municipality->price;
            }
        }
        $this->emit('success', 'Update applied successfully');
    }
}
