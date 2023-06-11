<?php

namespace App\Http\Controllers;

use App\Models\Customers2;

class CoursesController extends Controller{

    public function FrontEnd(){
        $result = Customers2::all();
        return view('FronEnd',['result' =>$result]);
    }

    public function HTML(){
        $result = Customers2::all() ;
        return view('courses/FrontEnd/HTML',['result' =>$result]);
    }

    public function CSS(){
        return view('courses/FrontEnd/CSS');
    }

    public function JavaScript(){
        return view('courses/FrontEnd/JavaScript');
    }

    public function Php(){
        return view('courses/BackENd/Php');
    }

    public function Java(){
        return view('courses/BackENd/Java');
    }

    public function CSharp(){
        return view('courses/BackENd/CSharp');
    }

    public function Oracle(){
        return view('courses/DataBase/Oracle');
    }

    public function MySQL(){
        return view('courses/DataBase/MySQL');
    }

}
