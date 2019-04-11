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

Route::get('/home', 'OwnerController@index')->name('home');
Route::group(['prefix' => 'owner'], function(){
	
	Route::get('/ownerPelanggan', 'OwnerController@ownerPelanggan')->name('owner.pelanggan')->middleware('auth');
	Route::get('/ownerTransaksi', 'OwnerController@ownerTransaksi')->name('owner.transaksi')->middleware('auth');

	// Route PDF
	Route::get('/dynamic_pdfBarang','OwnerController@indexBarangPDF')->name('owner.BarangPDF')->middleware('auth');
    Route::get('/dynamic_pdf/pdfBarang','OwnerController@pdfBarangPDF')->name('owner.BarangPDF')->middleware('auth');
    Route::get('/dynamic_pdfPelanggan','OwnerController@indexPelangganPDF')->name('owner.PelangganPDF')->middleware('auth');
    Route::get('/dynamic_pdf/pdfPelanggan','OwnerController@pdfPelangganPDF')->name('owner.PelangganPDF')->middleware('auth');
    Route::get('/dynamic_pdfTransaksi','OwnerController@indexTransaksiPDF')->name('owner.TransaksiPDF')->middleware('auth');
    Route::get('/dynamic_pdf/pdfTransaksi','OwnerController@pdfTransaksiPDF')->name('owner.TransaksiPDF')->middleware('auth');
    // Akhir Route PDF
});

Route::group(['prefix' => 'admin'], function(){
	// Auth
	Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');

	// View
	Route::get('/', 'AdminController@index')->name('admin.home');
	Route::get('/adminPelanggan', 'AdminController@adminPelanggan')->name('admin.pelanggan')->middleware('auth:admin');
	Route::get('/adminTransaksi', 'AdminController@adminTransaksi')->name('admin.transaksi')->middleware('auth:admin');

	// Create
	Route::post('/barang','AdminController@AdminBarangStore')->name('admin.tambahBarang')->middleware('auth:admin');
	Route::post('/pelanggan','AdminController@AdminPelangganStore')->name('admin.tambahPelanggan')->middleware('auth:admin');
	Route::post('/pelanggan/fetch', 'AdminController@fetch')->name('admin.tambahPelanggan.fetch');
	Route::post('/transaksi','AdminController@AdminTransaksiStore')->name('admin.tambahTransaksi')->middleware('auth:admin');

	// Update
	Route::post('/updateBarang','AdminController@AdminUpdateBarang')->name('admin.updateBarang')->middleware('auth:admin');
	Route::post('/updatePelanggan','AdminController@AdminUpdatePelanggan')->name('admin.updatePelanggan')->middleware('auth:admin');

	// Delete
	Route::delete('/deleteBarang','AdminController@AdminDestroyBarang')->name('admin.deleteBarang')->middleware('auth:admin');
	Route::delete('/deletePelanggan','AdminController@AdminDestroyPelanggan')->name('admin.deletePelanggan')->middleware('auth:admin');
});