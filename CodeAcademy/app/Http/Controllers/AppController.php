<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Students;
use App\Models\User;
use Illuminate\Http\Request;

class AppController extends Controller
{
    
    public function getUsers($id = null){
        $user = Students::find($id);
        if($user){
            return response() -> json($user);
        }else{
            $users = Students::all();
        return response() -> json($users);
        }
    }

    public function createUser(Request $request){
        $user = new User;
        $user -> name = $request -> name ;
        $user -> email = $request -> email ;
        $user -> password = $request -> password ;
        $user -> save();
        return response() -> json($user); 
    }

    public function updateUser(Request $request, $id){
        $user = User::find($id);
        $user -> name = $request -> name ;
        $user -> email = $request -> email ;
        $user -> password = $request -> passwod ;
        $user -> save() ;
        return response() -> json($user) ;
    }

    public function deleteUser($id){
        $user = Students::find($id);
        $user -> delete();
        return response() -> json('User delete succesfully') ;
    }


}
