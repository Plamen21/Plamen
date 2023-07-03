<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use App\Models\StudentsCourse;
use App\Models\StudentsDetail;
use App\Models\UserDetails;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StudentDetailsRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use stdClass;
class StudentController extends Controller
{
    public function editProfile()
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $details = UserDetails::where('user_id', $user_id)->get();
        $student_id = Student::where('user_id', $user_id)->first();
        $studentDetails = Student::where('user_id', $user_id)->first();

        $user_webPages = [];
        $user_MsgNames = [];
        $user_hobbies = [];
        $user_skills = [];
        $student_detailsArr = ['first_name' => '', 'family_name' => '',
            'phone' => '', 'country' => '', 'city' => '',
            'short_info' => '', 'cv' => '', 'email' => '','repository'=>'','language'=>''];
        if (count($details) > 0) {
            foreach ($details as $detail) {
                if ($detail->type == 'web_page') {
                    $user_webPages[] = $detail->value;
                }
                if ($detail->type == 'messenger_name') {
                    $user_MsgNames[] = $detail->value;
                }
                if ($detail->type == 'hobby') {
                    $user_hobbies[] = $detail->value;
                }
                if ($detail->type == 'skill') {
                    $user_skills[] = $detail->value;
                }
            }
        }

        if (!empty($studentDetails)) {
            $student_detailsArr['first_name'] = $studentDetails->student_name;
            $student_detailsArr['family_name'] = $studentDetails->family_name;
            $student_detailsArr['phone'] = $studentDetails->phone;
            $student_detailsArr['country'] = $studentDetails->country;
            $student_detailsArr['city'] = $studentDetails->city;
            $student_detailsArr['repository']=$studentDetails->repository;
            $student_detailsArr['language']=$studentDetails->language;
            $student_detailsArr['short_info'] = $studentDetails->short_info;
            $student_detailsArr['cv'] = $studentDetails->cv;
        }


        return view('student.profile.profile',compact('user_webPages','user_skills','user_hobbies','user_MsgNames','student_detailsArr','user'));
    }

    public function editProfileUpdate(Request $request)
    {

        $file = $request->file('filename');
        $filePath = '';
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $student = Student::where('user_id', $user_id)->first();

        $validator = Validator::make($request->all(),
            ['first_name' => 'required|string|min:3|max:15',
                'family_name' => 'required|string|min:3|max:15',
                'phone' => 'required|string|min:5',
                'language' => 'required|string|min:3',
                'city' => 'required|string|min:3',
                'country'=>'required|string',
                'short_info' => 'required|string|min:10|max:100',
                'repository'=>'url|required',
                'filename'=>'file|mimes:pdf,doc,docx']);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if(is_null($student)) {
            $student = new Student();
        }


        $student->user_id = $user_id;

        if (!is_null($file)) {
            $filePath = $file->store('public');
            if ($student->cv != '') {
                $old_file=$student->cv;
                $filename = str_replace("public/", "", $old_file);
                $student->cv='';
                if (Storage::exists("public/$filename")) {
                    Storage::delete("public/$filename");
                }
            }
        }
        if($filePath!='') {
            $student->cv = $filePath;
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }


        $student->student_name = $request->first_name;
        $student->family_name = $request->family_name;
        $student->phone = $request->phone;
        $student->country = $request->country;
        $student->city = $request->city;
        $student->short_info = $request->short_info;
        $student->language=$request->language;
        $student->repository=$request->repository;


        if($filePath!='') {
            $student->cv = $filePath;
        }
        $student->save();

    //TODO impement succes error page
        return redirect()->to('/')->with('success', 'Profile settings was saved.');
    }
}
