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
Route::get('students/create', 'StudentController@create');
Route::get('students/list', 'StudentController@listStudents');		
Route::post('students', 'StudentController@store');
Route::get('whoWeAre', 'HomeController@aboutUs');
Route::get('logout', array('uses' => 'LoginController@logout'));
Route::get('studyConstancy', 'ReportController@studyConstancyPaper');

Route::post('studentsById','StudentController@findOneById');

Route::get('/reporting', ['uses' =>'ReportController@index', 'as' => 'Report']);
Route::post('/reporting', ['uses' =>'ReportController@post']);

//added for reporting
Route::get('/reportePrueba','ReportController@prueba');
Route::get('reportConstancyStudent','ReportController@makeConstancy');


Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::get('/showConstancy', ['uses' =>'ReportController@show', 'as' => 'Report']);
//Route::post('/reportConstancyStudent', ['uses' =>'ReportController@makeConstancy']);

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
