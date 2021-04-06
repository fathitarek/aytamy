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


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');
Route::resource('countries', 'countriesController');
Route::resource('dreams', 'dreamsController');
Route::resource('jobs', 'jobsController');
Route::resource('nationalities', 'nationalitiesController');
Route::resource('customers', 'customersController');
Route::resource('educations', 'educationsController');
Route::resource('cities', 'citiesController');

Route::get('cases', 'CaseController@getAllCases');
Route::get('cases/{id}', 'CaseController@show')->name('cases.show');
Route::get('update_status_customer/{id}', 'CaseController@completeCase');



Route::resource('likes', 'likesController');

Route::resource('notifications', 'notificationsController');