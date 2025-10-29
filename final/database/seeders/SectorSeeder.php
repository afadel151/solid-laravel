<?php

namespace Database\Seeders;

use App\Models\Sector;
use App\Models\Year;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Sector::insert([
            ['sector_name' => 'Computer Science', 'year_id' => 1],
            ['sector_name' => 'Technical Science', 'year_id' => 1],
            ['sector_name' => 'Computer Science', 'year_id' => 2],
            ['sector_name' => 'Technical Science', 'year_id' => 2],
            ['sector_name' => 'Computer Science', 'year_id' => 3],
            ['sector_name' => 'Technical Science', 'year_id' => 3],
        ]);
    }
}
