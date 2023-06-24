<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('student_project')->insert([
            [
                'student_id' => 1,
                'course_id' => 1,
                'module_id' => 1,
                'project_name' => 'Project A',
                'project_score' => 'Excellent',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 2,
                'course_id' => 2,
                'module_id' => 2,
                'project_name' => 'Project B',
                'project_score' => 'Good',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more data as needed
        ]);
    }
}
