<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{

    use HasFactory;
    public function index(){
        return view('admin.roles.index');
    }
   
}
