<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(MunicipalitySeeder::class);
        if (env('APP_ENV') == 'testing' || env('APP_ENV') == 'local') {
            $this->call(CampaignSeeder::class);
            $this->call(ClientSeeder::class);
        }
    }
}
