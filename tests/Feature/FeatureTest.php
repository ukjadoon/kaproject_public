<?php

use function Pest\Livewire\livewire;
use App\Campaign;
use App\City;
use Illuminate\Support\Facades\Artisan;

test('Initialize and seed', function () {
    Artisan::call('migrate:fresh --seed');
    assertTrue(true);
});

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

// test('It should create campaigns with the given data', function () {
//     factory(Campaign::class, 10)->create();
//     $campaign = Campaign::whereJsonContains('cities->names', 'Solna')->first();
//     $this->assertTrue(in_array('Solna', $campaign->cities['names']));
// });

test('It should have a campaign landing page', function () {
    factory(Campaign::class)->create();
    $campaign = Campaign::first();
    $campaignCode = $campaign->code;
    $this->get('/campaign/' . $campaignCode)
        ->assertOk();
});

/**
 * City tests
 */
test('The city prices should be an integer', function () {
    $city = app('App\City')::first();
    assertIsInt($city->price);
});

test('it should have a cities backend page')
    ->get('/backend/cities')
    ->assertSee('Cities');

test('it should have a campaigns backend page')
    ->get('/backend/campaigns')
    ->assertSee('Campaigns');

test('it should have a reports backend page')
    ->get('/backend/reports')
    ->assertSee('Reports');

test('it should see the city editor livewire component on the cities backend endpoint')
    ->get('/backend/cities')
    ->assertSeeLivewire('city-editor');

/**
 * Backend tests
 */
test('It should have a backend login page')
    ->get('/backend/login')
    ->assertOk();

test('It should have a backend dashboard page')
    ->get('backend/dashboard')
    ->assertOk();

/**
 * Client tests
 */

test('it should have a clients backend page')
    ->get('/backend/clients')
    ->assertSee('Clients');

test('it should have the client-list livewire component on the clients backend endpoint')
    ->get('/backend/clients')
    ->assertSeeLivewire('client-list');