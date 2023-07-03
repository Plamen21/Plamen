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
            CoursesSeeder::class,
            StudentsCoursesSeeder::class,
            ClientsSeeder::class,
            CourseModulesSeeder::class,
            ModulesLectureSeeder::class,
            StudentAbsenceSeeder::class,
            StudentHomeworkSeeder::class,
            StudentProjectSeeder::class,
            RoleTableSeeder::class,
            UserDetailsSeeder::class,
            // Add other seeder classes here
        ]);
    }
}
