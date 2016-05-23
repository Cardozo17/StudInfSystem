<?php

use  App\Student;
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

Route::get('/', function () 
{
    if(Auth::check())
     return view('home');
    else
        return view('welcome');
});

Route::get('/home', function () 
{
    if(Auth::check())
     return view('home');
    else
        return view('welcome');
});

Route::get('about', 'HomeController@showAboutUsWindow');
Route::get('contact', 'HomeController@showContactWindow');
Route::get('students/create', 'StudentController@showCreateStudentWindow');
Route::post('students', 'StudentController@store');
Route::get('students/list', 'StudentController@listStudents');
Route::get('students','StudentController@index');		
Route::get('showFindStudent', 'StudentController@showFindOneStudentWindow');
Route::post('studentsById','StudentController@findOneById');

//Reports Routes//
Route::get('repStudyConstancy', ['uses' =>'ReportController@showMakeStudyConstancyWindow', 'as' => 'Report1']);
Route::post('repStudyConstancy', ['uses' =>'ReportController@makeStudyConstancy']);

Route::get('repCitation', ['uses' =>'ReportController@showMakeCitationWindow', 'as' => 'Report2']);
Route::post('repCitation', ['uses' =>'ReportController@makeCitation']);

Route::get('repAuthorization', ['uses' =>'ReportController@showMakeAuthorizationWindow', 'as' => 'Report3']);
Route::post('repAuthorization', ['uses' =>'ReportController@makeAuthorization']);
///////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('notAutorized', 'ErrorsController@showNotAutorized');


/*

|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.  
*/

Route::group(['middleware' => ['auth']], function () 
{
    //
    // Registration Routes...
	Route::get('register', [
	    'middleware' => 'is_admin',
	    'uses' => 'Auth\AuthController@showRegistrationForm'
	]);

    Route::post('register', 'Auth\AuthController@register');

});

Route::group(['middleware' => 'web'], function () 
{
   /* Route::get('/home', 'HomeController@index');*/

	// Authentication Routes...
    Route::get('login', 'Auth\AuthController@showLoginForm');
    Route::post('login', 'Auth\AuthController@login');
    Route::get('logout', 'Auth\AuthController@logout');

    // Password Reset Routes...
    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\PasswordController@reset');

});
