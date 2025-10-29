<?php

namespace Database\Seeders;

use App\Models\Year;
use Illuminate\Database\Seeder;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Year::insert([
            ['year' => 1],
            ['year' => 2],
            ['year' => 3],
        ]);
    }
}
