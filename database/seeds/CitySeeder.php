<?php

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allCities = collect(app('App\Helpers\City')->getAllCities());
        $allCities->each(function ($city) {
            factory(App\City::class)->create([
                'name' => $city['name'],
                'price' => 25000,
            ]);
        });
    }
}
