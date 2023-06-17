<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\Api\StudentsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users/{id?}',[AppController::class,'getUsers']);
Route::delete('/users/{id}',[AppController::class,'deleteUser']);
Route::post('/users',[AppController::class,'createUser']);
//Route::update('/users',[AppController::class,'updateUser']);

Route::get('students',[StudentsController::class,'index']);
Route::post('students',[StudentsController::class,'store']);
Route::get('students/{id}', [StudentsController::class,'show']);
Route::get('students/{id}/edit', [StudentsController::class,'edit']);
Route::put('students/{id}/update', [StudentsController::class,'update']);
Route::delete('students/{id}/delete', [StudentsController::class,'delete']);

// Route::resource('students',StudentsController::class); ---- съкратен вариант 
