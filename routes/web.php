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

Route::get('/', 'HomeController@index');

Route::get('/donations', 'DonationController@index');
Route::get('/donations/add', 'DonationController@add');
Route::post('/donations/add', 'DonationController@save');
Route::get('/donations/show/{id}', 'DonationController@show');

Route::get('/needs', 'NeedsController@index');
Route::get('/needs/add', 'NeedsController@add');
Route::post('/needs/add', 'NeedsController@save');
Route::get('/needs/show/{id}', 'NeedsController@show');

Route::get('/emergency-contacts', 'HomeController@emergency');
Route::get('/twitter-feed', 'FeedsController@index');

Route::get('/entry/{type}/{id}', 'EntryController@view');