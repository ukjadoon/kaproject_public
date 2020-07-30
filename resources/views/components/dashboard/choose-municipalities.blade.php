    <div class="mt-8 border-t border-gray-200 pt-8">
        <x-dashboard-clients-chosen-municipalities :chosenMunicipalityNames="$chosenMunicipalityNames">
            </x-dashboard.clients.chosen-municipalities>
            <x-dashboard.error property="chosenMunicipalityNames"></x-dashboard.error>
            <div class="mt-6">
                <fieldset>
                    <legend class="text-base font-medium text-gray-900">
                        Municipalities
                    </legend>
                    <div class="min-h-full h-80 overflow-y-scroll">
                        @foreach($municipalities as $municipality)
                        <div class="mt-4">
                            <div class="relative flex items-start">
                                <div class="flex items-center h-5">
                                    <input type="checkbox" wire:model="checkedMunicipalities"
                                        value="{{ $municipality['id'] }}"
                                        class="form-checkbox h-4 w-4 text-red-600 transition duration-150 ease-in-out">
                                </div>
                                <div class="ml-3 text-sm leading-5">
                                    <label for="comments"
                                        class="font-medium text-gray-700">{{ $municipality['name'] }}</label>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </fieldset>
            </div>
    </div>
