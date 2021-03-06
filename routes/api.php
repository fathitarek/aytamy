<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['ChangeLanguage'])->group(function () {

Route::resource('countries', 'countriesAPIController');
Route::resource('dreams', 'dreamsAPIController');
Route::resource('jobs', 'jobsAPIController');
Route::resource('nationalities', 'nationalitiesAPIController');
Route::resource('customers', 'customersAPIController');
Route::resource('educations', 'educationsAPIController');
Route::resource('cities', 'citiesAPIController');
Route::get('cities_with_country/{id}', 'citiesAPIController@getCityWithCountry');
Route::post('login', 'customersAPIController@login');
Route::post('customers/{id}', 'customersAPIController@update');


});