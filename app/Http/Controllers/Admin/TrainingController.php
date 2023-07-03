<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrainingController extends Controller
{
    public function index(){
        $courses = Course::all();
        return view('admin.training.index',['courses'=>$courses]);
    }  

    public function create()
    {
        return view('admin.training.create');
    }

    public function store(Request $request){
        $request->validate([
                'title' => 'required',
                'description' => 'required',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'estimate' => 'required|numeric',]);

            $course=new Course();
            $course->title=$request->title;
            $course->description=$request->description;
            $course->start_date=$request->start_date;
            $course->end_date=$request->end_date;
            $course->estimate=$request->estimate;
            $course->save();
                 return redirect()->route('admin.training.index');
        }


    public function edit($id ) {
        $course = Course::findOrFail($id);

    return view('admin.training.edit', [
        'course' => $course,
    ]);
    }

    public function update(Request $request,$id)  {

        $course = Course::where('id',$id)->first();
        $course-> title = $request->title;
        $course -> description = $request ->description;
        $course -> start_date = $request -> start_date;
        $course -> end_date = $request -> end_date;
        $course -> estimate = $request -> estimate;

        $course->save();

        return redirect()->route('admin.training.index');
    }

    public function destroy($id){

        $user = Course::find($id);

        $user->delete();
        return redirect()->route('admin.training.index');
    }
}
