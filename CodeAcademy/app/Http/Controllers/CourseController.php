<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {

    }

    public function show($id)
    {

        $course = Course::find($id);


        return view('PublicUserViews.courseView', ['description' => $course->description,'title'=>$course->title]);
    }
}
