<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('categories', 'CategoryController');

Route::resource('hospitals', 'HospitalController');
Route::get('/hospitals/list/{category}','hospitalController@showByCategory')->name('hospitals.showByCategory');

Route::resource('doctors', 'DoctorController');
Route::get('/doctors/list/{category}','DoctorController@showByCategory')->name('doctors.showByCategory');

Route::resource('disease', 'DiseaseController');


Route::get('/appointments','AppointmentController@index')->name('appointments.index');
Route::get('/appointments/showAll','AppointmentController@showAll')->name('appointments.showAll');
Route::get('/appointments/{doctor}','AppointmentController@create')->name('appointments.create');
Route::post('/appointments','AppointmentController@store')->name('appointments.store');
Route::delete('/appointments/{appointment}','AppointmentController@destroy')->name('appointments.destroy');
