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
    return view('main');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


/** Admin Routers */

/** Driver Request Methods */
// User Request
Route::get('/adminroutes/driver_request','Api\Admin\UserRequestController@index')->name('user_request');
// check request
Route::get('adminroutes/driver_request/check_request/{id}','Api\Admin\UserRequestController@check')->name('check_request');
// Approve request
Route::get('adminroutes/driver_request/approve/{id}','Api\Admin\UserRequestController@approve');
// Reject request
Route::get('adminroutes/driver_request/reject/{id}','Api\Admin\UserRequestController@reject');

/** Orders */
Route::get('adminroutes/orders','Api\Admin\OrderController@index')->name('orders');

/** Drivers */
Route::get('adminroutes/drivers','Api\Admin\DriverController@index')->name('drivers');
Route::get('adminroutes/drivers/check/{id}','Api\Admin\DriverController@check')->name('driver_check');

/** Riders */
Route::get('adminroutes/riders','Api\Admin\RidersController@index')->name('riders');
Route::get('adminroutes/riders/check_riders/{id}','Api\Admin\RidersController@check')->name('check_riders');

/** Map */
Route::get('adminroutes/map','Api\Admin\MapController@index')->name('map_view');