<?php

namespace Database\Seeders;

use App\Models\Module;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        $faker = Faker::create();
        
        for ($i = 0; $i < 30; $i++) {
            Module::create([
                'module_name' => $faker->word,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
