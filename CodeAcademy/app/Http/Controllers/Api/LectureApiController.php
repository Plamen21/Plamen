<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CoursesModule;
use App\Models\ModulesLecture;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;
use function Webmozart\Assert\Tests\StaticAnalysis\string;

class LectureApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function showAll(string $name)
    {

        $course = Course::where('title', $name)->first();
        if (is_null($course)) {
            return response()->json(['message' => 'No course match that criteria'], 404);
        } else {
            $modules = $course->modules()->get();
            $lectures = [];
            foreach ($modules as $modul) {
                $lecture = $modul->lecture;
                $lectures[] = $lecture;
            }

            return response()->json($lectures, 200, [JSON_PRETTY_PRINT]);
        }
    }


    public function getSpecific(string $training_name, string $lecture_number)
    {
        $course = Course::where('title', $training_name)->first();
        if (is_null($course)) {
            return response()->json(['message' => 'No course match that criteria'], 404);
        } else {
            $lecture = ModulesLecture::where('course_id', $course->id)
                ->where('lecture_number', $lecture_number)->first();

            if (is_null($lecture)) {
                return response()->json(['message' => 'no lecture with that number'], 404);
            } else {
                return response()->json($lecture, 200);
            }


        }


    }

    public function add(Request $request ,string $training_name,string $lecture_number)
    {
        $validator = Validator::make($request->all(),
            [
                'course_id' => 'integer|required|min:1',
                'module_id' => 'integer|required|min:1',
                'lecture_name' => 'string|min:3|max:100|required',
                'lecture_number' => 'integer|required|min:0'
            ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        } else {
            $module = CoursesModule::find($request->module_id);
            $course = Course::where('title', $training_name)->first();
            $lectureExist = ModulesLecture::where('lecture_name', $request->lecture_name)
                ->where('lecture_number', $request->lecture_number)->exists();
            if (!is_null($module) && !is_null($course) && $lectureExist === true) {
                return response()->json(['message' => 'Problem with creating check modul /course or if there is record with that king of parameters'], 400);
            } else {
                try {
                    $lecture = new ModulesLecture();
                    $lecture->course_id = $request->course_id;
                    $lecture->module_id = $request->module_id;
                    $lecture->lecture_name = $request->lecture_name;
                    $lecture->lecture_number = $request->lecture_number;
                    $lecture->save();
                } catch (QueryException $exp) {
                    return response()->json(['message' => 'Problem with creating'], 500);
                }
                return response()->json(['message' => 'lecture added successful'], 200);
            }
        }


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request ,string $training_title,string $lecture_number)
    {
        $validator = Validator::make($request->all(),
            [
                'course_id' => 'integer|required|min:1',
                'module_id' => 'integer|required|min:1',
                'lecture_name' => 'string|min:3|max:100|required',
                'lecture_number' => 'integer|required|min:0'
            ]);
        $course = Course::where('title', $training_title)->first();
        $lecture = ModulesLecture::where('lecture_number', $lecture_number)
            ->where('course_id', $course->id)->first();
        if (is_null($course) || is_null($lecture)) {
            return response()->json(['message' => 'No record is finded '], 404);
        } else {
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            } else {
                try {
                    $lecture->course_id = $request->course_id;
                    $lecture->module_id = $request->module_id;
                    $lecture->lecture_name = $request->lecture_name;
                    $lecture->lecture_number = $request->lecture_number;
                    $lecture->save();
                } catch (QueryException $exp) {
                    return response()->json(['message' => 'Problem with updating'], 500);
                }
                return response()->json(['message' => 'Success with updating lecture'], 200);
            }
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public
    function destroy(Request $request)
    {

        $course = Course::where('title', $request->training_name)->first();

        $lecture = ModulesLecture::where('lecture_number', $request->lecture_number)
            ->where('course_id', $course->id)->first();


        if (is_null($course) || is_null($lecture)) {
            return response()->json(['message' => 'Bad deleting request no record match that specific params'], 404);
        } else {
            $lecture->delete();
            return response(['message' => 'Lecture was successful deleted'], 200);
        }
    }
}
