<?php

namespace Database\Seeders;

use App\Models\GlobalWeek;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class GlobalWeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 10; $i++) {
            GlobalWeek::create([
                'global_week_number' => $i,
                'global_week_type'=> $faker->randomElement(['Type A', 'Type B', 'Type C']),
                'start_week_date' => now()->startOfYear()->addWeeks($i),
            ]);
        }
    }
}
