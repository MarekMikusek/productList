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

Route::post('/products', 'ProductsController@store')->middleware('auth');
Route::get('/products/create', 'ProductsController@create')->middleware('auth');
Route::get('/products/{product}', 'ProductsController@show');
Route::delete('/products/{id}', 'ProductsController@destroy')->middleware('auth');
Route::patch('/products/{product}', 'ProductsController@update')->middleware('auth');
Route::get('/products', 'ProductsController@index');

Route::get('/prices/create/{product}', 'PricesController@create')->middleware('auth');
Route::post('/prices/{product}', 'PricesController@store')->middleware('auth');
Route::patch('/prices/{price}', 'PricesController@update')->middleware('auth');
Route::delete('/prices/{price}', 'PricesController@destroy')->middleware('auth');

Route::get('/', 'ProductsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
