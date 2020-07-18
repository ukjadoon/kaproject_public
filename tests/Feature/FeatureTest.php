<?php

use function Pest\Livewire\livewire;

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
