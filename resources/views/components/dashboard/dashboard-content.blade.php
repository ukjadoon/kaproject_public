<main class="flex-1 relative z-0 overflow-y-auto focus:outline-none" tabindex="0">
    <div class="pt-2 pb-6 md:py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 flex justify-between">
            <h1 class="text-2xl font-semibold text-gray-900">{{ $heading }}</h1>
            @if(! empty($buttonText) && ! empty($buttonRoute))
            <livewire:backend-action-button :buttonText="$buttonText" :buttonRoute="$buttonRoute" />
            @endif
            @if(! empty($backButtonRoute))
            <livewire:backend-back-button :backButtonRoute="$backButtonRoute" />
            @endif
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <!-- Replace with your content -->
            <div class="py-4" wire:loading>
                Loading...
            </div>
            <div class="py-4">
                <div>{{ $slot }}</div>
            </div>
            <!-- /End replace -->
        </div>
    </div>
</main>
