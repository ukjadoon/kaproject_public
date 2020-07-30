<?php

use Illuminate\Database\Seeder;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allMunicipalities = collect(app('App\Helpers\Municipality')->getAllMunicipalities());
        $allMunicipalities->each(function ($municipality) {
            if (app('App\Municipality')->where('name', $municipality)->get()->isEmpty()) {
                factory(App\Municipality::class)->create([
                    'name' => $municipality,
                    'price' => 25000,
                ]);
            }
        });
    }
}
