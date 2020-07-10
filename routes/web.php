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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('v1')->group(function () {
    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@login');
    Route::get('user', 'UserController@getAuthenticatedUser');
    
    Route::get('product', 'ProductController@index');
    Route::get('product/{id}', 'ProductController@detail');
    Route::post('product/create', 'ProductController@create');
    Route::post('product/update', 'ProductController@update');
    Route::delete('product/delete', 'ProductController@delete');
    
    
    Route::get('category', 'CategoryController@index');
    Route::get('category/{id}', 'CategoryController@detail');
    Route::post('category/create', 'CategoryController@create');
    Route::post('category/update', 'CategoryController@update');
    Route::delete('category/delete', 'CategoryController@delete');
    
    Route::get('brand', 'BrandController@index');
    Route::get('brand/{id}', 'BrandController@detail');
    Route::post('brand/create', 'BrandController@create');
    Route::post('brand/update', 'BrandController@update');
    Route::delete('brand/delete', 'BrandController@delete');
    
    Route::get('rack', 'RackController@index');
    Route::get('rack/{id}', 'RackController@detail');
    Route::post('rack/create', 'RackController@create');
    Route::post('rack/update', 'RackController@update');
    Route::delete('rack/delete', 'RackController@delete');
})->middleware('jwt.verify');