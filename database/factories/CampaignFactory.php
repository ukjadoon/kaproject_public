<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Campaign;
use App\City;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Campaign::class, function (Faker $faker) {


    return [
        'code' => strtolower(Str::random('6')),
        'name' => $faker->name,
        'description' => $faker->text('50'),
        'google_tag' => Str::random('10'),
        'facebook_pixel' => Str::random('10'),
        'city_id' => City::inRandomOrder()->first()->id,
    ];
});
