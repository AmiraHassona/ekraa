<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\LectureController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\StudentController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('levels');
Route::resource('levels',LevelController::class)->except('show');
Route::resource('departments',DepartmentController::class)->except('show');
Route::resource('Courses',CourseController::class)->except('show');
Route::resource('lectures',LectureController::class)->except('show');
Route::resource('students',StudentController::class)->except('show');

Route::get('student-courses/{id}',[StudentController::class, 'studentcourses'])->name('students.courses');

Route::get('student-courses/{id}/create',[StudentController::class, 'addCoursesToStudentForm'])->name('students.courses.create');

Route::post('student-courses/{id}/store',[StudentController::class, 'addCoursesToStudent'])->name('students.courses.store');

Route::delete('student-courses/{id}/delete',[StudentController::class, 'deleteCourseFromStudent'])->name('students.courses.destroy');
