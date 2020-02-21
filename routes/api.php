<?php

use Illuminate\Http\Request;


/** Client */
#Auth
Route::post('client/auth/register','Api\Client\AuthController@register');
Route::post('client/auth/login','Api\Client\AuthController@login');




Route::get('tes','Api\Client\AuthController@_test_user');

Route::post('test/image','Api\Driver\AuthController@testImage');

/** Driver */
#Auth
Route::post('driver/auth/login','Api\Driver\AuthController@login');
Route::post('driver/auth/register','Api\Driver\AuthController@register');
// Get drivers
Route::get('driver/location/get_drivers','Api\Driver\LocationController@get_drivers');
Route::post('driver/auth/upload/image','Api\Driver\AuthController@upload_image');
Route::post('driver/auth/upload/avatar','Api\Driver\AuthController@upload_avatar');



// get order
Route::post('order/get','Api\Client\OrderController@get_current_order_from_users_ids');
Route::post('order/change_to_state_tow','Api\Client\OrderController@change_state_to_tow');
Route::post('order/change_to_state_three','Api\Client\OrderController@change_state_to_three');
Route::post('order/change_state_to_four','Api\Client\OrderController@change_state_to_four');
Route::post('order/get_order_with_id','Api\Client\OrderController@get_order_with_id');
Route::post('order/change_order_with_uuid','Api\Client\OrderController@change_state_with_uuid');
Route::post('order/get_state_with_uuid','Api\Client\OrderController@get_state_with_uuid');
Route::post('order/check_state_has_uuid','Api\Client\OrderController@check_state_has_uuid');

// Driver Order
// Get orderWith date
Route::get('order/get/with_date/{id}','Api\Driver\OrderController@getOrderWithDate');


// Driver State change 
Route::get('user/state/change_to_busy/{id}','Api\Driver\AuthController@change_state_to_busy');
Route::get('user/state/change_to_online/{id}','Api\Driver\AuthController@change_state_to_online');

/*** Withdrawl */
Route::post('user/withdrawl/store','Api\Driver\WithdrawalController@store');


/** Helper Function */
Route::get('helper/cartype/index','Api\HelperController@IndexCarType');
/** upload image and return name and path */

/** Wallet update */
Route::post('wallet/update_wallet','Api\Driver\AuthController@update_wallet');

Route::post('helper/image/store','Api\imageController@store');
Route::post('helper/notification/update','Api\Driver\AuthController@update_token');
/** Authed Controller */

Route::group(['middleware' => 'auth:api'], function(){
    /** Client Auth Controller */
    Route::get('client/auth/index','Api\Client\AuthController@auth');

    /**Car Controller */
    Route::post('user/cars/add','Api\Client\AuthController@_add_car');
    /** Order controller */
    Route::post('order/store','Api\Client\OrderController@store');
    Route::post('order/change','Api\Client\OrderController@change_order_state');



    /** Driver Authed Controller */
    Route::get('driver/auth/index','Api\Driver\AuthController@auth');

    Route::post('driver/location/create_location','Api\Driver\LocationController@create_location');
    Route::post('driver/location/change_state','Api\Driver\LocationController@change_state');

});
