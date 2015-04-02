<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/',['as'=>'pages.public','uses'=>'AuthController@home'] );

// for guest only

Route::group(['before' => 'guest'], function(){
	Route::get('login', ['as'=>'login','uses' => 'AuthController@login']);
	Route::post('login', array('uses' => 'AuthController@doLogin'));
});

Route::group(array('before' => 'auth'), function()
{
	Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
	Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'DashboardController@home'));

	Route::get('app', array('as' => 'application.index', 'uses' => 'ApplicationsController@index'));
	Route::get('app/create', array('as' => 'application.create', 'uses' => 'ApplicationsController@create'));
	Route::post('app/create', array('as' => 'application.store', 'uses' => 'ApplicationsController@store'));
	Route::get('app/{id}/edit', array('as' => 'application.edit', 'uses' => 'ApplicationsController@edit'));
	Route::put('app/{id}', array('as' => 'application.update', 'uses' => 'ApplicationsController@update'));
	Route::delete('app/{id}', array('as' => 'application.delete', 'uses' => 'ApplicationsController@destroy'));

});

Route::get('test',function(){
	return Config::get('customConfig.names.siteName');

});



