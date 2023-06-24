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
            return redirect()->route('student.index');
        case 'client':
            return redirect()->route('client.index');
        case 'teacher':
            return redirect()->route('teacher.index');
        default:
            return redirect()->route('user.index');
    }
}

}
// public function login(Request $request){

//     $credentials = $request ->validate([
//         'username' => 'required',
//         'password' => 'required',
//     ]);

//     if (Auth::attempt($credentials)) {
//         // Потребителят е успешно аутентикиран

//         // Проверете ролята на потребителя
//         // $user = User::find();
//         // $user -> role ;
        
        
//     //     if ($user->hasRole('admin')) {
//     //         // Аутентикиран е администратор
//     //         return redirect()->route('admin.dashboard');
//     //     } elseif ($user->hasRole('student')) {
//     //         // Аутентикиран е студент
//     //         return redirect()->route('student.dashboard');
//     //     } elseif ($user->hasRole('client')) {
//     //         // Аутентикиран е клиент
//     //         return redirect()->route('client.dashboard');
//     //     } elseif ($user->hasRole('teacher')) {
//     //         // Аутентикиран е учител
//     //         return redirect()->route('teacher.dashboard');
//     //     } else {
//     //         // Аутентикиран е потребител (роля "user")
//     //         return redirect()->route('home');
//     //     }
//     } 
//     else {
//         // Аутентикацията не бе успешна
//         // Обработете грешката или покажете съобщение за неуспешен вход
//         return back()->withErrors([
//             'email' => 'Invalid credentials',
//         ]);
//     }
// }
//     // public function authenticate(){
        
//     //     $user = $this->guard()->user();
//     //     return $this->getRoleRedirect($user);

//     // }
// }

