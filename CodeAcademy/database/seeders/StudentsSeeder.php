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

        // Generate dummy students
        for ($i = 1; $i <= 10; $i++) {
            DB::table('students')->insert([
                'user_id' => $i,
                'student_name' => $faker->firstName,
                'family_name' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'country' => $faker->country,
                'city' => $faker->city,
                'language' => $faker->languageCode,
                'language_score' => $faker->numberBetween(1, 100),
                'repository' => $faker->url,
                'short_info' => $faker->sentence,
                'cv' => $faker->url,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
