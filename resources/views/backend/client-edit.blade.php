<x-dashboard.dashboard-template>
    <x-dashboard-content heading="Clients" backButtonRoute="backend-clients">
        <livewire:client-editor :clientId="$clientId" />
    </x-dashboard-content>
</x-dashboard.dashboard-template>