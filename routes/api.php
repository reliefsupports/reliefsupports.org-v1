<?php

use Illuminate\Http\Request;
use App\Repositories\NeedsRepository;

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

Route::group(['prefix' => 'v1/entry'], function () {

	Route::get('needs', 'API\NeedsAPIController@index'); 
	Route::get('needs/{id}', 'API\NeedsAPIController@show'); 
	Route::put('needs/{id}', 'API\NeedsAPIController@update'); 
	Route::post('needs', 'API\NeedsAPIController@save'); 

	Route::get('donations', 'API\DonationAPIController@index'); 
	Route::get('donations/{id}', 'API\DonationAPIController@show'); 
	Route::put('donations/{id}', 'API\DonationAPIController@update'); 
	Route::post('donations', 'API\DonationAPIController@save'); 
	
});