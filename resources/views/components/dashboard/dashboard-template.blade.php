@extends('layouts.app')
@section('content')
<div class="h-screen flex overflow-hidden bg-gray-100" x-data="{menu: false}">
    <x-dashboard.off-canvas></x-dashboard.off-canvas>
    <x-dashboard.sidebar></x-dashboard.sidebar>

    <div class="flex flex-col w-0 flex-1 overflow-hidden">
        <div class="relative z-10 flex-shrink-0 flex h-16 bg-white shadow">
            <x-dashboard.hamburger-menu></x-dashboard.hamburger-menu>
            <div class="flex-1 px-4 flex justify-between">
                <x-dashboard.search-bar></x-dashboard.search-bar>
                <div class="ml-4 flex items-center md:ml-6">
                    <x-dashboard.notifications-bell></x-dashboard.notifications-bell>
                    <x-dashboard.profile-dropdown></x-dashboard.profile-dropdown>
                </div>
            </div>
        </div>
        {{ $slot }}
    </div>
</div>
@endsection