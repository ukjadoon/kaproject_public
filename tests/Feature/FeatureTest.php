<?php

use function Pest\Livewire\livewire;
use App\Campaign;

test('You can access the root route')
    ->get('/')
    ->assertOk();

test('You should be able to access the ka root route')
    ->get('/ka')
    ->assertOk();

test('You should see the city-selector Livewire component on the ka route', function () {
    $this->get('/ka')
    ->assertSeeLivewire('city-selector');
});

test('It should create campaigns with the given data', function () {
    factory(Campaign::class, 10)->create();
    $campaign = Campaign::whereJsonContains('cities->names', 'Solna')->first();
    $this->assertTrue(in_array('Solna', $campaign->cities['names']));
});
