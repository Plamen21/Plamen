<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentsCourse;
use App\Models\Course;
use App\Models\CoursesModule;
use App\Models\ModulesLecture;
use App\Models\StudentAbsence;
use App\Models\StudentHomework;
use App\Models\StudentProject;
use Illuminate\Auth\Events\Validated;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PerformanceController extends Controller
{
    public function index(Request $request, $id)
    {
        $student = Student::find($id);
        $courseIDs = StudentsCourse::where('student_id', $id)->pluck('course_id')->toArray();
        $courses = Course::whereIn('id', $courseIDs)->get();
        $nextStudentExists = Student::where('id', '>', $id)->exists();


        return view('trainer.studentGrades', [
            'courses' => $courses,
            'student' => $student,
            'nextStudentExists'=> $nextStudentExists,
        ]);
    }

    public function modules(int $courseId)
    {
        $modules = CoursesModule::where('course_id', $courseId)->get();
        return response()->json($modules);
    }

    public function lectures(int $moduleId)
    {
        $lectures = ModulesLecture::where('module_id', $moduleId)->get();
        return response()->json($lectures);
    }

    public function date(int $courseId){
        $date = Course::where('id', $courseId)->get();
        return response()->json($date);
    }

    public function absences(int $studentId, int $courseId, int $moduleId, int $lectureId)
    {
        $absences = StudentAbsence::where('course_Id', $courseId)
            ->where('student_id', $studentId)
            ->where('module_id', $moduleId)
            ->where('lecture_id', $lectureId)
            ->get();

        return response()->json($absences);
    }
    public function homework(int $studentId, int $courseId, int $moduleId, int $lectureId)
    {
        $homework = StudentHomework::where('course_Id', $courseId)
            ->where('student_id', $studentId)
            ->where('module_id', $moduleId)
            ->where('lecture_id', $lectureId)
            ->get();

        return response()->json($homework);
    }

    public function projects(int $studentId, int $courseId, int $moduleId)
    {
        $projects = StudentProject::where('course_Id', $courseId)
            ->where('student_id', $studentId)
            ->where('module_id', $moduleId)
            ->get();

        return response()->json($projects);
    }

    public function save(Request $request)
    {

        $request->validate([
        'student'=>'required',
        'student'=>'required',
        'modules'=>'required',
        'lectures'=>'required',
        'homeworkgrades'=>'required',
        'homeworkStatus1'=>'required_with:homeworkgrades',
        'absenseDescription'=>'required_with:absenceReason',

        ]);

        $studentId = $request->input('student');
        $courseId = $request->input('courses');
        $moduleId = $request->input('modules');
        $lectureId = $request->input('lectures');
        $homeworkStatus = $request->input('homeworkStatus1');
        $homeworkgrades = $request->input('homeworkgrades');
        $projectName = $request->input('projectName');
        $projectkgrade = $request->input('projectGrade');
        $absenceReason = $request->input('absenceReason');
        $absenceDescription = $request->input('absenseDescription');

        $this->saveHomework($studentId, $courseId, $moduleId, $lectureId, $homeworkStatus, $homeworkgrades);
        $this->saveAbsence($studentId, $courseId, $moduleId, $lectureId, $absenceReason, $absenceDescription);
        $this->saveProject($studentId, $courseId, $moduleId, $projectName, $projectkgrade);

        return redirect()->to("/trainer/grades/$studentId");
    }

    public function saveHomework($studentId, $courseId, $moduleId, $lectureId, $homeworkStatus, $homeworkgrades ){

        if (!is_null($homeworkStatus) && in_array('Has homework', $homeworkStatus)) {
            if (in_array('not working', $homeworkStatus)) {
                $status = 'Incomplete';
            } else {
                $status = 'Completed';
            }
            } else {
            $status = 'None';
        }

        $homework = StudentHomework::updateOrCreate(
            [
                'student_Id' => $studentId,
                'course_Id' => $courseId,
                'module_Id' => $moduleId,
                'lecture_Id' => $lectureId
            ],
            [
                'homework_status' => $status,
                'grade' => $homeworkgrades,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );

    }
    public function saveAbsence($studentId, $courseId, $moduleId, $lectureId, $absenceReason, $absenceDescription)
    {
        if (!is_null($absenceReason)) {
         $absence =  StudentAbsence::updateOrCreate(
                [
                    'student_id' => $studentId,
                    'course_id' => $courseId,
                    'module_id' => $moduleId,
                    'lecture_id' => $lectureId
                ],
                [
                    'absence' => $absenceReason,
                    'absence_note' => $absenceDescription,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            );
        }
    }

    public function saveProject($studentId, $courseId, $moduleId, $projectName, $projectkgrade)
        {
            if (isset($projectName) && !empty($projectkgrade)) {
                $grade = '';
                if ($projectkgrade < 4) {
                    $grade ='Unsatisfactory';
                } elseif ($projectkgrade >= 4 && $projectkgrade < 5) {
                    $grade = 'Satisfactory';
                } elseif ($projectkgrade >= 5 && $projectkgrade < 6) {
                    $grade = 'Good';
                } elseif ($projectkgrade >= 6) {
                    $grade = 'Excellent';
                }
               $project = StudentProject::updateOrCreate(
                    [
                        'student_Id' => $studentId,
                        'course_Id' => $courseId,
                        'module_Id' => $moduleId
                    ],
                    [
                        'project_name' => $projectName,
                        'project_score' => $grade,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]
                );

            }
        }

    }


