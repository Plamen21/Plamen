<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            if (auth()->check()) {

                $user = auth()->user();

                return $this->getRoleRedirect($user);
            }
            return $next($request);
        })->except('logout');
    }


    protected function getRoleRedirect($user)
    {
    $role = $user->role->role;

    switch ($role) {
        case 'admin':
            return redirect()->route('admin.index');
        case 'student':
            return redirect()->route('user.courses.index');
        case 'client':
            return redirect()->route('client.index');
        case 'trainer':
            return redirect()->route('trainer.index');
        default:
            return redirect()->route('user.index');
    }
}


public function login(Request $request){

    $credentials = $request ->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {

        $user = User::find(Auth::id());

        if ($user->hasRole('admin')) {

            return redirect()->route('admin.index');
        } elseif ($user->hasRole('student')) {

            return redirect()->route('user.courses.index');
        } elseif ($user->hasRole('client')) {

            return redirect()->route('client.index');
        } elseif ($user->hasRole('trainer')) {

            return redirect()->route('trainer.index');
        } else {

            return redirect()->route('home');
        }
    }
    else {

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }
}
    public function authenticate(){

        $user = $this->guard()->user();
        return $this->getRoleRedirect($user);

    }
}
