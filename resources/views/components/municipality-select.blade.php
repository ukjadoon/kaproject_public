<div class="w-1/2 mx-auto" bg-red-700">
  <div class="flex flex-col">
    <label for="select_municipality" class="ml-2 text-red-700 lg:text-2xl md:text-md sm:text-lg font-semibold">Ange i vilken stad du behöver en KA</label>
    <div class="relative">
      <select
        class="p-4 mt-2 mb-0 min-w-full rounded-l-md focus:bg-orange-200 focus:outline-none focus:border-gray-500 font-semibold text-md border-solid border-2 border-gray-400 transition ease-in duration-200"
        name="select_municipality"
        id="select_municipality"
      >
        <option disabled selected class="font-semibold hover:bg-orange-100 text-md p-4">-- Vilken stad --</option>
        @foreach($campaign->municipalities->pluck('name') as $municipality)
        <option class="font-semibold hover:bg-orange-100 text-md p-4" value="{{ $municipality }}">{{ $municipality }}</option>
        @endforeach
      </select>
      <button class="bg-red-700 z-12 hover:bg-red-600 p-4 mb-0 mt-2 rounded-md min-w-full font-semibold text-red-200 hover:text-red-100 border-solid border-2 border-red-700 transition ease-in duration-200">Submit</button>
    </div>
  </div>
</div>
