<?php

use function Pest\Livewire\livewire;
use App\Campaign;
use App\City;

test('You can access the root route')
    ->get('/')
    ->assertOk();

test('You should be able to access the welcome route')
    ->get('/welcome')
    ->assertOk();

test('You should see the city-selector Livewire component on the welcome route', function () {
    $this->get('/welcome')
    ->assertSeeLivewire('city-selector');
});

test('It should create campaigns with the given data', function () {
    factory(Campaign::class, 10)->create();
    $campaign = Campaign::whereJsonContains('cities->names', 'Solna')->first();
    $this->assertTrue(in_array('Solna', $campaign->cities['names']));
});

test('It should have a campaign landing page', function () {
    factory(Campaign::class)->create();
    $campaign = Campaign::first();
    $campaignCode = $campaign->code;
    $this->get('/campaign/' . $campaignCode)
        ->assertOk();
});

test('The city prices should be an integer', function () {
    factory(City::class)->create();
    $city = app('App\City')::first();
    assertIsInt($city->price);
});

test('It should have a backend login page')
    ->get('/backend')
    ->assertOk();

test('It should have a backend dashboard page')
    ->get('backend/dashboard')
    ->assertOk();
