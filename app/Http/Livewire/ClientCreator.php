<?php

namespace App\Http\Livewire;

use App\Client;
use App\Municipality;
use Livewire\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class ClientCreator extends Component
{
    use WithFileUploads;

    public $client;
    public $municipalities;
    public $checkedMunicipalities;
    public $chosenMunicipalityNames;
    public $logo;

    protected $casts = [
        'municipalities' => 'collection',
        'checkedMunicipalities' => 'collection',
    ];

    public function mount()
    {
        $this->initialize();
    }

    public function initialize()
    {
        $this->client = [];
        $this->municipalities = Municipality::all();
        $this->checkedMunicipalities = collect([]);
        $this->chosenMunicipalityNames = [];
    }

    public function updatedCheckedMunicipalities()
    {
        if (empty($this->checkedMunicipalities)) {

            return;
        }
        $this->chosenMunicipalityNames = implode(', ', Municipality::whereIn('id', $this->checkedMunicipalities)->get()->sortBy('name')->pluck('name')->toArray());
    }

    public function createClient()
    {
        $validatedData = $this->validate([
            'client.name' => 'required|min:3|string',
            'client.email' => 'required|email',
            'client.homepage_url' => 'url|nullable',
            'client.about' => 'string|nullable',
            'client.contact_number' => 'string|nullable',
            'logo' => 'image|max:1024|nullable',
            'chosenMunicipalityNames' => 'required',
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
        if ($this->checkedMunicipalities) {
            $client->municipalities()->sync($this->checkedMunicipalities);
        }
        $this->emit('success', 'The model was created successfully');
        $this->emit('back', route('backend-clients'));
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
