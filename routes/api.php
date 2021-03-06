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

Route::group(['namespace' => 'Api\v1', 'prefix' => 'v1', 'as' => 'api.v1.'], function() {
	// Route::resource('warehouses', 'WarehouseController');
	// Route::resource('products', 'ProductController');
	Route::get('user', "UserController@index");
});