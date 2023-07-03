<?php

namespace App\Http\Controllers\Customer;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CoursesModule;
use App\Models\ModulesLecture;

class CoursesController extends Controller
{

    public function coursesList() {
        
        $courses = Course::all();
        return view('trainer.course.coursesList',compact('courses'));
    }

    public function editCourse(Request $request){
        
        $courses = Course::find($request->id);
        $modules = CoursesModule::where('course_id',$courses->id)->get();
        $module = $modules->first();
        $lecture = ModulesLecture::where('course_id',$courses->id)->where('module_id',$module->id)->get();
    
        return view('trainer.course.editCourse',compact('courses','modules','lecture'));
    }

    public function addCourse(){
        return view('trainer.course.addCourse');
    }

    public function storeCourse(Request $request){

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'estimate' => 'required|numeric',
            'module_name' => 'required|numeric',
            'lecture_name' => 'required|numeric',
        ]);

        $course = new Course();
        $course->title = $request->title;
        $course->description = $request->description;
        $course->start_date = $request->start_date;
        $course->end_date = $request->end_date;
        $course->estimate = $request->estimate ?? '15';
        $course ->save();

        $course_id = $course->id;
        $module = new CoursesModule();
        $module->module_name = $request->module_name;
        $module->course_id = $course_id;
        $module->save();

        $module_id= $module->id ;
        $lecture = new ModulesLecture();
        $lecture->lecture_name = $request->lecture_name;
        $lecture->course_id = $course_id;
        $lecture->module_id = $module_id ;
        
        if ($request->hasFile('lecture_photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('photos', 'public');
            $lecture->lecture_photo = $photoPath;
        }

        $nextLecture = ModulesLecture::where('module_id',$module_id)->max('lecture_number')+1;
        $lecture->lecture_number = $nextLecture ;
        
        $lecture->save();

        return redirect()->route('trainer.coursesList');

    }
    
    public function destroy($id){

        $course = Course::find($id);
        $course ->delete();
        return redirect()->route('trainer.coursesList');
    }

    public function chooseCourse(){
        $courses = Course::all();
        return view('trainer.course.editModuleLecture.chooseCourse', compact('courses'));
    }

    public function addModule(Request $request,$id){

        $courses = Course::find($id);
        $modules = CoursesModule::where('course_id',$courses->id)->get();
      
        return view('trainer.course.editModuleLecture.editModule',compact('courses','modules'));
    }

    public function chooseCourseModule(Request $request,$id){

        $courses = Course::find($id);
        $modules = CoursesModule::find($request->module_id);
        return view('trainer.course.editCourse',compact('courses','modules'));        
    }

    public function addLecture(Request $request,$id){

        $courses = Course::find($id);
        $modules = CoursesModule::where('course_id',$courses->id)->get();
        $lectures = ModulesLecture::where('module_id', $request->module_id)->get();

        return view('trainer.course.editModuleLecture.editLecture',compact('courses','modules','lectures'));
    }

    public function chooseModuleLecture(Request $request,$id){

        $courses = Course::find($id);
        $modules = CoursesModule::find($request->module_id);
        $lectures = ModulesLecture::find($request->lecture_id);
        return view('trainer.course.editCourse',compact('courses','modules','lectures'));
    }

    public function updateCourse(Request $request,$id){

        $course = Course::find($id);
        $modules = CoursesModule::where('course_id',$request->id)->first();
        $lectures = ModulesLecture::where('course_id',$request->id)->where('module_id',$modules->id)->first();
        $course->title = $request -> title ;
        $course->description = $request->description;
        $course->start_date = $request->start_date;
        $course->end_date = $request->end_date;

        $modules->module_name = $request->module_name;
        $lectures->lecture_name = $request->lecture_name;
        $course->update();

        return redirect()->route('trainer.coursesList');
    }

}
