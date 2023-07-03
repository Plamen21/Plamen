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
        $studetsByCourse = [
            7 => [7, 14, 21, 28, 30, 2, 4],
            6 => [6, 13, 20, 27],
            5 => [5, 12, 19, 26]
        ];
        $projectsByCourse = [
            7 => [
                ['module_id' => 31, 'project_name' => 'HTML'],
                ['module_id' => 32, 'project_name' => 'CSS'],
                ['module_id' => 33, 'project_name' => 'JavaScript'],
                ['module_id' => 34, 'project_name' => 'RestFl API'],
                ['module_id' => 35, 'project_name' => 'NodeJS'],
                ['module_id' => 36, 'project_name' => 'RxJS'],
                ['module_id' => 37, 'project_name' => 'Angulara'],
                ],
            6 => [
                ['module_id' => 27, 'project_name' => 'PHP'],
                ['module_id' => 28, 'project_name' => 'PHP OOP'],
                ['module_id' => 29, 'project_name' => 'Laravel'],
                ['module_id' => 30, 'project_name' => 'SQL'],
            ],
            5 => [
                ['module_id' => 23, 'project_name' => 'C++'],
                ['module_id' => 24, 'project_name' => 'Python'],
                ['module_id' => 25, 'project_name' => 'Linux'],
                ['module_id' => 26, 'project_name' => 'Shell'],
            ],
        ];

        $records = [];

        foreach ($studetsByCourse as $courseId => $studentIds) {
            foreach ($projectsByCourse[$courseId] as $project) {
                $moduleId = $project['module_id'];
                $projectId = $project['project_name'];

                foreach ($studentIds as $studentId) {
                        $projectStatus = ['Excellent', 'Good', 'Satisfactory', 'Unsatisfactory '][mt_rand(0, 3)];

                        $record = [
                            'student_id' => $studentId,
                            'course_id' => $courseId,
                            'module_id' => $moduleId,
                            'project_name' => $projectId,
                            'project_score' => $projectStatus,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];

                        $records[] = $record;

                }
            }
        }

        DB::table('student_projects')->insert($records);
    }
}
