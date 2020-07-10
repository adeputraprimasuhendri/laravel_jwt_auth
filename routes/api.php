<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');

Route::get('product', 'ProductController@index')->middleware('jwt.verify');
Route::post('product/create', 'ProductController@create')->middleware('jwt.verify');
Route::post('product/update', 'ProductController@update')->middleware('jwt.verify');
Route::post('product/delete', 'ProductController@delete')->middleware('jwt.verify');


Route::get('category', 'CategoryController@index')->middleware('jwt.verify');
Route::post('category/create', 'CategoryController@create')->middleware('jwt.verify');
Route::post('category/update', 'CategoryController@update')->middleware('jwt.verify');
Route::post('category/delete', 'CategoryController@delete')->middleware('jwt.verify');

Route::get('brand', 'BrandController@index')->middleware('jwt.verify');
Route::post('brand/create', 'BrandController@create')->middleware('jwt.verify');
Route::post('brand/update', 'BrandController@update')->middleware('jwt.verify');
Route::post('brand/delete', 'BrandController@delete')->middleware('jwt.verify');

Route::get('rack', 'RackController@index')->middleware('jwt.verify');
Route::post('rack/create', 'RackController@create')->middleware('jwt.verify');
Route::post('rack/update', 'RackController@update')->middleware('jwt.verify');
Route::post('rack/delete', 'RackController@delete')->middleware('jwt.verify');