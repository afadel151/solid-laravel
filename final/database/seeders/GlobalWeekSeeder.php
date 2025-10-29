<?php

namespace Database\Seeders;

use App\Models\GlobalWeek;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GlobalWeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            GlobalWeek::create([
                'global_week_number' => $i,
                'start_week_date' => now()->startOfYear()->addWeeks($i),
            ]);
        }
    }
}
