<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentHomeworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('student_homework')->insert([
            [
                'student_id' => 1,
                'course_id' => 1,
                'module_id' => 1,
                'lecture_id' => 1,
                'homework_status' => 'Completed',
                'grade' => 4.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 2,
                'course_id' => 2,
                'module_id' => 2,
                'lecture_id' => 2,
                'homework_status' => 'Incomplete',
                'grade' => 3.2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more data as needed
        ]);
    }
}
