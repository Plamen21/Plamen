<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicUserController extends Controller
{
    public function index(){
        return view('PublicUserViews.publicHome');
    }
    public function info(){
        return view('PublicUserViews.publicInfo');
    }
}
