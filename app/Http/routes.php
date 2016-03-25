<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::group(
    	[
    	'namespace' => 'Admin',
    	'as'		 => 'admin::',
    	'prefix'     => 'admin',
    	'middleware' => ['auth', 'roles'],
    	'roles'      => ['admin'],
        ], function() {
        // Controllers Within The "App\Http\Controllers\Admin" Namespace
        // Matches the /admin URL
        // Extend this to the BaseController to Match Namespacing
        Route::get('/', ['as' => 'home', 'uses' => 'DashboardController@index']);
        Route::group(
        	[
        	'as'		=>	'user@',
        	'prefix'	=> 'user',
        	], function() {
        		Route::get('/', ['as' => 'index', 'uses' => 'UserController@index']);
        		Route::post('/', ['as' => 'store', 'uses' => 'UserController@store']);
        		Route::get('/create', ['as' => 'create', 'uses' => 'UserController@create']);
        		Route::get('/{user}', ['as' => 'show', 'uses' => 'UserController@show']);
        		Route::get('/{user}/edit', ['as' => 'edit', 'uses' => 'UserController@edit']);
        		Route::patch('/{user}', ['as' => 'update', 'uses' => 'UserController@update']);
        		Route::get('/{user}/delete', ['as' => 'delete', 'uses' => 'UserController@destroy']);

        	});

    });
});
