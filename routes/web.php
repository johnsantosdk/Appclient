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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'client', 'as' => 'client.'], function() {
	//URL = client/index
	Route::get('/',					 	['as' => 'index',			'uses' => 'ClientController@index']);
	Route::get('/create',			 	['as' => 'create',			'uses' => 'ClientController@create']);
	Route::post('/addClient',			['as' => 'addClient',		'uses' => 'ClientController@addClient']);//rota de teste para ajax
	Route::post('/editClient{id?}',		['as' => 'editClient',		'uses' => 'ClientController@editClient']);//rota de teste para ajax
	Route::post('/updateClient',		['as' => 'updateClient',	'uses' => 'ClientController@updateClient']);//rota de teste para ajax
	Route::post('/destroyClient',		['as' => 'destroyClient',	'uses' => 'ClientController@destroyClient']);//rota de teste para ajax
	Route::post('/infoClient',			['as' => 'infoClient',		'uses' => 'ClientController@infoClient']);//rota de teste para ajax
	Route::post('/store',			 	['as' => 'store',			'uses' => 'ClientController@store']);
	Route::get('/show/{id}',			['as' => 'show',			'uses' => 'ClientController@show']);
	Route::get('/edit/{id}',		 	['as' => 'edit',			'uses' => 'ClientController@edit']);
	Route::put('/update/{id}',		 	['as' => 'update',			'uses' => 'ClientController@update']);
	Route::get('/destroy/{id}',			['as' => 'destroy',			'uses' => 'ClientController@destroy']);
});

/**----------------------------------------------------------------------------------------------------------------------- **/

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {

	Route::get('/', 			['as' => 'index',		'uses' => 'AdminController@index']);
	Route::get('/test', 		['as' => 'test',		'uses' => 'AdminController@test']);
	Route::get('/login', 		['as' => 'login',		'uses' => 'AdminController@login']);
	Route::get('/signup', 		['as' => 'signup',		'uses' => 'AdminController@signup']);
	Route::get('/error404',		['as' => 'error404',	'uses' => 'AdminController@error404']);
	Route::get('/error500',		['as' => 'error500',	'uses' => 'AdminController@error500']);
	Route::get('/blank-page',	['as' => 'blank-page',	'uses' => 'AdminController@blankPage']);
});