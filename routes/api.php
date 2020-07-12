<?php

use Illuminate\Support\Facades\Route;

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');

Route::get('product', 'ProductController@index')->middleware('jwt.verify');
Route::get('product/{id}', 'ProductController@detail')->middleware('jwt.verify');
Route::post('product/create', 'ProductController@create')->middleware('jwt.verify');
Route::post('product/update', 'ProductController@update')->middleware('jwt.verify');
Route::delete('product/delete/{id}', 'ProductController@delete')->middleware('jwt.verify');
Route::post('product/search', 'ProductController@search')->middleware('jwt.verify');

Route::get('category', 'CategoryController@index')->middleware('jwt.verify');
Route::get('category/{id}', 'CategoryController@detail')->middleware('jwt.verify');
Route::post('category/create', 'CategoryController@create')->middleware('jwt.verify');
Route::post('category/update', 'CategoryController@update')->middleware('jwt.verify');
Route::delete('category/delete/{id}', 'CategoryController@delete')->middleware('jwt.verify');

Route::get('brand', 'BrandController@index')->middleware('jwt.verify');
Route::get('brand/{id}', 'BrandController@detail')->middleware('jwt.verify');
Route::post('brand/create', 'BrandController@create')->middleware('jwt.verify');
Route::post('brand/update', 'BrandController@update')->middleware('jwt.verify');
Route::delete('brand/delete/{id}', 'BrandController@delete')->middleware('jwt.verify');

Route::get('rack', 'RackController@index')->middleware('jwt.verify');
Route::get('rack/{id}', 'RackController@detail')->middleware('jwt.verify');
Route::post('rack/create', 'RackController@create')->middleware('jwt.verify');
Route::post('rack/update', 'RackController@update')->middleware('jwt.verify');
Route::delete('rack/delete/{id}', 'RackController@delete')->middleware('jwt.verify');

Route::get('penjualan', 'PenjualanController@index')->middleware('jwt.verify');
Route::get('penjualan/{id}', 'PenjualanController@detail')->middleware('jwt.verify');
Route::post('penjualan/create', 'PenjualanController@create')->middleware('jwt.verify');
Route::post('penjualan/update', 'PenjualanController@update')->middleware('jwt.verify');
Route::delete('penjualan/delete/{id}', 'PenjualanController@delete')->middleware('jwt.verify');

Route::get('pembelian', 'PembelianController@index')->middleware('jwt.verify');
Route::get('pembelian/{id}', 'PembelianController@detail')->middleware('jwt.verify');
Route::post('pembelian/create', 'PembelianController@create')->middleware('jwt.verify');
Route::post('pembelian/update', 'PembelianController@update')->middleware('jwt.verify');
Route::delete('pembelian/delete/{id}', 'PembelianController@delete')->middleware('jwt.verify');