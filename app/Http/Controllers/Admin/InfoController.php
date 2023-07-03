<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InfoController extends Controller
{
    public function index(){
        $courses = Course::all();
        return view('admin.info.index',['courses'=>$courses]);
    }

    
}
