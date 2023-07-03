<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class CourseApiController extends Controller
{
    public function index(){
        $courses=Course::all();
        return response()->json($courses);
    }
}
