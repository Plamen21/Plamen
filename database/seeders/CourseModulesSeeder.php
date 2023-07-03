<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CourseModulesSeeder extends Seeder
{
    public function run()
    {
        // Create Faker instance
        $faker = Faker::create();

        // Get all course IDs
        $courseIds = DB::table('courses')->pluck('id')->all();



            DB::table('courses_modules')->insert([
                [
                'course_id' => 1,
                'module_name' => 'Java Basics',
                'created_at' => now(),
                'updated_at' => now(),
                ],
                [
                'course_id' => 1,
                'module_name' => 'Java Advanced and OOP',
                'created_at' => now(),
                'updated_at' => now(),
                ],
                [
                'course_id' => 1,
                'module_name' => 'Dev Tools & SPRING Boot',
                'created_at' => now(),
                'updated_at' => now(),
                ],
                [
                'course_id' => 1,
                'module_name' => 'Dev Tools & SPRING Boot',
                'created_at' => now(),
                'updated_at' => now(),
                ],
                [
                'course_id' => 1,
                'module_name' => 'PL/SQL',
                'created_at' => now(),
                'updated_at' => now(),
                ],
                [
                    'course_id' => 2,
                    'module_name' => 'HTML',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 2,
                    'module_name' => 'CSS',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 2,
                    'module_name' => 'JavaScript',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 2,
                    'module_name' => 'RESTful API',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 2,
                    'module_name' => 'NodeJS',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 2,
                    'module_name' => 'RxJS',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 2,
                    'module_name' => 'Angular - 18 часа лекции и упражнения',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 3,
                    'module_name' => 'Програмиране с езика С',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 3,
                    'module_name' => 'Въведение в ООП на С++',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 3,
                    'module_name' => 'Въведение в STL',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 3,
                    'module_name' => 'SQL',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 3,
                    'module_name' => 'PL/SQL',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 3,
                    'module_name' => 'EMBEDDED SQL / Pro*C',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 4,
                    'module_name' => 'Въведение в PHP',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 4,
                    'module_name' => 'PHP OOP',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 4,
                    'module_name' => 'Laravel',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 4,
                    'module_name' => 'SQL',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 5,
                    'module_name' => 'Програмиране с езика С ++я',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 5,
                    'module_name' => 'Въведение в Python',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 5,
                    'module_name' => 'Linux',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 5,
                    'module_name' => 'SHELL',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 6,
                    'module_name' => 'Въведение в PHP',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 6,
                    'module_name' => 'PHP OOP',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 6,
                    'module_name' => 'Laravel',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 6,
                    'module_name' => 'SQL',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 7,
                    'module_name' => 'HTML',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 7,
                    'module_name' => 'CSS',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 7,
                    'module_name' => 'JavaScript',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 7,
                    'module_name' => 'RESTful API',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 7,
                    'module_name' => 'NodeJS',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 7,
                    'module_name' => 'RxJS',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 7,
                    'module_name' => 'Angular',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
    }
}
