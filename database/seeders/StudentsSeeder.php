<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentsSeeder extends Seeder
{
    public function run()
    {
        // Create Faker instance
        $faker = Faker::create();

        $students = [];

        for ($i = 1; $i <= 30; $i++) {
            $language = ['English - A2', 'English - B1', 'English - B2', 'English - C1'][mt_rand(0, 3)];
            $student = [
                'user_id' => $i,
                'student_name' => $faker->firstName,
                'family_name' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'country' => $faker->country,
                'city' => $faker->city,
                'short_info' => $faker->sentence,
                'language'=>$language,
                'repository'=>$faker->url(),
                'cv' => $faker->url,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $students[] = $student;
        }
            DB::table('students')->insert($students);

    }
}
