<?php

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
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login'); //do login

Route::group(['middleware' => ['jwt.verify']], function () {


Route::get('iklan', 'IklanController@iklan');

Route::get('iklanall', 'IklanController@iklanAuth')->middleware('jwt.verify');
Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');
});


