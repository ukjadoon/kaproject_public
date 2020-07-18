<?php

it('should have a city helper that returns an array of all cities', function () {
    $cityHelper = app('App\Helpers\City');
    assertIsArray($cityHelper->getAllCities());
});