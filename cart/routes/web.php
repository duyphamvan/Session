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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('index', 'ProductController@index')->name('index');
//Route::get('/create', 'ProductController@create')->name('create');
//Route::post('/store', 'ProductController@store')->name('store');
//Route::get('{id}/edit', 'ProductController@edit')->name('edit');
//Route::post('{id}/update', 'ProductController@update')->name('update');
Route::get('{id}/show', 'ProductController@show')->name('show');
//Route::get('{id}/delete', 'ProductController@destroy')->name('delete');
Route::get('/{id}/cart', 'CartController@storeCart')->name('store.cart');
Route::get('/carts', 'CartController@showCart')->name('show.cart');
Route::get('/delete/{id}', 'CartController@delete')->name('delete.cart');
Route::get('/deleteAll', 'CartController@deleteAll')->name('del.cart');
Route::get('/update/{id}', 'CartController@update')->name('update.cart');




