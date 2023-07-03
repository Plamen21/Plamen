<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\PublicUserController;
use App\Http\Controllers\Admin\GradesController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Admin\OverallController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Customer\AdminController;
use App\Http\Controllers\Admin\AvailableController;
use App\Http\Controllers\Customer\ClientController;
use App\Http\Controllers\Customer\CoursesController;
use App\Http\Controllers\Customer\StudentController;
use App\Http\Controllers\Customer\TrainerController;
use App\Http\Controllers\Student\StudentCourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Trainer\PerformanceController;

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
Auth::routes(['verify' => true]);

Route::get('/', [PublicUserController::class, 'index']);
Route::get('/publicInfo', [PublicUserController::class, 'info'])->name('publicInfo');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/course/{course_id}', [CourseController::class, 'show'])->name('course.info.user');



Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth','admin.access'])->group(function () {
   Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

   Route::get('admin/roles', [RoleController::class, 'index'])->name('admin.roles.index');
   Route::get('admin/roles/edit/{id}', [RoleController::class, 'edit'])->name('admin.roles.edit');
   Route::post('admin/roles/update/{id}', [RoleController::class, 'update'])->name('admin.roles.update');
   Route::delete('admin/roles/delete/{id}',[RoleController::class,'destroy'])->name('admin.roles.destroy');

   Route::get('/admin/main',[MainController::class,'index'])->name('admin.main.index');
   Route::get('/admin/grades',[GradesController::class,'index'])->name('admin.grades.index');

   Route::get('/admin/training',[TrainingController::class,'index'])->name('admin.training.index');
   Route::GET('/admin/training/create',[TrainingController::class,'create'])->name('admin.training.create');
   Route::POST('/admin/training/store',[TrainingController::class,'store'])->name('admin.training.store');
   Route::get('admin/training/edit/{id}', [TrainingController::class, 'edit'])->name('admin.training.edit');
   Route::post('admin/training/update/{id}', [TrainingController::class, 'update'])->name('admin.training.update');
   Route::delete('admin/training/delete/{id}',[TrainingController::class,'destroy'])->name('admin.training.destroy');
   
   Route::get('/admin/availableTrainigs',[AvailableController::class,'index'])->name('admin.availableTrainigs.index');
   Route::get('/admin/overallProgress',[OverallController::class,'index'])->name('admin.overallProgress.index');
   Route::get('/admin/info',[TrainingController::class,'index'])->name('admin.info.index');
});

Route::middleware(['auth','trainer.access'])->group(function () {

   Route::get('marmalad',[PublicUserController::class,'marmalad']);
   Route::get('/trainer/studentsList',[TrainerController::class,'studentsList'])->name('trainer.studentsList');
   Route::get('/trainer/student/{id}',[TrainerController::class,'studentForm'])->name('trainer.studentForm');
   Route::post('trainer/update/{id}',[TrainerController::class,'update'])->name('trainer.update');
   Route::post('trainer/grades/{id}',[PerformanceController::class,'index'])->name('trainer.grades');
   Route::get('trainer/grades/{id}',[PerformanceController::class,'index'])->name('trainer.grades');
   Route::get('modules/{courseId}',[PerformanceController::class,'modules']);
   Route::get('lectures/{moduleId}',[PerformanceController::class,'lectures']);
   Route::get('/absences/{studentId}/{courseId}/{moduleId}/{lectureId}',[PerformanceController::class,'absences']);
   Route::get('/date/{courseId}',[PerformanceController::class,'date']);
   Route::get('/grades/{studentId}',[PerformanceController::class,'grades']);
   Route::get('/homework/{studentId}/{courseId}/{moduleId}/{lectureId}',[PerformanceController::class,'homework']);
   Route::get('/projects/{studentId}/{courseId}/{moduleId}',[PerformanceController::class,'projects']);
   Route::post('/save', [PerformanceController::class, 'save'])->name('save');
   Route::delete('/trainer.delete/{id}',[TrainerController::class,'destroy'])->name('trainer.destroy');
   Route::post('/trainer/addStudent',[TrainerController::class,'create'])->name('trainer.addStudent');
   Route::post('/trainer/store',[TrainerController::class,'store'])->name('trainer.store');
   Route::get('trainer/chooseStudent',[TrainerController::class,'chooseStudent'])->name('trainer.chooseStudent');
   Route::post('/trainer/grades', [PerformanceController::class, 'save'])->name('save-homework');

   Route::get('/trainer/index',[TrainerController::class,'index'])->name('trainer.index');
   Route::get('/trainer/coursesList',[CoursesController::class,'coursesList'])->name('trainer.coursesList');
   Route::get('/trainer/courseForm',[CoursesController::class,'courseForm'])->name('trainer.courseForm');
   Route::get('/trainer/editCourse',[CoursesController::class,'editCourse'])->name('trainer.editCourse');
   Route::get('/trainer/addCourse',[CoursesController::class,'addCourse'])->name('trainer.addCourse');
   Route::post('/trainer/storeCourse',[CoursesController::class,'storeCourse'])->name('trainer.storeCourse');

   Route::get('/trainer/addModule/{id}',[CoursesController::class,'addModule'])->name('trainer.addModule');
   Route::get('/trainer/chooseCourse',[CoursesController::class,'chooseCourse'])->name('trainer.chooseCourse');
   Route::post('/trainer/chooseCourseMolude/{id}',[CoursesController::class,'chooseCourseModule'])->name('trainer.chooseCourseModule');
   Route::get('/trainer/addLecture/{id}',[CoursesController::class,'addLecture'])->name('trainer.addLecture');
   Route::post('/trainer/updateCourse/{id}',[CoursesController::class,'updateCourse'])->name('trainer.updateCourse');
   Route::post('/trainer/chooseModuleLecture/{id}',[CoursesController::class,'chooseModuleLecture'])->name('trainer.chooseModuleLecture');
   Route::delete('/trainer/courseDestroy/{id}',[CoursesController::class,'destroy'])->name('trainer.courseDestroy');
});

Route::middleware(['auth','student.access'])->group(function () {
    Route::get('/my-courses', [StudentCourseController::class, 'index'])->name('user.courses.index');
    Route::get('/profile-student-edit',[StudentController::class,'editProfile'])->name('profile.student.edit');
    Route::post('profile.student-save',[StudentController::class,'editProfileUpdate'])->name('profile.student.save');
    Route::get('student/course/info/{course_id}/{student_id}', [StudentCourseController::class, 'info'])->name('student.course.info');
    Route::get('save/student/cv/{student_id}',[StudentCourseController::class,'saveCv'])->name('save.student.cv');
    Route::get('student/course/grades/{course_id}/{student_id}',[StudentCourseController::class,'getGrades'])->name('student.course.grades');
    Route::get('student/course/info/projects/{course_id}/{student_id}',[StudentCourseController::class,'getProjects'])->name('student.info.projects');
    Route::get('student/course/info/lectures/{course_id}/{student_id}',[StudentCourseController::class,'getLectures'])->name('student.info.lectures');
});

Route::middleware(['auth','client.access'])->group(function () {
   Route::get('/client',[ClientController::class,'index'])->name('client.index');
   Route::get('client/course/{course_id}',[ClientController::class,'showSpecific'])->name('client.course.info');
   Route::post('client/course/{course_id}/module',[ClientController::class,'showModuleInfo'])->name('client.course.module.students');
   Route::get('client/student/info/{student_id}',[ClientController::class,'showInfoAboutStudent'])->name('client.student.info');
   Route::get('client/student/info/Cv/{student_id}',[ClientController::class,'saveCv'])->name('client.download.cv');
   Route::get('client/student/info/projects/{student_id}',[ClientController::class,'projects_info'])->name('client.student.projects.info');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class,'index'])->name('profile.edit');
   Route::post('/profile/user/save',[UserController::class,'update'])->name('user.profile.save');
});
