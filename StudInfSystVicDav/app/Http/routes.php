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


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
*/

Route::group(['middleware' => 'web'], function ()
{

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

 //Not Authorized Message
 Route::get('notAutorized', 'ErrorsController@showNotAutorized');

 //Get Control Parameters Route
 Route::get('getSystemParameters','SystemController@getSystemParameters');

 // Logout Routes...
 Route::get('logout', 'Auth\AuthController@logout');

});



Route::group(['middleware' => ['auth']], function ()
{
    /**********************************************************/
        Route::get('about', 'HomeController@showAboutUsWindow');
        Route::get('contact', 'HomeController@showContactWindow');
    /**********************************************************/

       /**********************************************************/
        Route::get('teachers/create', [
            'middleware' => 'is_adminAdministrativePersonLevel1and2',
            'uses' => 'TeacherController@showCreateTeacherWindow'
        ]);

        Route::get('teachers/assign', [
            'middleware' => 'is_adminAdministrativePersonLevel1and2',
            'uses' => 'TeacherController@showAssignTeacherWindow'
        ]);

         Route::post('teachers', 'TeacherController@store');
         Route::post('/teacherById','TeacherController@findTeacherById');
         Route::post('assignTeacher', 'TeacherController@assignTeacher');


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

        Route::get('students',[
            'middleware' => 'is_adminTeacherAdminitrativePersonLevel1and2',
            'uses'=>'StudentController@index']);

        Route::get('students/putGrades',[
            'middleware' => 'is_adminTeacherAdminitrativePersonLevel1and2',
            'uses'=>'StudentController@showPutGrades']);

        Route::get('students/list', 'StudentController@listStudents');

        Route::post('/students/listBySectionGrade', 'StudentController@listStudentsBySectionGrade');
        Route::post('studentById','StudentController@findStudentById');
        Route::post('students', 'StudentController@store');
        Route::post('/students/assignGrade', 'StudentController@assignGradeToStudent');

    /**********************************************************/

    /**********************************************************/
        Route::get('repStudyConstancy', [
            'middleware' => 'is_adminAdministrativePersonLevel1and2',
            'uses' =>'ReportController@showMakeStudyConstancyWindow', 'as' => 'Report1']);

        Route::get('repCitation', [
            'middleware' => 'is_adminTeacherAdminitrativePersonLevel1and2',
            'uses' =>'ReportController@showMakeCitationWindow', 'as' => 'Report2']);

        Route::get('repAuthorization', [
            'middleware' => 'is_adminTeacherAdminitrativePersonLevel1and2',
            'uses' =>'ReportController@showMakeAuthorizationWindow', 'as' => 'Report3']);

        Route::post('repStudyConstancy', ['uses' =>'ReportController@makeStudyConstancy']);
        Route::post('repCitation', ['uses' =>'ReportController@makeCitation']);
        Route::post('repAuthorization', ['uses' =>'ReportController@makeAuthorization']);
    /**********************************************************/

    /**********************************************************/
       Route::get('statistics/grades', [
            'middleware' => 'is_adminAdministrativePersonLevel1and2',
            'uses' => 'StatisticsController@showGradesStatistics'
        ]);

    /**********************************************************/

    /**********************************************************/

        Route::get('registerUser', [
            'middleware' => 'is_admin',
            'uses' => 'Auth\AuthController@showRegistrationForm'
        ]);

        Route::get('editUser', [
            'middleware' => 'is_admin',
            'uses' => 'Auth\AuthController@showEditUserWindow'
        ]);

        Route::get('deleteUser', [
            'middleware' => 'is_admin',
            'uses' => 'Auth\AuthController@showDeleteUserWindow'
        ]);

        Route::post('registerUser', 'Auth\AuthController@register');
        Route::post('userByEmail','Auth\AuthController@findUserByEmail');
        Route::post('editUser','Auth\AuthController@editUser');
        Route::post('deleteUser','Auth\AuthController@deleteUser');


    /**********************************************************/

    /**********************************************************/
        Route::get('studentsInfoBackUp', [
                'middleware' => 'is_adminTeacherAdminitrativePersonLevel1',
                'uses' => 'BackUpController@showBackUpWindow'
            ]);

    /**********************************************************/

    /**********************************************************/
        Route::get('systemParameters', [
                'middleware' => 'is_admin',
                'uses' => 'SystemController@showSystemParametersWindow'
            ]);

        Route::post('setSystemParameters', 'SystemController@store');

    /**********************************************************/

});

