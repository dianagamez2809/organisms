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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::resource('toxicity', 'ToxicityController');

Route::resource('organism', 'OrganismsController');

Route::resource('metabolites', 'MetabolitesController');

Route::resource('dashboard', 'DashboardController');



Route::resource('toxicitylog', 'ToxicityLogController');

Route::resource('organismlog', 'OrganismsLogController');

Route::resource('metaboliteslog', 'MetabolitesLogController');




Route::get('login', array('uses' => 'HomeController@showLogin'));

// route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));
Route::get('logout', array('uses' => 'HomeController@doLogout'));
