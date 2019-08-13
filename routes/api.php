<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Register User Endpoint
Route::post('/register','Api\AuthController@register');
//Signin User Endpoint
Route::post('/login', 'Api\AuthController@login');
// Route::get('/login', 'Api\AuthController@login');

Route::post('/register-user-course', 'Api\CourseHandlingController@RegisterUserCourse');
Route::get('/courses-list', 'Api\CourseHandlingController@CoursesList');
