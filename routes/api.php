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
Route::get('get_new_cases', 'customersAPIController@getNewCases');
Route::get('get_warranty_cases', 'customersAPIController@getWarrantyCases');
Route::get('search/{name}', 'customersAPIController@search');
Route::post('save_social_media', 'customersAPIController@saveSocialMedia');
Route::resource('likes', 'likesAPIController');

Route::get('delete_like_from_home/{from_id}/{to_id}', 'likesAPIController@deleteFromHomePage');
Route::resource('notifications', 'notificationsAPIController');
Route::get('get_notifications_per_user/{castumer_id}', 'notificationsAPIController@getNotificationPerUser');
Route::get('history_payment/{id}', 'customersAPIController@historyPayment');


});