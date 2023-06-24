<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            StudentsSeeder::class,
            StudentsDetailsSeeder::class,
            CoursesSeeder::class,
            StudentsCoursesSeeder::class,
            ClientsSeeder::class,
            CourseModulesSeeder::class,
            ModulesLectureSeeder::class,
            TrainersSeeder::class,
            TrainersCoursesSeeder::class,
            StudentAbsenceSeeder::class,
            StudentHomeworkSeeder::class,
            StudentProjectSeeder::class,
            RoleTableSeeder::class,
            // Add other seeder classes here
        ]);
    }
}
