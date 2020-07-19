<?php

it('should have a city helper that returns an array of all cities', function () {
    $cityHelper = app('App\Helpers\City');
    assertIsArray($cityHelper->getAllCities());
});

it('should fetch a random city name', function () {
    $cityHelper = app('App\Helpers\City');
    assertIsString($cityHelper->getRandomCity());
});
