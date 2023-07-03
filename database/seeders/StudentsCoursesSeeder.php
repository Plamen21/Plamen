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
            DB::table('students_courses')->insert([
                [
                'student_id' => 1,
                'course_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                ],
                [
                'student_id' => 2,
                'course_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                ],
                [
                'student_id' => 3,
                'course_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                ],
                [
                'student_id' => 4,
                'course_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
                ],
                [
                    'student_id' => 5,
                    'course_id' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 6,
                    'course_id' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 7,
                    'course_id' => 7,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 8,
                    'course_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 9,
                    'course_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 10,
                    'course_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 11,
                    'course_id' => 4,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 12,
                    'course_id' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 13,
                    'course_id' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 14,
                    'course_id' => 7,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 15,
                    'course_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 16,
                    'course_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 17,
                    'course_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                                        [
                    'student_id' => 17,
                    'course_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 18,
                    'course_id' => 4,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 19,
                    'course_id' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 20,
                    'course_id' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 21,
                    'course_id' => 7,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 22,
                    'course_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 23,
                    'course_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 24,
                    'course_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 25,
                    'course_id' => 4,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 26,
                    'course_id' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 27,
                    'course_id' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 28,
                    'course_id' => 7,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 29,
                    'course_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 30,
                    'course_id' => 7,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 1,
                    'course_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                                        [
                    'student_id' => 2,
                    'course_id' => 7,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 3,
                    'course_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 4,
                    'course_id' => 7,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
                    [
                    'student_id' => 5,
                    'course_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ],
            ]);

    }
}
