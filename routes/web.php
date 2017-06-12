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
Route::get('/online-donations', 'DonationController@showOnlineDonations');

Route::get('/needs', 'NeedsController@index');
Route::get('/needs/add', 'NeedsController@add');
Route::post('/needs/add', 'NeedsController@save');
Route::get('/needs/show/{id}', 'NeedsController@show');

Route::get('/projects','ProjectsController@index');
Route::match(array('GET','POST'),'/projects/add', 'ProjectsController@addProject');
Route::match(array('GET','POST'),'/projects/add-members/{project_id}', 'ProjectsController@addMembers');
Route::match(array('GET','POST'),'/projects/add-resources/{project_id}', 'ProjectsController@addResources');
Route::get('/projects/member/{member_id}', 'ProjectsController@getMember');
Route::post('/projects/delete-member', 'ProjectsController@deleteMember');
Route::get('/projects/resource/{resource_id}/{project_id}', 'ProjectsController@getResource');
Route::post('/projects/delete-resource', 'ProjectsController@deleteResource');


Route::get('/admin/resources','Admin\ResourcesAdminController@index');
Route::match(array('GET','POST'),'/admin/resources/add', 'Admin\ResourcesAdminController@add');
Route::match(array('GET','POST'),'/resources/search', 'ResourcesController@searchResource');

Route::get('/emergency-contacts', 'HomeController@emergency');
Route::get('/twitter-feed', 'FeedsController@index');

Route::any('/admin/',function () {
    return view('frontend/admin/home');
});

Route::get('/entry/{type}/{id}', 'EntryController@view');

Route::get('/locale/{locale}', function($locale){
     App::setLocale($locale);
     session(['locale' => $locale]);
     return redirect('/');
});
Route::post('/search-donations-needs', 'HomeController@searchDonationsOrNeeds');
