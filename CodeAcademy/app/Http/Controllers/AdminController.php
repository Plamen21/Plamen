<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class AdminController extends Controller
{
    public function index(){
        return view('layouts.admin');
    }
}
