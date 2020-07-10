<?php

use Illuminate\Support\Facades\Route;

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
Route::domain('api.kdaimu.com/v1/')->group(function () {
    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@login');
    Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');
    
    Route::get('product', 'ProductController@index')->middleware('jwt.verify');
    Route::get('product/{id}', 'ProductController@detail')->middleware('jwt.verify');
    Route::post('product/create', 'ProductController@create')->middleware('jwt.verify');
    Route::post('product/update', 'ProductController@update')->middleware('jwt.verify');
    Route::delete('product/delete', 'ProductController@delete')->middleware('jwt.verify');
    
    
    Route::get('category', 'CategoryController@index')->middleware('jwt.verify');
    Route::get('category/{id}', 'CategoryController@detail')->middleware('jwt.verify');
    Route::post('category/create', 'CategoryController@create')->middleware('jwt.verify');
    Route::post('category/update', 'CategoryController@update')->middleware('jwt.verify');
    Route::delete('category/delete', 'CategoryController@delete')->middleware('jwt.verify');
    
    Route::get('brand', 'BrandController@index')->middleware('jwt.verify');
    Route::get('brand/{id}', 'BrandController@detail')->middleware('jwt.verify');
    Route::post('brand/create', 'BrandController@create')->middleware('jwt.verify');
    Route::post('brand/update', 'BrandController@update')->middleware('jwt.verify');
    Route::delete('brand/delete', 'BrandController@delete')->middleware('jwt.verify');
    
    Route::get('rack', 'RackController@index')->middleware('jwt.verify');
    Route::get('rack/{id}', 'RackController@detail')->middleware('jwt.verify');
    Route::post('rack/create', 'RackController@create')->middleware('jwt.verify');
    Route::post('rack/update', 'RackController@update')->middleware('jwt.verify');
    Route::delete('rack/delete', 'RackController@delete')->middleware('jwt.verify');
}

