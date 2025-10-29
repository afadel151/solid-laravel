<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Sector;
use App\Models\SectorModule;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
class SectorModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $sectors = Sector::all()->pluck('id')->toArray();
        $modules = Module::all()->pluck('id')->toArray();
        for ($i = 0; $i < 30; $i++) {
            SectorModule::create([
                'sector_id' => $faker->randomElement($sectors),
                'module_id' => $faker->randomElement($modules),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
    }
}
