<div class="mt-1 relative rounded-md shadow-sm">
    <h2 class="text-center text-2xl text-red-700 font-semibold mb-10">Vad kostar en KA i din stad?</h2>

    <h3 class="font-bold text-md text-gray-600">Ange i vilken stad du behöver en KA</h3>
    <input
        id="city"
        class="form-input block w-full sm:text-xl sm:leading-5"
        placeholder="Vilken stad..."
        autocomplete="off"
        wire:model.debounce.300ms="query"
        wire:keydown.arrow-up="decrementHighlight"
        wire:keydown.arrow-down="incrementHighlight"
    />
    @if (!empty($query) && strlen($query) > 1)
        <div class="fixed top-0 right-0 bottom-0 left-0" wire:click="clear"></div>

        <div class="absolute z-10 bg-white w-full rounded-t-none shadow-lg max-h-60 overflow-y-auto">
            @foreach($cities as $index => $city)
                <a href="#"
                    wire:click.prevent="setCity('{{$city['name']}}')"
                    class="{{ $highlightIndex === $index ? 'bg-blue-100' : '' }} block p-4 font-semibold"
                >{{ $city['name'] }}</a>
            @endforeach
            @if (is_array($cities) && empty($cities))
                <span class="block p-4 font-semibold">No results!</span>
            @endif
        </div>
    @endif
</div>
