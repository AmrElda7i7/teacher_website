<?php

use App\Http\Controllers\ExamsController;
use App\Http\Controllers\Exam_and_quiz;
use App\Http\Controllers\IsAttended;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;

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
    return view('index');
});

Auth::routes(['register'=>false]);
Route::resource('roles',RoleController::class);
Route::resource('admins',AdminController::class);
Route::get('roles/delete/{id}',[RoleController::class,'destroy']) ;
Route::get('admins/delete/{id}',[AdminController::class,'destroy']) ;
Route::get('groups/delete/{id}',[GroupController::class,'destroy']) ;
Route::get('students/delete/{id}',[StudentController::class,'destroy']) ;
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('groups',GroupController::class);
Route::resource('students',StudentController::class);
Route::post('find_student',[StudentController::class,'find_student'])->name('find_student');
Route::get('attend/{id}',[StudentController::class,'attends'])->name('attend');
Route::resource('quizzes',QuizController::class);
Route::resource('exams',ExamsController::class);
Route::get('exams_and_quizzes',Exam_and_quiz::class)->name('exams_and_quizzes');
Route::get('view_mark_form',[StudentController::class,'view_mark_form'])->name('view_mark_form');
Route::Post('add_mark',[StudentController::class,'add_mark'])->name('add_mark');
Route::post('details',[StudentController::class,'details'])->name('details');
Route::get('user_attended/{id}',IsAttended::class)->name('user_attended');
