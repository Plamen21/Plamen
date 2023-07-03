<?php

namespace App\Http\Controllers;

use App\Models\Course;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicUserController extends Controller
{
    public function index(){
        $courses = Course::all();
        return view('PublicUserViews.publicHome',['courses'=>$courses]);
        
    }
    public function info(){
        $courses = Course::all();
        return view('PublicUserViews.publicInfo',['courses'=>$courses] );
    }

}
