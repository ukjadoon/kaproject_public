<div class="bg-white shadow-lg rounded-lg p-10">
<form>
  <div>
    <div>
      <div>
        <h3 class="text-lg leading-6 font-medium text-gray-900">
          Profile
        </h3>
        <p class="mt-1 text-sm leading-5 text-gray-500">
          This information will be displayed publicly so be careful what you share.
        </p>
      </div>
      <div class="mt-6 grid grid-cols-1 row-gap-6 col-gap-4 sm:grid-cols-6">

        <div class="sm:col-span-2">
          <label for="name" class="block text-sm font-medium leading-5 text-gray-700">
            Name of the client
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <input id="name" type="text" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" wire:model.lazy="client.name" autocomplete="off">
          </div>
          <x-dashboard.error property="client.name"></x-dashboard.error>
        </div>

        <div class="sm:col-span-2">
          <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
            Email address
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <input id="email" type="email" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" wire:model.lazy="client.email" autocomplete="off">
          </div>
          <x-dashboard.error property="client.email"></x-dashboard.error>
        </div>

        <div class="sm:col-span-2">
          <label for="phone" class="block text-sm font-medium leading-5 text-gray-700">
            Contact number
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <input id="phone" type="text" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" wire:model.lazy="client.contact_number" autocomplete="off">
          </div>
          <x-dashboard.error property="client.contact_number"></x-dashboard.error>
        </div>

        <div class="sm:col-span-6">
          <label for="photo" class="block text-sm leading-5 font-medium text-gray-700">
            Photo
          </label>
          <div class="mt-2 flex items-center">
            <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
              <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
              </svg>
            </span>
            <span class="ml-5 rounded-md shadow-sm">
              <button type="button" class="py-2 px-3 border border-gray-300 rounded-md text-sm leading-4 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                Change
              </button>
            </span>
          </div>
        </div>

        <div class="sm:col-span-3">
          <label for="homepage" class="block text-sm font-medium leading-5 text-gray-700">
            Homepage of the client
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <input id="homepage" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" wire:model.lazy="client.homepage_url">
          </div>
          <x-dashboard.error property="client.homepage_url"></x-dashboard.error>
        </div>

        <div class="sm:col-span-6">
          <label for="about" class="block text-sm font-medium leading-5 text-gray-700">
            About
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <textarea id="about" rows="3" class="form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" wire:model.lazy="client.about"></textarea>
          </div>
          <p class="mt-2 text-sm text-gray-500">Write a few sentences about the client.</p>
        </div>


        <!--div class="sm:col-span-6">
          <label for="cover_photo" class="block text-sm leading-5 font-medium text-gray-700">
            Cover photo
          </label>
          <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
            <div class="text-center">
              <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              <p class="mt-1 text-sm text-gray-600">
                <button type="button" class="font-medium text-red-600 hover:text-red-500 focus:outline-none focus:underline transition duration-150 ease-in-out">
                  Upload a file
                </button>
                or drag and drop
              </p>
              <p class="mt-1 text-xs text-gray-500">
                PNG, JPG, GIF up to 10MB
              </p>
            </div>
          </div>
        </div-->
      </div>
    </div>
    <div class="mt-8 border-t border-gray-200 pt-8">
      <div>
        <h3 class="text-lg leading-6 font-medium text-gray-900">
          Selected Cities
        </h3>
        <p class="mt-1 text-sm leading-5 text-gray-500">
          {{ $chosenCityNames }}
        </p>
      </div>
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
                    <input type="checkbox" wire:model="checkedCities" value="{{ $city['id'] }}" class="form-checkbox h-4 w-4 text-red-600 transition duration-150 ease-in-out">
                  </div>
                  <div class="ml-3 text-sm leading-5">
                    <label for="comments" class="font-medium text-gray-700">{{ $city['name'] }}</label>
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
        <button type="button" class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out" wire:click.prevent="initialize()">
          Reset
        </button>
      </span>
      <span class="ml-3 inline-flex rounded-md shadow-sm">
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition duration-150 ease-in-out" wire:click.prevent="updateClient">
          Update
        </button>
      </span>
    </div>
  </div>
</form>

</div>
