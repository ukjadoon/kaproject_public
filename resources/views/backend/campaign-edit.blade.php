<x-dashboard.dashboard-template>
    <x-dashboard-content heading="Campaigns" backButtonRoute="backend-campaigns">
        <livewire:campaign-editor :campaignId="$campaignId" />
    </x-dashboard-content>
</x-dashboard.dashboard-template>
