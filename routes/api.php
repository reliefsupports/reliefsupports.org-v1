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

Route::get('/v1/entry/needs', 'NeedsController@get');
Route::post('/v1/entry/needs', 'NeedsController@post');

Route::get('/v1/entry/donations', 'DonationController@get');
Route::post('/v1/entry/donations', 'DonationController@post');

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
