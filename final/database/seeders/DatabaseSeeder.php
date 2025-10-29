<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            YearSeeder::class,
            RoomSeeder::class,
            SectorSeeder::class,
            SectionSeeder::class,
            GroupSeeder::class,
            ModuleSeeder::class,
            TeacherSeeder::class,
            TeacherModuleSeeder::class,
            GlobalWeekSeeder::class,
            TimingSeeder::class,
            WeekSeeder::class,
            SectorModuleSeeder::class,
            LearningSessionSeeder::class,
        ]);
    }
}
