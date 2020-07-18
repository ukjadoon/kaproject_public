<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Campaign;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Campaign::class, function (Faker $faker) {
    $cities = [['Stockholm'], ['Alby'], ['Solna']];
    shuffle($cities);

    return [
        'code' => Str::random('6'),
        'name' => $faker->name,
        'description' => $faker->text('50'),
        'google_tag' => Str::random('10'),
        'facebook_pixel' => Str::random('10'),
        'cities->names' => $cities[0], 
    ];
});
