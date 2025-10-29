<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Teacher;
use App\Models\TeacherModule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
class TeacherModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $teachers = Teacher::all()->pluck("id")->toArray();
        $modules = Module::all()->pluck("id")->toArray();
        
        for ($i = 0; $i < 40; $i++) {
            TeacherModule::create([
                'teacher_id' => $faker->randomElement($teachers),
                'module_id' => $faker->randomElement($modules),
                'lecture' => $faker->boolean,
                'dw' => $faker->boolean,
                'lab' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
