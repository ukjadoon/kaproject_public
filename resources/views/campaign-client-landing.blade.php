@extends('layouts.app')
@section('content')
<div class="container">
    <div class="flex mx-auto">
        <livewire:city-selector />
        <x-municipality-select :campaign="$campaign"></x-municipality-select>
    </div>
</div>
@endsection
