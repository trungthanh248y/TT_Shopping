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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/product', 'ProductController@index')->name('indexHome');

Route::get('/products/add', 'ProductController@create')->name('addProduct');
Route::post('/products/add', 'ProductController@store')->name('storeProduct');

Route::get('/products/edit/{id}', 'ProductController@edit')->name('editProduct');
Route::post('/products/edit/{id}', 'ProductController@update')->name('updateProduct');

Route::post('/products/delete', 'ProductController@delete')->name('deleteProduct');
