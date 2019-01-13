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

Route::get('/', 'BarangController@index');


Route::get('/barang', 'BarangController@index');
Route::get('/barang/create', 'BarangController@create');
Route::post('/barang', 'BarangController@store');
Route::get('/barang/edit/{id_barang}', 'BarangController@edit');
Route::put('/barang/{id}/edit', 'BarangController@update');
Route::delete('/barang/{id}', 'BarangController@destroy');

Route::get('/supplier', 'SupplierController@index');
Route::get('/supplier/create', 'SupplierController@create');
Route::get('/supplier/edit/{id}', 'SupplierController@edit');
Route::put('/supplier/{id}/edit', 'SupplierController@update');
Route::post('/supplier', 'SupplierController@store');
Route::delete('/supplier/{id}', 'SupplierController@destroy');

Route::get('/customer', 'CustomerController@index');
Route::get('/customer/create', 'CustomerController@create');
Route::post('/customer', 'CustomerController@store');
Route::get('/customer/edit/{id}', 'CustomerController@edit');
Route::put('/customer/{id}/edit/', 'CustomerController@update');
Route::delete('/customer/{id}', 'CustomerController@destroy');