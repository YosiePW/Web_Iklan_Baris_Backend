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
        Route::get('login/check', "UserController@LoginCheck"); //cek token
        Route::post('logout', "UserController@logout"); //cek token
    Route::get('iklan', 'IklanController@iklan');

    Route::get('iklanall', 'IklanController@iklanAuth')->middleware('jwt.verify');
    Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');

    Route::get('iklan', "IklanController@index"); //read iklan
	Route::get('iklan/{limit}/{offset}', "SiswaController@getAll"); //read iklan
	Route::post('iklan', 'IklanController@store'); //create iklan
	Route::put('iklan/{id}', "IklanController@update"); //update iklan
	Route::delete('iklan/{id}', "IklanController@delete"); //delete iklan
});


