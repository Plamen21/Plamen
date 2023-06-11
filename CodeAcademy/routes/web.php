<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\PartnersController ;
use App\Http\Controllers\LectorsController ;


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
