<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\StudentsCourse;
use App\Http\Controllers\Controller;

class StudentApiController extends Controller
{
    public function getStudentCourses($studentId)
    {
        $courses = StudentsCourse::where('user_id', $studentId)
            ->with('course')
            ->get();

        return response()->json($courses);
    }

    public function showStudentCourses($studentId)
    {
        $student = Student::findOrFail($studentId);
        $courses = $student->students()->courses;
    
        return response()->json($courses);
    }
}
