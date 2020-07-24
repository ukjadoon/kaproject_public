<div class="sm:col-span-6">
    <label for="cover_photo" class="block text-sm leading-5 font-medium text-gray-700">
        Logo
    </label>
    <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
        <div class="text-center">
            <div class="flex justify-center py-2">
                @if($logo)
                <img src="{{ $logo->temporaryUrl() }}" class="min-h-full h-20" />
                @elseif(isset($client['logo']) && $client['logo'])
                <img src="{{ Storage::disk('logos')->url($client['logo']) }}" class="min-h-full h-20" />
                @endif
            </div>
            @if(empty($logo) && empty($client['logo']))
            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                <path
                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            @endif
            <x-dashboard.error property="logo"></x-dashboard.error>
            <p class="mt-1 text-sm text-gray-600">
                <button type="button" @click="$refs.logoInput.click()"
                    class="font-medium text-red-600 hover:text-red-500 focus:outline-none focus:underline transition duration-150 ease-in-out">
                    Upload a file
                </button>
            </p>
            <p class="mt-1 text-xs text-gray-500">
                PNG, JPG up to 1MB
            </p>
            <input x-ref="logoInput" type="file" wire:model="logo" class="hidden" accept=".jpg,.png,.jpeg" />
        </div>
    </div>
</div>
