    <div class="flex flex-col">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div
                class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Average rate
                            </th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cities as $key => $city)
                        <tr class="bg-white odd:bg-gray-50">
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                {{ $city['name'] }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                <div class="w-40 min-w-full">
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input
                                            class="form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5" type="number" min="0" step="1"
                                            placeholder="{{ $city['price'] }}" aria-describedby="price-currency" wire:model="cities.{{ $key }}.price">
                                        <div
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                                SEK
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                <button type="button" wire:click.prevent="updateCity({{ $city['id'] }}, {{ $city['price'] }})" class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-green-700 bg-green-200 hover:bg-green-100 focus:outline-none focus:border-green-300 focus:shadow-outline-green active:bg-green-200 transition ease-in-out duration-150">
                                    Update
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
