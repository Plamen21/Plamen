<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentsCoursesSeeder extends Seeder
{
    public function run()
    {
        // Create Faker instance
        $faker = Faker::create();

        // Get all user and course IDs
        $userIds = DB::table('users')->pluck('id')->all();
        $courseIds = DB::table('courses')->pluck('id')->all();

        // Generate dummy student-course relationships
        for ($i = 1; $i <= 10; $i++) {
            $userId = $faker->randomElement($userIds);
            $courseId = $faker->randomElement($courseIds);

            DB::table('students_courses')->insert([
                'user_id' => $userId,
                'course_id' => $courseId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
