@extends('layouts.app')

@section('content')
<x-header></x-header>

<div class="py-4"></div>


<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- We've used 3xl here, but feel free to try other max-widths based on your needs -->
    <div class="max-w-3xl mx-auto">
        <livewire:city-selector />
    </div>
</div>
@endsection
