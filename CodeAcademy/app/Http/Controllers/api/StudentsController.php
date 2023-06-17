<?php

namespace App\Http\Controllers\Api;

use App\Models\Students;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    public function index(){
        $student = Students::all();
        if($student -> count() > 0){
         return response() ->json([
            'status' => '200',
            'student' => $student
         ],200) ;
        }else {
            return response()->json([
                'status' => 404,
                'mesage' => 'No record found'
            ], 404);
        } 
       
    }

    public function store(Request $request){

        $validator = Validator::make($request -> all(),[
            'name' => 'require|string|max191',
            'course' => 'require|string|max|101',
            'email' => 'require|email|max|101',
            'phone'=> 'require|max|digits:10;'
        ]);

        if($validator -> failed()){

            return response() -> json([
                'status' => 422,
                'errors' => $validator ->messages()

            ],422);
        }else{

            $student = Students ::create([
                'name' => $request -> name,
                'course' => $request -> course,
                'email' => $request -> email,
                'phone' => $request -> phone
            ]);

            if($student){
                return response() -> json([
                    'status' => 200,
                    'mesage'=> 'Student Create Successfully'
                ],200) ;
            }else {

                return response() -> json([
                    'status' => 500,
                    'message' => 'Something went wrong'
                ],500) ;    
            }
        }
    }

    public function show($id){
        $student = Students::find($id);
        if($student){
            return response() -> json([
                'status' => 200,
                'student' => $student
            ],200); 
        }else{
            return response() -> json([
                'status' => 404,
                'message' => 'Student not found!'
            ],404) ;   
        }
    }

    public function edit($id){
        $student = Students::find($id);
        if($student){
            return response() -> json([
                'status' => 200,
                'student' => $student
            ],200);
        }else{
            return response() -> json([
                'status' => 404,
                'message' => 'Student not found!'
            ],404);
        }
    }

    public function update(Request $request,int $id){

        $validator = Validator::make($request -> all(),[
            'name' => 'require|string|max191',
            'course' => 'require|string|max|101',
            'email' => 'require|email|max|101',
            'phone'=> 'require|max|digits:10;'

        ]);

            if($validator -> failed() ){

                return response() -> json([
                    'status' => 422,
                    'errors' => $validator ->messages()
    
                ],422);
            }else{
    
                $student = Students::find($id);
    
                if($student){
    
                    $student -> update([
                        'name' => $request -> name,
                        'course' => $request -> course,
                        'email' => $request -> email,
                        'phone' => $request -> phone
                    ]);
    
                    return response() -> json([
                        'status' => 200,
                        'mesage'=> 'Student update Successfully'
                    ],200) ;
                }else {
    
                    return response() -> json([
                        'status' => 500,
                        'message' => 'Something such student found'
                    ],500) ;    
                }
            }
    }

    public function delete($id){
        
        $student = Students::find($id);

        if($student){

            $student -> delete() ;
            return response() -> json([
                'status' => 200,
                'message' => "Student is remove" 
            ],200);
        }else {
            return response() -> json([
                'status' => 404,
                'message' => "Student not found" 
            ],404);
        }
    }
}
