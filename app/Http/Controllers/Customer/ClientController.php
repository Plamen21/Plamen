<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Course;
use App\Models\ModulesLecture;
use App\Models\CoursesModule;
use App\Models\Student;
use App\Models\StudentAbsence;
use App\Models\StudentHomework;
use App\Models\StudentProject;
use App\Models\StudentsCourse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use stdClass;

class ClientController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $accessCourses = Client::where('user_id', $user_id)->get();
        $arrayOfObjects = [];
        foreach ($accessCourses as $course) {
            $courseMod = Course::where('id', $course->course_id)->first();
            $courseObj = new stdClass();
            $courseObj->students = count(StudentsCourse::where('course_id', $course->course_id)->get());
            $courseObj->title = $courseMod->title;
            $courseObj->id = $course->course_id;
            $modules = CoursesModule::where('course_id', $course->course_id)->get();
            $courseObj->modules_number = count($modules);
            $lecture_number = 0;
            foreach ($modules as $modul) {
                $lecture_number += count(ModulesLecture::where('module_id', $modul->id)->where('course_id', $course->course_id)->get());
            }
            $courseObj->lectures_number = $lecture_number;
            $arrayOfObjects[] = $courseObj;
        }
        return view('client.index', compact('arrayOfObjects'));
    }

    public function showSpecific(int $course_id)
    {
        $course = Course::find($course_id);
        $students = StudentsCourse::where('course_id', $course_id)->get();
        $studentInfo = [];
        $arrOfStudentsObj = [];
        $modules = CoursesModule::where('course_id', $course_id)->get();

        foreach ($students as $student) {
            $studentAbsence = StudentAbsence::where('course_id', $student->course_id)->where('student_id', $student->student_id)->get();
            foreach ($studentAbsence as $absence) {
                $studentInfo[$student->student_id]['absence'][] = $absence->absence;
            }

            $studentHomework = StudentHomework::where('student_id', $student->student_id)->where('course_id', $student->course_id)->get();
            foreach ($studentHomework as $homework) {
                $studentInfo[$student->student_id]['grade'][] = $homework->grade;
            }


        }

        foreach ($studentInfo as $key => $value) {
            $student = new stdClass();
            $studentMod = Student::find($key);
            $student->id = $key;
            $student->language = $studentMod->language;
            $student->name = $studentMod->student_name;
            $student->family_name = $studentMod->family_name;
            if($studentMod->overall_performance==null){
                $student->overall_performance='No information yet';
            }
            else{
                $student->overall_performance=$studentMod->overall_performance;
            }
            $studentGrades = [];
            $studentActivities = [];
            foreach ($value as $k => $val) {
                foreach ($val as $v) {
                    if ($k == 'grade') {
                        $studentGrades [] = $v;
                    }
                    if ($k == 'absence') {
                        if ($v == '') {
                            $studentActivities [] = 1;

                        } elseif ($v == 'Was late') {
                            $studentActivities[] = 0.75;

                        } elseif ($v == 'Escaped') {
                            $studentActivities[] = 0.25;

                        } elseif ($v == 'Did not come') {
                            $studentActivities [] = 0;
                        } else {
                            $studentActivities [] = 0.30;
                        }
                    }
                }
            }
            if (count($studentActivities) > 0) {
                $student->activity = round(array_sum($studentActivities) / count($studentActivities) * 100);
            } else {
                $student->activity = "No information yet";
            }
            if (count($studentGrades) > 0) {
                $student->final_score = round(array_sum($studentGrades) / count($studentGrades));
            } else {
                $student->final_score = "No information yet";
            }


            $arrOfStudentsObj[] = $student;

        }

        return view('client.clientCourseInfo', compact('arrOfStudentsObj', 'modules', 'course_id'));
        //TODO maybe need to be one table for projects

    }

    public function showModuleInfo(Request $request, int $course_id)
    {
        $moduleName = $request->modules;
        $module = CoursesModule::where('module_name', $moduleName)->where('course_id', $course_id)->first();
        $studentsWithThatCourse = StudentsCourse::where('course_id', $course_id)->get();
        $studentsIds = [];
        $arrayOfStudentsObj = [];
        foreach ($studentsWithThatCourse as $info) {
            $studentsIds[] = $info->student_id;
        }
        foreach ($studentsIds as $studentId) {
            $student = new stdClass();
            $student->id = $studentId;
            $studentMod = Student::find($studentId);
            $student->first_name = $studentMod->student_name;
            $student->family_name = $studentMod->family_name;
            $student_grades = [];
            $student_absence = [];
            $studentAbsenceMod = StudentAbsence::where('student_id', $studentId)
                ->where('module_id', $module->id)
                ->where('course_id', $course_id)->get();
            $studentHomeworkMod = StudentHomework::where('student_id', $studentId)
                ->where('module_id', $module->id)
                ->where('course_id', $course_id)->get();
            foreach ($studentAbsenceMod as $abs) {
                if ($abs->absence == '') {
                    $student_absence[] = 1;
                } elseif ($abs->absence == 'Was late') {
                    $student_absence[] = 0.75;

                } elseif ($abs->absence == 'Escaped') {
                    $student_absence[] = 0.25;
                } elseif ($abs->absence == 'Did not come') {
                    $student_absence[] = 0;
                } else {
                    $student_absence[] = 0.30;
                }
            }
            foreach ($studentHomeworkMod as $hom) {
                $student_grades[] = $hom->grade;
            }
            if (count($student_absence) > 0) {

                $student->activity = round(array_sum($student_absence) / count($student_absence) * 100);
            } else {
                $student->activity = 'No information yet';
            }
            if (count($student_grades) > 0) {

                $student->final_score = round(array_sum($student_grades) / count($student_grades));
            } else {
                $student->final_score = 'No information yet';
            }
            $arrayOfStudentsObj[] = $student;
        }
        return view('client.clientCourseModuleInfo', compact('arrayOfStudentsObj', 'module'));


    }

    public function showInfoAboutStudent(int $student_id)
    {
        $student = Student::findOrFail($student_id);
        $user = User::findOrFail($student->user_id);
        $courses = StudentsCourse::where('student_id', $student_id)->get();
        $coursesCount = count($courses);
        $email = $user->email;

        return view('client.clientStudentInfo', compact('student', 'email', 'coursesCount',));
    }

    public function saveCv(int $student_id)
    {
        $student = Student::findOrFail($student_id);
        $studentCvLink = $student->cv;

        if ($studentCvLink == '') {
            return redirect()->route('client.student.info', ['student_id' => $student_id])->with('error', 'No CV is provided for this user');
        }

        $filename = str_replace("public/", "", $studentCvLink);
        if (Storage::disk('public')->exists($filename)) {
            return Storage::disk('public')->download($filename);
        }

        return redirect()->route('client.student.info', ['student_id' => $student_id])
            ->with('error', 'There is a problem with downloading the student CV. The best thing to do is contact the admin.');
    }


    public function projects_info(int $student_id){

        $student = Student::findOrFail($student_id);
        $projectsMod=StudentProject::where('student_id',$student_id)->get();
        $projects=[];

        foreach ($projectsMod as $mod){
            $projectInf=new stdClass();
            $course=Course::find($mod->course_id);
            $module=CoursesModule::find($mod->module_id);
            $projectInf->project_name=$mod->project_name;
            $projectInf->project_score=$mod->project_score;
            $projectInf->module_name=$module->module_name;
            $projectInf->course_name=$course->title;
            $projects[]=$projectInf;
        }
        return view('client.clientStudentProjectsInfo',compact('projects'));
    }

}
