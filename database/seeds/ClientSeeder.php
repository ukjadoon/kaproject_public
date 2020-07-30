<?php

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Client::class, 50)->create()->each(function ($client) {
            $municipalityIds = App\Municipality::inRandomOrder()->limit(5)->get()->pluck('id');
            $client->municipalities()->sync($municipalityIds);
        });

        $campaigns = App\Campaign::all();
        $campaigns->each(function ($campaign) {
            $clientIds = App\Client::inRandomOrder()->limit(5)->get()->pluck('id');
            $campaign->clients()->sync($clientIds);
            $municipalityIds = App\Municipality::inRandomOrder()->limit(5)->get()->pluck('id');
            $campaign->municipalities()->sync($municipalityIds);
        });
    }
}
