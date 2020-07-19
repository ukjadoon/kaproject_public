<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use App\Helpers\City as CityHelper;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {

    return [
        'name' => (new CityHelper)->getRandomCity(),
        'price' => rand(17000, 25000),
    ];
});
