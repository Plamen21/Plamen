<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ModulesLectureSeeder extends Seeder
{
    public function run()
    {
        // Create Faker instance
        $faker = Faker::create();

        // Get all module IDs
        $moduleIds = DB::table('courses_modules')->pluck('id')->all();
        $courseIds = DB::table('courses')->pluck('id')->all();

        // Generate dummy module lectures
        for ($i = 1; $i <= 10; $i++) {
            $moduleId = $faker->randomElement($moduleIds);
            $courseId =$faker->randomElement($courseIds);
            DB::table('modules_lectures')->insert([
                'course_id'=>$courseId,
                'module_id' => $moduleId,
                'lecture_name' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
                'lecture_number'=>$i,
            ]);
        }
    }
}
