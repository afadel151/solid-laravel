<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::insert([
            ['room_name' => 'A1', 'teaching_capacity' => 30],
            ['room_name' => 'A14', 'teaching_capacity' => 40],
            ['room_name' => 'B3', 'teaching_capacity' => 25],
        ]);
    }
}
