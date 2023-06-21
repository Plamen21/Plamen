<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CourseModulesSeeder extends Seeder
{
    public function run()
    {
        // Create Faker instance
        $faker = Faker::create();

        // Get all course IDs
        $courseIds = DB::table('courses')->pluck('id')->all();

        // Generate dummy course modules
        for ($i = 1; $i <= 10; $i++) {
            $courseId = $faker->randomElement($courseIds);

            DB::table('courses_modules')->insert([
                'course_id' => $courseId,
                'module_name' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
