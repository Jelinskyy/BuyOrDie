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

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'ProductController@index');

Route::post('/rate/{product}/{value}', 'RatesController@store');

Route::get('/seller/{user}/edit', 'SellerController@edit');
Route::get('/seller/{user}', 'SellerController@index');
Route::patch('/seller/{user}', 'SellerController@update');

Route::get('/p/create', 'ProductController@create');
Route::get('/p/{product}', 'ProductController@show');
Route::post('/p', 'ProductController@store');