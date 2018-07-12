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

// Route::resource('hotel', 'HotelController');
// Route::resource('bike', 'BikeController');
// Route::resource('member', 'MemberController');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
	// Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('bike', 'BikeController');
	Route::resource('hotel', 'HotelController');
	Route::resource('member', 'MemberController');
	Route::resource('lokasi', 'LokasiController');
	//Route::resource('transaksi', 'TransaksiController');
	Route::resource('sewa', 'TransaksiController');
	// Route::resource('kembali', 'KembaliController');

	Route::get('maps', 'HomeController@maps');


	Route::post('select-ajax', ['as'=>'select-ajax','uses'=>'TransaksiController@selectBike']);

	// Profile
	Route::get('settings/profile', 'SettingController@profile');

    // Edit Profile
	Route::get('settings/profile/edit', 'SettingController@editProfile');

    // Update Profile
	Route::post('settings/profile', 'SettingController@updateProfile');
	Route::get('lokasi', 'LokasiController@index');

    // // Transaksi Sewa
    // Route::get('transaksi/sewa', 'TransaksiController@sewa');

    // Transaksi Kembali
	Route::get('/kembali', 'TransaksiController@kembali')->name('sewa.kembali');

    // Transaksi Absensi
   // Route::get('transaksi/absensi', 'TransaksiController@absensi');



});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
