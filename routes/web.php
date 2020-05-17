<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'LoginController@index') -> name('login');
Route::post('/login', 'LoginController@verify');


Route::get('/registration', 'AdminController@registration') -> name('registration');
Route::post('/registration', 'AdminController@user_reg') -> name('user_registration');


Route::get('/Dashboard', 'AdminController@index')->name('dashboard'); 

Route::get('/userlist', 'AdminController@userlist')->name('userlist');
Route::get('/delete/user/{id}','AdminController@deleteUser');
Route::get('/edit/user/{id}','AdminController@userUpdate');
Route::post('/edit/user/{id}','AdminController@userEdit');




Route::get('/note', 'NoteController@index')->name('note');
Route::post('/note', 'NoteController@uploadNote')->name('note');

Route::get('/notice', 'NoticeController@index')->name('notice');
Route::post('/notice', 'NoticeController@uploadNotice')->name('notice');


Route::get('/result','ResultController@result')->name('result');
Route::get('/result/upload/student/{id}','ResultController@result_upload');
Route::post('/result/upload/student/{id}','ResultController@upload');


Route::get('/salary','Salary@index')->name('salary');
Route::get('/add_salary','Salary@add_salary')->name('add_salary');
Route::post('/add_salary','Salary@insert_salary')->name('insert_salary');
Route::get('/edit_salary/{id}','Salary@edit_salary')->name('edit_salary');
Route::post('/edit_salary/{id}','Salary@update_salary');




// project 
Route::group(['middleware'=>['sessioncheck']], function(){
Route::get('/search','SearchController@search')->name('search');
Route::get('/searchmed','SearchController@searchmed')->name('searchmed');
Route::resource('department', 'DepartmentController');
Route::resource('doctor', 'DoctorController');
Route::resource('patient', 'PatientController');
Route::resource('employee', 'EmployeeController');
Route::resource('blood', 'BloodController');
Route::resource('store', 'StoreController');
Route::get('report/{id}', 'Report@index');
Route::get('/dashboard', 'DashboardController@index');
Route::get('/mail','MailController@index');
Route::get('/logout','LogoutController@index');
});
Route::resource('signup', 'SignupController');
Route::resource('verify', 'VerifyController');
Route::post('/verification','SearchController@verify')->name('verification');




