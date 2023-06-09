<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GeneralRequestController;
use App\Http\Controllers\Api\HomepageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    // Route::post('login', 'AuthController@login');
    // Route::post('logout', 'AuthController@logout');
    // Route::post('refresh', 'AuthController@refresh');
    // Route::post('me', 'AuthController@me');


    Route::post('login',[AuthController::class ,'login']);
    Route::post('register',[AuthController::class ,'register']);

    Route::group(['middleware'=>'token.auth'],function(){
        Route::post('logout',[AuthController::class ,'logout']);
        Route::get('user-profile',[AuthController::class ,'userProfile']);
    });



});

//GeneralRequest
Route::get('levels',[GeneralRequestController::class,'levels']);
Route::get('level/{id}/departments',[GeneralRequestController::class,'departments']);

//HomepageRequest
Route::get('courses',[HomepageController::class,'courses']);
Route::get('filter-courses',[HomepageController::class,'filterCourses']);
Route::get('course/{id}',[HomepageController::class,'course']);
