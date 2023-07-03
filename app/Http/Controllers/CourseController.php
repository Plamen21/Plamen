<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(10);


        return view('courses.index', compact('courses'));
    }

    public function show($id)
    {
        $course = Course::find($id);
        $modules=$course->modules()->get();
        $lectureCount=0;
        foreach ($modules as $module){
            $lectureCount+= count($module->lecture()->get());

        }
       $modulesCount=count($modules);

        return view('PublicUserViews.courseView', compact('course','modulesCount','lectureCount'));
    }
}
