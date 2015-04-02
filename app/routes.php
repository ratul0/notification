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

Route::get('/',['as'=>'pages.public','uses'=>'PageController@home'] );

// for guest only

Route::group(['before' => 'guest'], function(){
	Route::get('login', ['as'=>'login','uses' => 'PageController@login']);
	Route::post('login', array('uses' => 'PageController@doLogin'));
});

Route::group(array('before' => 'auth'), function()
{
	Route::get('logout', ['as' => 'logout', 'uses' => 'PageController@logout']);
	Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'DashboardController@index'));

	Route::get('subject', array('as' => 'subject.index', 'uses' => 'SubjectController@index'));
	Route::get('subject/create', array('as' => 'subject.create', 'uses' => 'SubjectController@create'));
	Route::post('subject/create', array('as' => 'subject.create', 'uses' => 'SubjectController@store'));
	Route::get('subject/edit/{id}', array('as' => 'subject.edit', 'uses' => 'SubjectController@edit'));
	Route::put('subject/edit/{id}', array('as' => 'subject.edit', 'uses' => 'SubjectController@update'));
	Route::delete('subject/{id}', array('as' => 'subject.delete', 'uses' => 'SubjectController@deleteSubject'));
	Route::get('subject/archived', array('as' => 'subject.archive', 'uses' => 'SubjectController@archive'));

});



