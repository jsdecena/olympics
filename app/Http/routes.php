<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::resource('/',                   'IndexController');


Route::group(['prefix' => 'api/v1' ], function () {
    Route::resource('sports',                     'Api\SportsApiController');
    Route::resource('user',                       'Api\UserApiController');
    Route::resource('schedule',                   'Api\ScheduleApiController');
});