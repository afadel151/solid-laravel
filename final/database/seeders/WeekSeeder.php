<?php

namespace Database\Seeders;

use App\Models\GlobalWeek;
use App\Models\Week;
use App\Models\Year;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $global_weeks = GlobalWeek::all()->pluck('id')->toArray();
        $years = Year::all()->pluck('id')->toArray();
        $global_weeks_count = count($global_weeks);
        $first_half_global_weeks = array_slice($global_weeks, 0, intval($global_weeks_count / 2));
        $second_half_global_weeks = array_slice($global_weeks, intval($global_weeks_count / 2));
        
        foreach ($first_half_global_weeks as $global_week) {
            foreach ($years as $year) {
                Week::create([
                    'global_week_id' => $global_week,
                    'year_id' => $year,
                    'semester' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        foreach ($second_half_global_weeks as $global_week) {
            foreach ($years as $year) {
                Week::create([
                    'global_week_id' => $global_week,
                    'year_id' => $year,
                    'semester' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
