<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Package\PackageController;
use App\Http\Controllers\Event\EventController;
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
    Route::post('login', [AuthController::class, 'login']);

    // POST api/auth/logout
    Route::post('logout', [AuthController::class, 'logout']);

    // POST api/auth/refresh
    Route::post('refresh', [AuthController::class, 'refresh']);

    // POST api/auth/me
    Route::post('me', [AuthController::class, 'me']);
});

Route::group(['middleware' => 'auth:api'], function(){

    // GET api/users
    Route::get('users', [UserController::class, 'index']);

    // GET api/user/:user
    Route::get('user/{user}', [UserController::class, 'show']);

    // POST api/users
    Route::post('users', [UserController::class, 'store']);

    // PUT api/user/:user
    Route::put('user/{user}', [UserController::class, 'update']);

    // DELETE api/user/:user
    Route::delete('user/{user}', [UserController::class, 'destroy']); 
    
    // POST api/user/image
    Route::post('user/image', [UserController::class, 'updateProfile']); 

    // POST api/user/password
    Route::post('user/password', [UserController::class, 'changePassword']);

    // POST api/user/profile
    Route::post('user/profile', [UserController::class, 'changeProfile']);

    // GET api/categories
    Route::get('categories', [CategoryController::class, 'index']);

    // GET api/category/:category
    Route::get('category/{category}', [CategoryController::class, 'show']);

    // POST api/category
    Route::post('category', [CategoryController::class, 'store']);

    // PUT api/categor/:category
    Route::put('category/{category}', [CategoryController::class, 'update']);

    // DELETE api/category/:category
    Route::delete('category/{category}', [CategoryController::class, 'destroy']);   

    // GET api/products
    Route::get('products', [ProductController::class, 'index']);

    // GET api/product/:product
    Route::get('product/{product}', [ProductController::class, 'show']);

    // POST api/product
    Route::post('product', [ProductController::class, 'store']);

    // PUT api/product/:product
    Route::put('product/{product}', [ProductController::class, 'update']);

    // DELETE api/product/:product
    Route::delete('product/{product}', [ProductController::class, 'destroy']);
    
    // POST api/product/image/:product
    Route::post('product/image/{product}', [ProductController::class, 'updateImage']);

    // GET api/packages
    Route::get('packages', [PackageController::class, 'index']);

    // GET api/package/:package
    Route::get('package/{package}', [PackageController::class, 'show']);

    // POST api/package
    Route::post('package', [PackageController::class, 'store']);

    // PUT api/package/:package
    Route::put('package/{package}', [PackageController::class, 'update']);

    // DELETE api/package/:package
    Route::delete('package/{package}', [PackageController::class, 'destroy']);   

    // GET api/events
    Route::get('events', [EventController::class, 'index']);

    // GET api/event/:event
    Route::get('event/{event}', [EventController::class, 'show']);

    // POST api/event
    Route::post('event', [EventController::class, 'store']);

    // PUT api/event/:event
    Route::put('event/{event}', [EventController::class, 'update']);

    // DELETE api/event/:event
    Route::delete('event/{event}', [EventController::class, 'destroy']);
});
