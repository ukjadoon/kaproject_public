<?php

namespace App\Http\Livewire;

use App\City;
use App\Client;
use Livewire\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class ClientCreator extends Component
{
    use WithFileUploads;

    public $client;
    public $cities;
    public $checkedCities;
    public $chosenCityNames;
    public $logo;

    protected $casts = [
        'cities' => 'collection',
        'checkedCities' => 'collection',
    ];

    public function mount()
    {
        $this->initialize();
    }

    public function initialize()
    {
        $this->client = [];
        $this->cities = City::all();
        $this->checkedCities = collect([]);
        $this->chosenCityNames = [];
    }

    public function updatedCheckedCities()
    {
        if (empty($this->chosenCityNames)) {

            return;
        }
        $this->chosenCityNames = implode(', ', City::whereIn('id', $this->checkedCities)->get()->sortBy('name')->pluck('name')->toArray());
    }

    public function createClient()
    {
        $validatedData = $this->validate([
            'client.name' => 'required|min:3|string',
            'client.email' => 'required|email',
            'client.homepage_url' => 'url|nullable',
            'client.about' => 'string|nullable',
            'logo' => 'image|max:1024|nullable',
        ]);
        $clientData = Arr::get($validatedData, 'client');
        $client = new Client;
        $client->fill($clientData);
        $client->save();
        if ($this->logo) {
            $path = $this->saveImage($client->id);
            $client->logo = $path;
            $client->update();
        }
        if ($this->checkedCities) {
            $client->cities()->sync($this->checkedCities);
        }
        $this->emit('success', 'The model was created successfully');
    }

    protected function saveImage($clientId)
    {
        $path = $this->logo->store($clientId, 'logos');
        $image = Image::make(Storage::disk('logos')->get($path));
        if ($image->height() > 100) {
                $image->resize(null, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode(pathinfo($path)['extension'], 90);
            Storage::disk('logos')->put($path, $image);
        }

        return $path;
    }

    public function render()
    {
        return view('livewire.client-creator');
    }
}
