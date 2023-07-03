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
        $studetsByCourse = [
            7 => [7, 14, 21, 28, 30, 2, 4],
            6 => [6, 13, 20, 27],
            5 => [5, 12, 19, 26]
        ];
        $modulesByCourse = [
            7 => [
                ['module_id' => 31, 'num_lectures' => 18],
                ['module_id' => 32, 'num_lectures' => 12],
                ['module_id' => 34, 'num_lectures' => 20],
                ['module_id' => 34, 'num_lectures' => 8],
                ['module_id' => 35, 'num_lectures' => 18],
                ['module_id' => 36, 'num_lectures' => 9],
                ['module_id' => 37, 'num_lectures' => 12],
                ],
            6 => [
                ['module_id' => 27, 'num_lectures' => 22],
                ['module_id' => 28, 'num_lectures' => 16],
                ['module_id' => 29, 'num_lectures' => 20],
                ['module_id' => 29, 'num_lectures' => 10],
            ],
            5 => [
                ['module_id' => 23, 'num_lectures' => 17],
                ['module_id' => 24, 'num_lectures' => 8],
                ['module_id' => 25, 'num_lectures' => 9],
                ['module_id' => 26, 'num_lectures' => 9],
            ],
        ];
        $records = [];
        foreach ($studetsByCourse as $courseId => $studentIds) {
            foreach ($modulesByCourse[$courseId] as $module) {
                $moduleId = $module['module_id'];
                $numLectures = $module['num_lectures'];

                foreach ($studentIds as $studentId) {
                    for ($lectureId = 1; $lectureId <= $numLectures; $lectureId++) {
                        $homeworkStatus = ['Completed', 'Incomplete', 'None'][mt_rand(0, 2)];
                        $homeworkStatus == 'None' ? $grade = 2 : $grade = mt_rand(20, 60) / 10;

                        $record = [
                            'student_id' => $studentId,
                            'course_id' => $courseId,
                            'module_id' => $moduleId,
                            'lecture_id' => $lectureId,
                            'homework_status' => $homeworkStatus,
                            'grade' => $grade,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];

                        $records[] = $record;
                    }
                }
            }
        }

        DB::table('student_homework')->insert($records);
    }
}
