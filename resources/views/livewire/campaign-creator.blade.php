<div class="bg-white shadow-lg rounded-lg p-10">
    <form>
        <div>
            <div>
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Campaign
                    </h3>
                    <p class="mt-1 text-sm leading-5 text-gray-500">
                        Create a campaign on this page.
                    </p>
                </div>
                <div class="mt-6 grid grid-cols-1 row-gap-6 col-gap-4 sm:grid-cols-6">

                    <div class="sm:col-span-2">
                        <label for="name" class="block text-sm font-medium leading-5 text-gray-700">
                            Name of the campaign
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="name" type="text"
                                class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                wire:model.lazy="campaign.name" autocomplete="off">
                        </div>
                        <x-dashboard.error property="campaign.name"></x-dashboard.error>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                            Campaign code
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="code" type="text"
                                class="form-input bg-gray-200 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                wire:model.lazy="campaign.code" autocomplete="off" disabled>
                        </div>
                        <x-dashboard.error property="campaign.code"></x-dashboard.error>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="google-tag" class="block text-sm font-medium leading-5 text-gray-700">
                            Google Tag
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="google-tag"
                                class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                wire:model.lazy="campaign.google_tag">
                        </div>
                        <x-dashboard.error property="campaign.google_tag"></x-dashboard.error>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="facebook-pixel" class="block text-sm font-medium leading-5 text-gray-700">
                            Facebook Pixel
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="facebook-pixel"
                                class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                wire:model.lazy="campaign.facebook_pixel">
                        </div>
                        <x-dashboard.error property="campaign.facebook_pixel"></x-dashboard.error>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="about" class="block text-sm font-medium leading-5 text-gray-700">
                            Description
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <textarea id="description" rows="3"
                                class="form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                wire:model.lazy="campaign.description"></textarea>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Write a few sentences about the campaign.</p>
                    </div>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-200 pt-8">
                <x-dashboard-clients-chosen-cities :chosenCityNames="$chosenCityNames">
                    </x-dashboard.clients.chosen-cities>
                    <div class="mt-6">
                        <fieldset>
                            <legend class="text-base font-medium text-gray-900">
                                Cities
                            </legend>
                            <div class="min-h-full h-80 overflow-y-scroll">
                                @foreach($cities as $city)
                                <div class="mt-4">
                                    <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                            <input type="checkbox" wire:model="checkedCities" value="{{ $city['id'] }}"
                                                class="form-checkbox h-4 w-4 text-red-600 transition duration-150 ease-in-out">
                                        </div>
                                        <div class="ml-3 text-sm leading-5">
                                            <label for="comments"
                                                class="font-medium text-gray-700">{{ $city['name'] }}</label>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </fieldset>
                    </div>
            </div>
        </div>
        <div class="mt-8 border-t border-gray-200 pt-5">
            <div class="flex justify-end">
                <span class="inline-flex rounded-md shadow-sm">
                    <button type="button"
                        class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out"
                        wire:click.prevent="initialize()">
                        Reset
                    </button>
                </span>
                <span class="ml-3 inline-flex rounded-md shadow-sm">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition duration-150 ease-in-out"
                        wire:click.prevent="createCampaign">
                        Create
                    </button>
                </span>
            </div>
        </div>
    </form>
</div>
