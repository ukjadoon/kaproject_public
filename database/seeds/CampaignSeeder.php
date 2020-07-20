<?php

use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Campaign::class, 10)->create()->each(function ($campaign) {
            $cityIds = App\City::inRandomOrder()->limit(5)->get()->pluck('id');
            $campaign->cities()->sync($cityIds);
        });
    }
}
