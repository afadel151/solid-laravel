<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 30; $i++) {
            Teacher::create([
                'teacher_name' => $faker->name,
                'teacher_email' => $faker->unique()->safeEmail,
                'teacher_grade' => $faker->word,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
