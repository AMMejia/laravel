<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([
    'prefix' => 'auth',
], function () {
    // POST api/auth/login
    Route::post('login', 'AuthController@login');

    // POST api/auth/logout
    Route::post('logout', 'AuthController@logout');

    // POST api/auth/refresh
    Route::post('refresh', 'AuthController@refresh');

    // POST api/auth/me
    Route::post('me', 'AuthController@me');
});

Route::group(['middleware' => 'auth:api'], function(){

    Route::namespace('User')->group(function () {

        // GET api/users
        Route::get('users', 'UserController@index');

        // GET api/user/:user
        Route::get('user/{user}', 'UserController@show');

        // POST api/users
        Route::post('users', 'UserController@store');

        // PUT api/user/:user
        Route::put('user/{user}', 'UserController@update');

        // DELETE api/user/:user
        Route::delete('user/{user}', 'UserController@destroy'); 
        
        // POST api/user/image
        Route::post('user/image', 'UserController@updateProfile'); 

        // POST api/user/password
        Route::post('user/password', 'UserController@changePassword');

        // POST api/user/profile
        Route::post('user/profile', 'UserController@changeProfile');

    });

    Route::namespace('Category')->group(function () {

        // GET api/categories
        Route::get('categories', 'CategoryController@index');

        // GET api/category/:category
        Route::get('category/{category}', 'CategoryController@show');

        // POST api/category
        Route::post('category', 'CategoryController@store');

        // PUT api/categor/:category
        Route::put('category/{category}', 'CategoryController@update');

        // DELETE api/category/:category
        Route::delete('category/{category}', 'CategoryController@destroy');   
    });

    Route::namespace('Product')->group(function () {

        // GET api/products
        Route::get('products', 'ProductController@index');

        // GET api/product/:product
        Route::get('product/{product}', 'ProductController@show');

        // POST api/product
        Route::post('product', 'ProductController@store');

        // PUT api/product/:product
        Route::put('product/{product}', 'ProductController@update');

        // DELETE api/product/:product
        Route::delete('product/{product}', 'ProductController@destroy');
        
         // POST api/product/image/:product
         Route::post('product/image/{product}', 'ProductController@updateImage');
    });

    Route::namespace('Package')->group(function () {

        // GET api/packages
        Route::get('packages', 'PackageController@index');

        // GET api/package/:package
        Route::get('package/{package}', 'PackageController@show');

        // POST api/package
        Route::post('package', 'PackageController@store');

        // PUT api/package/:package
        Route::put('package/{package}', 'PackageController@update');

        // DELETE api/package/:package
        Route::delete('package/{package}', 'PackageController@destroy');   
    });

    Route::namespace('Event')->group(function () {

        // GET api/events
        Route::get('events', 'EventController@index');

        // GET api/event/:event
        Route::get('event/{event}', 'EventController@show');

        // POST api/event
        Route::post('event', 'EventController@store');

        // PUT api/event/:event
        Route::put('event/{event}', 'EventController@update');

        // DELETE api/event/:event
        Route::delete('event/{event}', 'EventController@destroy');   
    });
});
