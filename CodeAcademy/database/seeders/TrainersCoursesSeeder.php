<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TrainersCoursesSeeder extends Seeder
{
    public function run()
    {
        // Create Faker instance
        $faker = Faker::create();

        // Get all trainer and course IDs
        $trainerIds = DB::table('trainers')->pluck('id')->all();
        $courseIds = DB::table('courses')->pluck('id')->all();

        // Generate dummy trainer course records
        for ($i = 1; $i <= 10; $i++) {
            $trainerId = $faker->randomElement($trainerIds);
            $courseId = $faker->randomElement($courseIds);

            DB::table('trainer_courses')->insert([
                'trainer_id' => $trainerId,
                'course_id' => $courseId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
