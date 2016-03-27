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
        Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
        Route::group(
        	[
        	'as'		=>	'user@',
        	'prefix'	=> 'users'
        	], function() {
        		Route::get('/', ['as' => 'index', 'uses' => 'UserController@index']);
        		Route::post('/', ['as' => 'store', 'uses' => 'UserController@store']);
        		Route::get('/create', ['as' => 'create', 'uses' => 'UserController@create']);
        		Route::get('/{user}', ['as' => 'show', 'uses' => 'UserController@show']);
        		Route::get('/{user}/edit', ['as' => 'edit', 'uses' => 'UserController@edit']);
        		Route::patch('/{user}', ['as' => 'update', 'uses' => 'UserController@update']);
        		Route::get('/{user}/delete', ['as' => 'delete', 'uses' => 'UserController@destroy']);

        });

        Route::group(
            [
            'as'        =>  'product@',
            'prefix'    =>   'products'
            ], function() {
                Route::get('/', ['as' => 'index', 'uses' => 'ProductController@index']);
                Route::post('/', ['as' => 'store', 'uses' => 'ProductController@store']);
                Route::get('/create', ['as' => 'create', 'uses' => 'ProductController@create']);
                Route::get('/{product}', ['as' => 'show', 'uses' => 'ProductController@show']);
                Route::get('/{product}/edit', ['as' => 'edit', 'uses' => 'ProductController@edit']);
                Route::patch('/{product}', ['as' => 'update', 'uses' => 'ProductController@update']);
                Route::get('/{product}/delete', ['as' => 'delete', 'uses' => 'ProductController@destroy']);

        });

        Route::group(
            [
            'as'        =>  'category@',
            'prefix'    => 'categories'
            ], function() {
                Route::get('/', ['as' => 'index', 'uses' => 'CategoryController@index']);
                Route::post('/', ['as' => 'store', 'uses' => 'CategoryController@store']);
                Route::get('/create', ['as' => 'create', 'uses' => 'CategoryController@create']);
                Route::get('/{category}', ['as' => 'show', 'uses' => 'CategoryController@show']);
                Route::get('/{category}/edit', ['as' => 'edit', 'uses' => 'CategoryController@edit']);
                Route::patch('/{category}', ['as' => 'update', 'uses' => 'CategoryController@update']);
                Route::get('/{category}/delete', ['as' => 'delete', 'uses' => 'CategoryController@destroy']);

        });

    });

    Route::group(
            [
            'namespace' => 'Guest',
            'as'         => 'guest::'
            ],function(){
            Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
            Route::group(
                [
                'as'         => 'product@',
                'prefix'     => 'products'
                ],function(){    
            Route::get('/', ['as' => 'index', 'uses' => 'ProductController@index']);
            Route::get('/{product}', ['as' => 'show', 'uses' => 'ProductController@show']);
            Route::get('/{product}/review', ['as' => 'getReview', 'uses' => 'ProductController@getReview']); 
            });

            Route::group(
                [
                'as'         => 'category@',
                'prefix'     => 'categories'
                ],function(){
            Route::get('/', ['as' => 'index', 'uses' => 'CategoryController@index']);
            Route::get('/{product}', ['as' => 'show', 'uses' => 'CategoryController@show']);    
            });
            

    });
    Route::group(
                [
                'namespace' => 'Auth',
                'as'         => 'guest::auth@'
                ],function(){
        Route::group(
            [
            'middleware' => ['guest']
            ],function(){
            Route::get('login', ['as' => 'showLoginForm', 'uses' => 'AuthController@showLoginForm']);
            Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);
            // Registration Routes...
            Route::get('register', ['as' => 'showRegistrationForm', 'uses' => 'AuthController@showRegistrationForm']);
            Route::post('register', ['as' => 'register', 'uses' => 'AuthController@register']);

            // Password Reset Routes...
            Route::get('password/reset/{token?}', ['as' => 'showResetForm', 'uses' => 'PasswordController@showResetForm']);
            Route::post('password/email', ['as' => 'sendResetLinkEmail', 'uses' => 'PasswordController@sendResetLinkEmail']);
            Route::post('password/reset', ['as' => 'reset', 'uses' => 'PasswordController@reset']);
        });
            Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
    });

    

    Route::group(
        [
        'namespace' => 'User',
        'as'         => 'user::',
        'middleware' => ['auth']
        ], function() {
            Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
            Route::group(
            [
            'as'         => 'product@',
            'prefix'     => 'products'
            ],function(){
        
        Route::post('/{product}/review', ['as' => 'submitReview', 'uses' => 'ProductController@review']);
        });

    });
    
});
