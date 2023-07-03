<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\ModulesLecture;
use App\Models\Student;
use App\Models\StudentAbsence;
use App\Models\StudentHomework;
use App\Models\StudentProject;
use App\Models\StudentsCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use stdClass;
use App\Models\CoursesModule;
use Illuminate\Pagination\LengthAwarePaginator;

class StudentCourseController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->first();
        $courses=[];
        if(is_null($student)){
            $courses=null;
        }else{
            $studentCourseModel=StudentsCourse::where('student_id',$student->id)->get();
            foreach ($studentCourseModel as $course){
                $courseMod=Course::find($course->course_id);
                $courses[]=$courseMod;
            }
        };

        return view('student.courses.index', compact( 'student','courses','student'));
    }

    public function info(int $course_id, int $student_id)
    {
        $student = Student::find($student_id);
        $studentCourseMod = StudentsCourse::where('course_id', $course_id)->where('student_id', $student_id)->first();
        if ($studentCourseMod->overall_performance==null){
            $overall_performance="no information yet";
        }
        else{
            $overall_performance=$studentCourseMod->overall_performance;
        }
        $arr = ['course_id' => $course_id, 'student_id' => $student_id,'overall_performance'=>$overall_performance];


        return view('student.courses.overall-progress', compact('student', 'arr'));
    }

    public function saveCv(int $student_id)
    {
        $student = Student::find($student_id);
        $studentCvLink = $student->cv;

        if ($studentCvLink == '') {
            return redirect()->route('client.student.info', ['student_id' => $student_id])->with('error', 'No CV is provided for this user');
        }

        $filename = str_replace("public/", "", $studentCvLink);
        if (Storage::disk('public')->exists($filename)) {
            return Storage::disk('public')->download($filename);
        }

        return redirect()->back()->with('error', 'There is a problem with downloading your CV. The best thing to do is contact the admin.');

    }

    public function getGrades(Request $request, int $course_id, int $student_id)
    {
        $student = Student::find($student_id);
        $course = Course::find($course_id);
        $course_modules = $course->modules()->get();
        $arrayOfObjects = [];
        $lectures = collect();
        $perPage = 15;
        if (!isset($request->module)) {

            foreach ($course_modules as $module) {
                $lectures->push(ModulesLecture::where('module_id', $module->id)->get());

            }
            foreach ($lectures as $lectureCollection) {
                foreach ($lectureCollection as $lecture) {

                    $fullInfo = new stdClass();
                    $homework = StudentHomework::where('lecture_id', $lecture->id)->first();
                    $absence = StudentAbsence::where('lecture_id', $lecture->id)
                        ->where('student_id', $student_id)->first();
                    if (!is_null($homework)) {
                        $fullInfo->homework_status = $homework->homework_status;
                        $fullInfo->score = $homework->grade;

                    } else {
                        $fullInfo->homework_status = 'No information yet';
                        $fullInfo->score = 'No information yet';
                    }
                    if (!is_null($absence)) {
                        if ($absence->absence == '') {
                            $fullInfo->absence = 'Was there';
                        } else {
                            $fullInfo->absence = $absence->absence;
                        }

                    } else {
                        $fullInfo->absence = 'No information yet';
                    }

                    $fullInfo->lecture_number = $lecture->lecture_number;
                    $fullInfo->lecture_name = $lecture->lecture_name;

                    $arrayOfObjects[] = $fullInfo;
                }
            }
        } else {
            $lecturesSpec = ModulesLecture::where('course_id', $course_id)
                ->where('module_id', $request->module)
                ->get();

            foreach ($lecturesSpec as $spec) {
                $obj = new stdClass();
                $obj->lecture_number = $spec->lecture_number;
                $obj->lecture_name = $spec->lecture_name;
                $homeworkSpec = StudentHomework::where('student_id', $student_id)
                    ->where('course_id', $course_id)
                    ->where('module_id', $request->module)
                    ->where('lecture_id', $spec->id)->first();
                $absenceSpec = StudentAbsence::where('student_id', $student_id)
                    ->where('course_id', $course_id)
                    ->where('module_id', $request->module)
                    ->where('lecture_id', $spec->id)->first();
                if ($absenceSpec == null) {
                    $obj->absence = "No information yet";
                } else {
                    if ($absenceSpec == '') {
                        $obj->absence = "Was there";
                    } else {
                        $obj->absence = $absenceSpec->absence;
                    }
                }
                if ($homeworkSpec == null) {
                    $obj->homework_status = 'No information yet';
                    $obj->score = 'No information yet';
                } else {
                    $obj->homework_status = $homeworkSpec->homework_status;
                    $obj->score = $homeworkSpec->grade;
                }
                $arrayOfObjects[] = $obj;
            }
        }
        if (isset($request->module)) {
            $lecturesSpecCollection = collect($arrayOfObjects);
            $page = $request->input('page', 1);

            $total = $lecturesSpecCollection->count();
            $results = $lecturesSpecCollection->slice(($page - 1) * $perPage, $perPage)->values();

            $arrayOfObjectsPaged = new LengthAwarePaginator($results, $total, $perPage, $page, [
                'path' => $request->url(),
                'query' => $request->query(),
            ]);
        } else {
            $arrayOfObjectsCollection = collect($arrayOfObjects);
            $page = $request->input('page', 1);

            $total = $arrayOfObjectsCollection->count();
            $results = $arrayOfObjectsCollection->slice(($page - 1) * $perPage, $perPage)->values();

            $arrayOfObjectsPaged = new LengthAwarePaginator($results, $total, $perPage, $page, [
                'path' => $request->url(),
                'query' => $request->query(),
            ]);
        }

        return view('student.courses.grades', compact('arrayOfObjectsPaged', 'student', 'course_id', 'student_id', 'course_modules'));


    }

    public function getProjects(int $course_id, int $student_id)
    {

        $student_projects = StudentProject::where('student_id', $student_id)->where('course_id', $course_id)->get();
        $arrOfObj = [];
        foreach ($student_projects as $project) {
            $pro = new stdClass();
            $pro->name = $project->project_name;
            $pro->score = $project->project_score;
            $moduleMod = CoursesModule::find($project->module_id);
            $courseMod = Course::find($project->course_id);
            $pro->course_name = $courseMod->title;
            $pro->module_name = $moduleMod->module_name;
            $arrOfObj[] = $pro;
        }
        return view('student.courses.projects', compact('arrOfObj'));
    }

    public function getLectures(Request $request,int $course_id, int $student_id)
    {

        if (is_null($request->module)){
            $lectures = ModulesLecture::where('course_id', $course_id)->simplePaginate(10);
        }else{
            $module=CoursesModule::findOrFail($request->module);
            $lectures=ModulesLecture::where('course_id',$course_id)->where('module_id',$module->id)->paginate(10);
        }
       list($day,$date)= self::getTime();
        $modules=CoursesModule::where('course_id',$course_id)->get();
        return view('student.courses.lectures',compact('day','date','lectures','modules','course_id','student_id'));
    }
    public static function getTime(){
        $currentDate = date("l, d F Y");
        return list($day, $date) = explode(", ", $currentDate);
    }


}
//TODO: implement lecture active
