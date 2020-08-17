<div class="bg-white shadow-lg rounded-lg p-10">
<form>
  <div x-data="{ clientType: {{ $client['type'] }} }">
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

      </div>

      <div class="mt-6 grid grid-cols-1 row-gap-6 col-gap-4 sm:grid-cols-6">
        <div class="sm:col-span-2">
            <label for="clientType" class="block text-sm font-medium leading-5 text-gray-700">Client Type</label>
            <select id="clientType" wire:model="client.type" x-model="clientType" name="client" class="mt-1 form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
              <option x-bind:selected="clientType == 0" value="0">Redirect to homepage</option>
              <option x-bind:selected="clientType == 1" value="1">Question form</option>
            </select>
            <x-dashboard.error property="client.type"></x-dashboard.error>
        </div>

      </div>

      <div class="mt-6 grid grid-cols-1 row-gap-6 col-gap-4 sm:grid-cols-6" x-show="clientType == 0">
    
        <div class="sm:col-span-3">
          <label for="homepage" class="block text-sm font-medium leading-5 text-gray-700">
            Homepage of the client
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <input id="homepage" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" wire:model.lazy="client.homepage_url">
          </div>
          <x-dashboard.error property="client.homepage_url"></x-dashboard.error>
        </div>

      </div>

      <div class="mt-6 grid grid-cols-1 row-gap-6 col-gap-4 sm:grid-cols-6" x-show="clientType == 1">

        <div class="sm:col-span-2">
          <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
            Email address
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <input id="email" type="email" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" wire:model.lazy="client.email" autocomplete="off">
          </div>
          <x-dashboard.error property="client.email"></x-dashboard.error>
        </div>

        <div class="sm:col-span-2" x-show="clientType == 1">
          <label for="phone" class="block text-sm font-medium leading-5 text-gray-700">
            Contact number
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <input id="phone" type="text" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" wire:model.lazy="client.contact_number" autocomplete="off">
          </div>
          <x-dashboard.error property="client.contact_number"></x-dashboard.error>
        </div>

        <div class="sm:col-span-6" x-show="clientType == 1">
          <label for="photo" class="block text-sm leading-5 font-medium text-gray-700">
            Avatar
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


        <div class="sm:col-span-6" x-show="clientType == 1">
          <label for="about" class="block text-sm font-medium leading-5 text-gray-700">
            About
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <textarea id="about" rows="3" class="form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" wire:model.lazy="client.about"></textarea>
          </div>
          <p class="mt-2 text-sm text-gray-500">Write a few sentences about the client.</p>
        </div>

        <x-dashboard-clients-logo :logo="$logo" :client="$client"></x-dashboard.clients.logo>
      </div>
    </div>
    <x-dashboard.choose-municipalities :municipalities="$municipalities" :chosenMunicipalityNames="$chosenMunicipalityNames" :checkedMunicipalities="$checkedMunicipalities"></x-dashboard.choose-municipalities>
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
