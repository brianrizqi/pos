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
    return view('dashboard');
})->name('home');



Route::get('/barang', 'BarangController@index')->name('barang');
Route::get('/barang/print', 'BarangController@pdf')->name('cetak_barang');
Route::get('/barang/create', 'BarangController@create')->name('create_barang');
Route::post('/barang', 'BarangController@store')->name('store_barang');
Route::get('/barang/edit/{id_barang}', 'BarangController@edit')->name('edit_barang');
Route::put('/barang/{id}/edit', 'BarangController@update')->name('update_barang');
Route::delete('/barang/{id}', 'BarangController@destroy')->name('destroy_barang');

Route::get('/supplier', 'SupplierController@index')->name('supplier');
Route::get('/supplier/create', 'SupplierController@create')->name('create_supplier');
Route::get('/supplier/edit/{id}', 'SupplierController@edit')->name('edit_supplier');
Route::put('/supplier/{id}/edit', 'SupplierController@update')->name('update_supplier');
Route::post('/supplier', 'SupplierController@store')->name('store_supplier');
Route::delete('/supplier/{id}', 'SupplierController@destroy')->name('destroy_supplier');

Route::get('/customer', 'CustomerController@index')->name('customer');
Route::get('/customer/create', 'CustomerController@create')->name('create_customer');
Route::post('/customer', 'CustomerController@store')->name('store_customer');
Route::get('/customer/edit/{id}', 'CustomerController@edit')->name('edit_customer');
Route::put('/customer/{id}/edit/', 'CustomerController@update')->name('update_customer');
Route::delete('/customer/{id}', 'CustomerController@destroy')->name('destroy_customer');

Route::get('/pembelian', 'PembelianController@index')->name('pembelian');
Route::get('/pembelian/create/{id}', 'PembelianController@create')->name('create_pembelian');
Route::post('/pembelian/barang/', 'PembelianController@tambahBarang')->name('tambahBarang_pembelian');
Route::post('/pembelian', 'PembelianController@store')->name('store_pembelian');
Route::get('/pembelian/clear', 'PembelianController@clear')->name('clear_pembelian');
Route::get('/pembelian/fetch/{id}', 'PembelianController@fetch')->name('fetch_pembelian');
Route::get('/pembelian/barang/{id}', 'PembelianController@barang')->name('barang_pembelian');
Route::get('/pembelian/detail/{id}', 'PembelianController@detail_barang')->name('detail_barang_pembelian');

Route::get('/detail_pembelian', 'DetailPembelianController@index')->name('detail_pembelian');
Route::get('/detail_pembelian/print/{id}', 'DetailPembelianController@pdf')->name('cetak_detail_pembelian');
Route::get('/detail_pembelian/hutang/{id}', 'DetailPembelianController@edit')->name('edit_detail_pembelian');
Route::get('/detail_pembelian/retur/{id}', 'DetailPembelianController@retur')->name('retur_detail_pembelian');
Route::post('/detail_pembelian/retur/', 'DetailPembelianController@tambahBarang')->name('tambahBarang_detail_pembelian');
Route::post('/detail_pembelian/returbarang/', 'DetailPembelianController@returBarang')->name('returBarang_detail_pembelian');
Route::get('/detail_pembelian/barang/{id}/{id_pembelian}', 'DetailPembelianController@barang')->name('barang_detail_pembelian');
Route::put('/detail_pembelian/{id}/hutang', 'DetailPembelianController@update')->name('update_detail_pembelian');
Route::get('/detail_pembelian/{id}/{id_pembelian}', 'DetailPembelianController@hapusBarang')->name('hapusBarang_detail_pembelian');

Route::get('/kartu_stok', 'KartuStokController@index')->name('kartu_stok');
Route::get('/kartu_stok/fetch/{id}', 'KartuStokController@fetch')->name('fetch_kartu_stok');

Route::get('/penjualan', 'PenjualanController@index')->name('penjualan');
Route::get('/penjualan/create', 'PenjualanController@create')->name('create_penjualan');
Route::post('/penjualan', 'PenjualanController@store')->name('store_penjualan');
Route::post('/penjualan/barang/', 'PenjualanController@tambahBarang')->name('tambahBarang_penjualan');
Route::get('/penjualan/fetch/{id}', 'PenjualanController@fetch')->name('fetch_penjualan');
Route::get('/penjualan/barang/{id}', 'PenjualanController@barang')->name('barang_penjualan');
Route::get('/penjualan/detail/{id}', 'PenjualanController@detail_barang')->name('detail_barang_penjualan');

Route::get('/detail_penjualan', 'DetailPenjualanController@index')->name('detail_penjualan');

Route::get('/retur', 'ReturController@index')->name('retur');
Route::get('/retur/detail/{id}', 'ReturController@detail')->name('detail_retur');

Route::get('/hutang', 'HutangPembelianController@index')->name('hutang');
