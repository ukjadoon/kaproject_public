<?php

use function Pest\Livewire\livewire;
use App\Campaign;
use App\City;
use App\Client;
use App\User;
use Illuminate\Support\Facades\Artisan;

beforeEach(function () {
    if ($user = User::first()) {
        $this->actingAs($user);
    }
});

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

/**
 * Campaign tests
 */

test('It should have a campaign landing page', function () {
    factory(Campaign::class)->create();
    $campaign = Campaign::first();
    $campaignCode = $campaign->code;
    $this->get('/campaign/' . $campaignCode)
        ->assertOk();
});

test('it should see Campaigns on the campaign create page', function () {
    $this->get('/backend/campaigns/create')
        ->assertSee('Campaigns');
});

test('it should have a backend campaign-create page')
    ->get('/backend/campaigns/create')
    ->assertOk();

test('it should see the campaign-creator Livewire component on the campaign create page', function () {
    $this->get('/backend/campaigns/create')
        ->assertSeeLivewire('campaign-creator');
});

/**
 * Municipality tests
 */
test('The municipality prices should be an integer', function () {
    $municipality = app('App\Municipality')::first();
    assertIsInt($municipality->price);
});

test('it should have a cities backend page')
    ->get('/backend/municipalities')
    ->assertSee('Municipalities');

test('it should have a campaigns backend page')
    ->get('/backend/campaigns')
    ->assertSee('Campaigns');

test('it should have a reports backend page')
    ->get('/backend/reports')
    ->assertSee('Reports');

test('it should see the municipality editor livewire component on the cities backend endpoint')
    ->get('/backend/municipalities')
    ->assertSeeLivewire('municipality-editor');

/**
 * Backend tests
 */
test('It should have a backend login page')
    ->get('/backend/login')
    ->assertOk();

test('It should have a backend dashboard page')
    ->get('backend/dashboard')
    ->assertOk();

test('it should see the backend-dashboard component on the route', function () {
    $this->get('backend/dashboard')
        ->assertSeeLivewire('backend-dashboard-component');
});

/**
 * Client tests
 */

test('it should have a clients backend page')
    ->get('/backend/clients')
    ->assertSee('Clients');

test('it should have the client-list livewire component on the clients backend endpoint')
    ->get('/backend/clients')
    ->assertSeeLivewire('client-list');

test('it should have the new client button on the clients list page', function () {
    $this->get('/backend/clients')
        ->assertSee('New Client');
});

test('it should have a client edit page on the backend', function () {
    $client = Client::first();
    $this->get('/backend/clients/' . $client->id)->assertOk();
});

test('it should have a client-edit livewire component on the backend', function () {
    $client = Client::first();
    $this->get('/backend/clients/' . $client->id)->assertSeeLivewire('client-editor');
});

test('it should have the client-creator livewire component on the client create endpoint')
    ->get('/backend/clients/create')
    ->assertSeeLivewire('client-creator');

test('it should have a new client page', function () {
    $this->get('backend/clients/create')
        ->assertOk();
});

test('it should have a campaign edit page', function () {
    $this->get('backend/campaigns/1')
        ->assertOk();
});

test('it should see the campaign editor Livewire component when accessing the campaign edit page', function () {
    $this->get('backend/campaigns/1')
        ->assertSeeLivewire('campaign-editor');
});
