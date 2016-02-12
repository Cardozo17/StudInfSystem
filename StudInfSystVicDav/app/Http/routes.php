<?php

use App\Student;
use  App\Person;
use  App\PhoneNumbers;

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	
    return view('welcome');
});

Route::get('students','StudentController@index');
Route::get('students/create', ['middleware' => 'auth', //This is working but it didn't let me get in the view even if I 
    'uses' =>'StudentController@create']);				//am succesfully log
Route::post('students', 'StudentController@store');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
