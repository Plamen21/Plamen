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


             DB::table('courses')->insert([

            [
                'title' => 'JUNIOR WEB BACK-END DEVELOPER JAVA, SPRING, SQL и PL/SQL',
                'description' => 'За хора с базови познания и средно напреднали',
                'start_date' => '2024-1-15',
                'end_date' => '2024-7-15',
                'estimate' => $faker->randomFloat(2, 1, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'JUNIOR FRONT-END DEVELOPER',
                'description' => 'За хора с базови познания и средно напреднали',
                'start_date' => '2023-11-13',
                'end_date' => '2024-3-18',
                'estimate' => $faker->randomFloat(2, 1, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'JUNIOR BACK-END DEVELOPER СЪС SQL, PL/SQL, Pro*C, C И С++',
                'description' => 'За хора с базови познания и средно напреднали',
                'start_date' => '2024-1-15',
                'end_date' => '2024-7-22',
                'estimate' => $faker->randomFloat(2, 1, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'JUNIOR DEVOPS ENGINEER',
                'description' => 'За хора с базови познания и средно напреднали',
                'start_date' => '2024-1-23',
                'end_date' => '2024-6-1',
                'estimate' => $faker->randomFloat(2, 1, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'JUNIOR DEVELOPER СЪС С++, PYTHON, LINUX и BASIC BASH',
                'description' => 'За хора с базови познания и средно напреднали',
                'start_date' => '2023-4-12',
                'end_date' => '2023-10-17',
                'estimate' => $faker->randomFloat(2, 1, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'JUNIOR DEVЕLOPER WITH PHP',
                'description' => 'За хора с базови познания и средно напреднали',
                'start_date' => '2023-2-28',
                'end_date' => '2023-7-5',
                'estimate' => $faker->randomFloat(2, 1, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'JUNIOR FRONT-END DEVELOPER',
                'description' => 'За хора с базови познания и средно напреднали',
                'start_date' => '2023-2-15',
                'end_date' => '2023-6-21',
                'estimate' => $faker->randomFloat(2, 1, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            ]);

    }
}
