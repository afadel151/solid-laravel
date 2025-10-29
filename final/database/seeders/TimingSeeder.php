<?php

namespace Database\Seeders;

use App\Models\Timing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Timing::insert([
            ['session_start' => '08:00:00', 'session_finish' => '09:30:00'],
            ['session_start' => '09:45:00', 'session_finish' => '11:15:00'],
            ['session_start' => '11:30:00', 'session_finish' => '13:00:00'],
            ['session_start' => '13:15:00', 'session_finish' => '14:45:00'],
        ]);
    }
}
