<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



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

// Route::get('/', function () {
//     return view('website.single-course');
// });

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email
  ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
///////////////////////////////////////////
// Route::get('/student', function () {
//     return view('students.index');
// });
// Route::get('/studentf', function () {
//     return view('students.add');
// });
// ////////////
// Route::get('/course', function () {
//     return view('courses.index');
// });
// Route::get('/coursef', function () {
//     return view('courses.add');
// });
// ////////////
// Route::get('/level', function () {
//     return view('levels.index');
// });
// Route::get('/levelf', function () {
//     return view('levels.add');
// });
// ////////////
// Route::get('/lecture', function () {
//     return view('lectures.index');
// });
// Route::get('/lecturef', function () {
//     return view('lectures.add');
// });
// ////////////
// Route::get('/department', function () {
//     return view('departments.index');
// });
// Route::get('/departmentf', function () {
//     return view('departments.add');
// });
// ////////////
// Route::get('/user', function () {
//     return view('users.index');
// });
// Route::get('/userf', function () {
//     return view('users.add');
// });

Route::get('/single-course', function () {
    return view('website.single-course');
});
Route::get('/courses', function () {
  return view('website.courses');
});
Route::get('/blog', function () {
  return view('website.blog');
});
Route::get('/', function () {
  return view('website.index');
});
Route::get('/elements', function () {
  return view('website.elements');
});
Route::get('/contact', function () {
  return view('website.contact');
});


