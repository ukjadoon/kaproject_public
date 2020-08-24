<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Client;
use App\Municipality;
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

    public $clientType;

    public $municipalities;

    public $checkedMunicipalities;

    public $chosenMunicipalityNames;

    public $logo;

    public $photo;

    protected $casts = [
        'municipalities' => 'collection',
        'checkedMunicipalities' => 'collection',
    ];

    public function mount($clientId)
    {
        $this->clientId = $clientId;
        $this->initialize();
    }

    public function initialize()
    {
        $this->clientModel = Client::findOrFail($this->clientId);
        $this->clientType = $this->clientModel->type;
        $this->client = $this->clientModel->toArray();
        $this->municipalities = Municipality::all();
        $this->checkedMunicipalities = $this->clientModel->municipalities->pluck('id')->transform(function ($value) { return (string) $value; });
        $this->chosenMunicipalityNames = implode(', ', $this->clientModel->municipalities->sortBy('name')->pluck('name')->toArray());
    }

    public function render()
    {
        return view('livewire.client-editor');
    }

    public function updatedCheckedMunicipalities()
    {
        $this->chosenMunicipalityNames = implode(', ', Municipality::whereIn('id', $this->checkedMunicipalities)->get()->sortBy('name')->pluck('name')->toArray());
    }

    public function updateClient()
    {
        $validatedData = $this->validate([
            'client.name' => 'required|min:3|string',
            'client.type' => 'required',
            'client.email' => 'email',
            'client.homepage_url' => 'url|nullable',
            'client.about' => 'string|nullable',
            'client.contact_number' => 'string|nullable',
            'logo' => 'image|max:1024|nullable',
            'chosenMunicipalityNames' => 'required',
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
        $this->clientModel->municipalities()->sync($this->checkedMunicipalities);
        $this->emit('success', 'The client was updated successfully');
    }

    public function updatedLogo()
    {
        $this->validate([
            'logo' => 'image|max:1024' // 1MB max
        ]);
    }
}
