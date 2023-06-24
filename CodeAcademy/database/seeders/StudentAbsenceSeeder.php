<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentAbsenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('student_absence')->insert([
            [
                'student_id' => 1,
                'course_id' => 1,
                'module_id' => 1,
                'lecture_id' => 1,
                'absence' => 'was there',
                'absence_note' => 'No note',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 2,
                'course_id' => 2,
                'module_id' => 2,
                'lecture_id' => 2,
                'absence' => 'was there',
                'absence_note' => 'No note',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more data as needed
        ]);
    }
}
