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

Route::post('/products', 'ProductsController@store');
Route::get('/products/create', 'ProductsController@create');
Route::get('/products/{product}', 'ProductsController@show');
Route::delete('/products/{id}', 'ProductsController@destroy');
Route::patch('/products/{product}', 'ProductsController@update');
Route::get('/products', 'ProductsController@index');

Route::get('/prices/create/{product}', 'PricesController@create');
Route::post('/prices/{product}', 'PricesController@store');
Route::patch('/prices/{price}', 'PricesController@update');
Route::delete('/prices/{price}', 'PricesController@destroy');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
