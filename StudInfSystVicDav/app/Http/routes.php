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

//Home and / pages routes and logic
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

 // Authentication Routes...   
 Route::get('login', 'Auth\AuthController@getLogin');
 Route::post('login', 'Auth\AuthController@postLogin');

 // Password Reset Routes...
 Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
 Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
 Route::post('password/reset', 'Auth\PasswordController@reset');

 Route::get('notAutorized', 'ErrorsController@showNotAutorized');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.  
*/

Route::group(['middleware' => ['auth']], function () 
{
    /**********************************************************/
        Route::get('about', 'HomeController@showAboutUsWindow');
        Route::get('contact', 'HomeController@showContactWindow');
    /**********************************************************/

    /**********************************************************/
        Route::get('students/create', [
            'middleware' => 'is_adminTeacherAdminitrativePersonLevel1',
            'uses' => 'StudentController@showCreateStudentWindow'
        ]);

        Route::get('showFindStudent', [
            'middleware' => 'is_adminTeacherAdminitrativePersonLevel1and2',
            'uses' => 'StudentController@showFindOneStudentWindow'
        ]);

        Route::get('students','StudentController@index');
        Route::post('students', 'StudentController@store');
    /**********************************************************/

    /**********************************************************/
        Route::get('repStudyConstancy', [
            'middleware' => 'is_adminAdministrativePersonLevel1and2',
            'uses' =>'ReportController@showMakeStudyConstancyWindow', 'as' => 'Report1']);
        Route::post('repStudyConstancy', ['uses' =>'ReportController@makeStudyConstancy']);

        Route::get('repCitation', [
            'middleware' => 'is_adminTeacherAdminitrativePersonLevel1and2',
            'uses' =>'ReportController@showMakeCitationWindow', 'as' => 'Report2']);
        Route::post('repCitation', ['uses' =>'ReportController@makeCitation']);

        Route::get('repAuthorization', [
            'middleware' => 'is_adminTeacherAdminitrativePersonLevel1and2',
            'uses' =>'ReportController@showMakeAuthorizationWindow', 'as' => 'Report3']);
        Route::post('repAuthorization', ['uses' =>'ReportController@makeAuthorization']);
    /**********************************************************/

    /**********************************************************/
        Route::get('register', [
            'middleware' => 'is_admin',
            'uses' => 'Auth\AuthController@showRegistrationForm'
        ]);

        Route::post('register', 'Auth\AuthController@register');

        Route::get('edit', [
            'middleware' => 'is_admin',
            'uses' => 'Auth\AuthController@editingUser'
        ]);
    /**********************************************************/

    Route::get('students/list', 'StudentController@listStudents');
    Route::post('studentsById','StudentController@findOneById');

});

Route::group(['middleware' => 'web'], function () 
{
	// Logout Routes...
    Route::get('logout', 'Auth\AuthController@logout');

});
