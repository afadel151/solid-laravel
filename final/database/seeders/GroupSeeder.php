<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Section;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = Section::all()->pluck('id')->toArray();
        foreach ($sections as $section) {
            Group::insert([
                ['group_name' => '1', 'section_id' => $section->id],
                ['group_name' => '2', 'section_id' => $section->id],
            ]);
        }
    }
}
