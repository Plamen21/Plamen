<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PublicUserController;

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
Auth::routes();

Route::get('/', [PublicUserController::class, 'index']);
Route::get('/info', [PublicUserController::class, 'info'])->name('publicInfo');
Route::get('/course/{id}', [CourseController::class, 'show']);


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin',[AdminController::class,'index']);

// Изпробвани и работят
Route::middleware(['auth','admin.access'])->group(function () {
   Route::get('marmalad',[PublicUserController::class,'marmalad']);
});

Route::middleware(['auth','trainer.access'])->group(function () {
   Route::get('marmalad',[PublicUserController::class,'marmalad']);
});

Route::middleware(['auth','student.access'])->group(function () {
   Route::get('marmalad',[PublicUserController::class,'marmalad']);
});

Route::middleware(['auth','client.access'])->group(function () {
   Route::get('marmalad',[PublicUserController::class,'marmalad']);
});

// Route::middleware(['auth','admin.access'])->name('admin.')->prefix('admin') ->group(function(){
//     Route::get('marmalad',[PublicUserController::class,'marmalad']);
//     Route::resource('roles', RoleController::class);
//     Route::resource('permission', PermissionController::class);
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/index',function(){
    return view('admin.index');})->name('admin.index');




