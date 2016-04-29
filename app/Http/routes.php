<?php

Route::group(['middleware' => 'web'], function () {

    Route::group(
    	[
    	'namespace' => 'Admin',
    	'as'		 => 'admin::',
    	'prefix'     => 'admin',
    	'middleware' => ['auth', 'roles'],
    	'roles'      => ['admin'],
        ], function() {

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
            Route::get('/{product}/reviews', ['prefix' => 'products', 'as' => 'review@show', 'uses' => 'ReviewController@show']);
            Route::group(
                [
                'as'         => 'product@',
                ],function(){    
            Route::get('/', ['as' => 'index', 'prefix' => 'products', 'uses' => 'ProductController@index']);
            Route::get('/{product}', ['as' => 'show', 'prefix' => 'products', 'uses' => 'ProductController@show']);
            Route::post('searchProduct', ['as' => 'search', 'uses' => 'SearchController@searchProduct']);

            Route::get('search/autocomplete', ['as'=> 'autocomplete', 'uses' => 'SearchController@autocomplete']);
                    });
            Route::group(
                [
                'as'         => 'category@',
                'prefix'     => 'categories'
                ],function(){
            Route::get('/', ['as' => 'index', 'uses' => 'CategoryController@index']);
            Route::get('/{category}', ['as' => 'show', 'uses' => 'CategoryController@show']);
            Route::get('{hierarchy}', ['as' => 'nested', 'uses' => 'CategoryController@nested'])->where('hierarchy', '(.*)?');
            });
    });

    Route::group(
                [
                'namespace' => 'Auth',
                'as'         => 'guest::auth@'
                ],function(){
       Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']); 
        Route::group(
            [
            'middleware' => ['guest']
            ],function(){
            Route::get('login', ['as' => 'showLoginForm', 'uses' => 'AuthController@showLoginForm']);
            Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);
            Route::get('register', ['as' => 'showRegistrationForm', 'uses' => 'AuthController@showRegistrationForm']);
            Route::post('register', ['as' => 'register', 'uses' => 'AuthController@register']);
            Route::get('password/reset/{token?}', ['as' => 'showResetForm', 'uses' => 'PasswordController@showResetForm']);
            Route::post('password/email', ['as' => 'sendResetLinkEmail', 'uses' => 'PasswordController@sendResetLinkEmail']);
            Route::post('password/reset', ['as' => 'reset', 'uses' => 'PasswordController@reset']);
        });
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
            'as'         => 'profile@',
            'prefix'     => '/profile'
            ], function() {
            	Route::get('/edit',['as' => 'edit', 'uses' => 'ProfileController@edit']);
            	Route::post('/',['as' => 'update', 'uses' => 'ProfileController@update']);
            });
            Route::group(
            [
            'as'         => 'review@',
            'prefix'     => '/reviews'
            ],function(){
            
                Route::post('/{product}', ['as' => 'store', 'uses' => 'ReviewController@store']);
                
        });
    });
});
