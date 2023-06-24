<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CourseApiController;
use App\Http\Controllers\API\LectureApiController;

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
//Auth::routes();
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('courses',[CourseApiController::class,'index']);

//get all lecture based on provided course name
Route::get('lectures/{name}',[LectureApiController::class,'showAll']);

//get specific lecture based on provided course name
Route::get('lecture/{training_name}/L/{lecture_number}',[LectureApiController::class,'getSpecific']);
Route::post('lecture/{training_name}/L/{lecture_number}',[LectureApiController::class,'add']);
Route::delete('lecture/{training_name}/L/{lecture_number}',[LectureApiController::class,'destroy']);
Route::patch('lecture/{training_name}/L/{lecture_number}',[LectureApiController::class,'update']);



