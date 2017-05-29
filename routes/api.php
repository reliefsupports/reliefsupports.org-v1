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


Route::group(['namespace' => 'Api\V1', 'prefix' => '1'], function ($api) {

    $api->get('needs', 'NeedsController@index');
    $api->get('needs/{id}', 'NeedsController@show');
    $api->post('needs', 'NeedsController@store');

    $api->get('donations', 'DonationController@index');
    $api->get('donations/{id}', 'DonationController@show');
    $api->post('donations', 'DonationController@store');
});