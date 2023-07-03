<?php

namespace App\Http\Controllers\Customer;

use App\Models\User;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrainerController extends Controller
{
    public function index(){

        $courses = Course::all();
        return view('trainer.course.coursesList',['courses'=>$courses]);
    }

    public function create(Request $request){
        
        $users = User::find($request->id);
        return view('trainer.student.addStudent',['user'=>$users]);
    }

    public function chooseStudent(){

        $users = User::whereHas('role', function ($query) {
            $query->where('role', 'student');
        })->get();

        return view('trainer.student.chooseStudent',['user'=>$users]);
    }

    public function store(Request $request){

        $request->validate([
            'student_name' => 'required',
            'family_name' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'city' => 'required',
            'language' => 'required',
            'short_info' => 'required',
        ]);

        $student=new Student();
        $student -> student_name = $request->student_name;
        $student->family_name=$request->family_name;
        $student->phone=$request->phone;
        $student->country=$request->country;
        $student->city=$request->city;
        $student->language=$request->language;
        $student->repository=$request->repository ?? 'www.codeacademy.com';
        $student->short_info=$request->short_info;
        $student->cv=$request->cv ?? 'www.codeacademy.com';
        $student->user_id = $request->id;
        $student->save();

        return redirect()->route('trainer.studentsList');

    }


    public function studentForm(Request $request,$id)
    {
    
    $student = Student::find($id);
    $user = User::where('id',$request->id)->first();

         return view('trainer.student.studentForm', compact('student','user'));
    }

    public function studentsList(){

        $students = Student::with('user')->whereHas('user', function ($query) {
            $query->whereHas('role', function ($query) {
                $query->where('role', 'student');
            });
        })->get();
    
        return view('trainer.student.studentsList',compact('students'));
    }

    public function update(Request $request,$id){
        
        $student = Student::where('id',$id)->first();
        $student -> student_name = $request->student_name;
        $student->family_name=$request->family_name;
        $student->user->email = $request ->email ;
        $student->phone=$request->phone;
        $student->country=$request->country;
        $student->city=$request->city;
        $student->language=$request->language;
        $student->repository=$request->repository ?? 'www.codeacademy.com';
        $student->short_info=$request->short_info;
        $student->cv=$request->cv ?? 'www.codeacademy.com';
        $student ->save();
        
        return redirect()->route('trainer.studentsList');
    }

    public function destroy($id){

        $student = Student::find($id);
        $student -> delete();
        return redirect()->route('trainer.studentsList');

    }
    public function grades(Request $request,$id){

        //$student = Student::find($id);
        return view('trainer.studentGrades');

    }
}
