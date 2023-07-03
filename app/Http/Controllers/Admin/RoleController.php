<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoleController extends Controller
{
    
        use HasFactory;
    
        public function index(){
           
            $users = User::with('role')->get();
            return view('admin.roles.index', compact('users'));
        }
    
        public function edit(Request $request) {
    
            $user_id=$request->user_id;
            return view('admin.roles.edit',['user_id'=>$user_id]);
        }
        
        public function update(Request $request , $id)  {

            $role = Role::where("user_id" , $id)->first();
            $role->role=$request->role;
            $role->save();
            
            return redirect()->route('admin.roles.index');
        }
    
        public function destroy($id){
    
            $user = User::find($id);
    
            $user->delete(); 
            return redirect()->route('admin.roles.index');
        }
        
    
    }
    
