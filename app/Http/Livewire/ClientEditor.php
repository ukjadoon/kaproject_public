<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Client;
use App\City;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class ClientEditor extends Component
{
    use WithFileUploads;

    public $clientId;

    public $clientModel;

    public $client;

    public $cities;

    public $checkedCities;

    public $chosenCityNames;

    public $logo;

    public $photo;

    protected $casts = [
        'cities' => 'collection',
        'checkedCities' => 'collection',
    ];

    public function mount($clientId)
    {
        $this->clientId = $clientId;
        $this->initialize();
    }

    public function initialize()
    {
        $this->clientModel = Client::findOrFail($this->clientId);
        $this->client = $this->clientModel->toArray();
        $this->cities = City::all();
        $this->checkedCities = $this->clientModel->cities->pluck('id');
        $this->chosenCityNames = implode(', ', $this->clientModel->cities->sortBy('name')->pluck('name')->toArray());
    }

    public function render()
    {
        return view('livewire.client-editor');
    }

    public function updatedCheckedCities()
    {
        $this->checkedCities = collect($this->checkedCities)->transform(function ($value) {
            
            return (int) $value;
        })->unique();
        //$this->chosenCityNames = implode(', ', City::whereIn('id', $this->checkedCities)->get()->sortBy('name')->pluck('name')->toArray());
    }

    public function updateClient()
    {
        $validatedData = $this->validate([
            'client.name' => 'required|min:3|string',
            'client.email' => 'required|email',
            'client.homepage_url' => 'url|nullable',
            'client.about' => 'string|nullable',
            'logo' => 'image|max:1024|nullable',
        ]);
        $clientData = Arr::get($validatedData, 'client');
        if ($this->logo) {
            if ($this->clientModel->logo) {
                Storage::disk('logos')->delete($this->clientModel->logo);
            }
            $this->clientModel->logo = $this->logo->store($this->clientId, 'logos');
            $image = Image::make(Storage::disk('logos')->get($this->clientModel->logo));
            if ($image->height() > 100) {
                 $image->resize(null, 100, function ($constraint) {
                     $constraint->aspectRatio();
                 })->encode(pathinfo($this->clientModel->logo)['extension'], 90);
                Storage::disk('logos')->put($this->clientModel->logo, $image);
            }
            $this->clientModel->update();
        }
        $this->clientModel->update($clientData);
        $this->emit('success', 'The client was updated successfully');
    }

    public function updatedLogo()
    {
        $this->validate([
            'logo' => 'image|max:1024' // 1MB max
        ]);
    }
}
