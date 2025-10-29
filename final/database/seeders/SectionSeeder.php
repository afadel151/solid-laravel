<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\Section;
use App\Models\Sector;
use App\Models\Year;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = Room::all()->pluck('id')->toArray();
        $years = Year::all();
        foreach ($years as $year) {
            foreach ($year->sectors() as $sector) {
                Section::insert([
                    [
                        'section_name' => '1',
                        'sector_id' => $sector->id,
                        'room_id' => $rooms[array_rand($rooms)],
                    ],
                    [
                        'section_name' => '2',
                        'sector_id' => $sector->id,
                        'room_id' => $rooms[array_rand($rooms)], 
                    ]
                ]
            );
            }
        }
    }
}
