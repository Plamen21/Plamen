<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LectorsController ;
use App\Http\Controllers\PartnersController ;
use App\Http\Controllers\Api\StudentsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/FroEnd',[CoursesController::class,'Froend']);
Route::get('/Courses/HTML',[CoursesController::class,'HTML']);
Route::get('/Courses/CSS', [CoursesController::class,'CSS']);
Route::get('/Courses/JavaScript', [CoursesController::class,'JavaScript']);
Route::get('/Courses/Php', [CoursesController::class,'Php']);
Route::get('/Courses/Java', [CoursesController::class,'Java']);
Route::get('/Courses/CSharp', [CoursesController::class,'CSharp']);
Route::get('/Courses/Oracle', [CoursesController::class,'Oracle']);
Route::get('/Courses/MySQL', [CoursesController::class,'MySQL']);
Route::get('/Video/Video',[VideoController::class,'video']);
Route::get('/partners/Partners',[PartnersController::class,'Partners']);
Route::get('/lectors/lectors',[LectorsController::class,'Lectors']);

Route::get('/Courses', function(){
    return view('Courses');
});

require __DIR__.'/auth.php';

Route::get('/views',function(){
    return view('views');
});

Route::get('/students',[StudentsController::class,'index']);
Route::get('users',[AppController::class,'getUsers']);
Route::get('render_db',[HomeController::class,'render']);
Route::get('/session',[HomeController::class,'session']);
Route::get('/demo',[HomeController::class,'demo'] );
Route::get('/welcome',function(){
    return view('welcome');
});

Route::get('/convert-currency', [ConverterController::class, 'convertCurrency']);
Route::get('/exchange-rates', [ConverterController::class, 'showExchangeRates']);

Route::resource('products',ProductController::class);


