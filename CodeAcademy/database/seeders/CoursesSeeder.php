<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CoursesSeeder extends Seeder
{
    public function run()
    {
        // Create Faker instance
        $faker = Faker::create();

        // Generate dummy courses
        for ($i = 1; $i <= 10; $i++) {
            DB::table('courses')->insert([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'start_date' => $faker->date('Y-m-d', '+1 week'),
                'end_date' => $faker->date('Y-m-d', '+4 weeks'),
                'estimate' => $faker->randomFloat(2, 1, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
