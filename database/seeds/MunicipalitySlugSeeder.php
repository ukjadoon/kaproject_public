<?php

use App\Municipality;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MunicipalitySlugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $municipalities = Municipality::all();
        $municipalities->each(function ($municipality) {
            $municipality->slug = Str::slug($municipality->name);
            $municipality->update();
        });
    }
}
