<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentsDetailsSeeder extends Seeder
{
    public function run()
    {
        // Create Faker instance
        $faker = Faker::create();

        // Get all student IDs
        $studentIds = DB::table('students')->pluck('id')->all();

        // Generate dummy student details
        foreach ($studentIds as $studentId) {
            DB::table('students_details')->insert([
                'student_id' => $studentId,
                'web_page' => $faker->url,
                'messenger_name' => $faker->userName,
                'hobby' => $faker->word,
                'skill' => $faker->word,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
