<?php

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
|
*/

use Illuminate\Support\Facades\Route;

Route::get(config('master.aplikasi.author').'/{folder}/{file}', 'jsController@backend');
Route::get(config('master.aplikasi.author').'/{folder}/{id}/{file}', 'jsController@backendWithId');
Route::get(config('master.aplikasi.author').'/{folder}/{link}/{kode}/{file}', 'jsController@backendWithKode');

Route::get('/home', 'berandaController@index')->name('beranda.home');
Route::group(['prefix' => config('master.url.admin')], function () {
	// dashboard - beranda
	// Route::get('/', 'berandaController@index')->name('beranda.index');

	// Url Public
    Route::group(['middleware' => ['throttle:5']], function () {
		Route::post('lock-screen', 'userController@lockScreen');
    });
	//user ubah password
	Route::get('user/ubahpassword/{id}', 'userController@ubahpassword')->name('user.ubahpassword');
	Route::group(['middleware' => ['throttle:10']], function () {
		Route::post('user/ubahpassword', 'userController@resetpassword')->name('user.store_ubahpassword');
	});
	Route::group(['middleware' => ['aksesmenu']], function () {
        //user
        Route::get('user/hapus/{id}', 'userController@hapus')->name('user.hapus');
        Route::get('user/data', 'userController@data')->name('user.data');
        Route::resource('user', 'userController');
        //menu
        Route::get('menu/hapus/{id}', 'menuController@hapus')->name('menu.hapus');
        Route::get('menu/data', 'menuController@data')->name('menu.data');
        Route::post('menu/susun-menu', 'menuController@susunMenu')->name('menu.susun-menu');
        Route::get('menu/extract-menu', 'menuController@extract')->name('menu.extract-menu');
        Route::resource('menu', 'menuController');
        //aksesgrup
        Route::get('aksesgrup/hapus/{id}', 'aksesgrupController@hapus')->name('aksesgrup.hapus');
        Route::get('aksesgrup/data', 'aksesgrupController@data')->name('aksesgrup.data');
        Route::get('aksesgrup/detail/data/{id}', 'aksesgrupController@data_detail')->name('aksesgrup.data_detail');
        Route::resource('aksesgrup', 'aksesgrupController');
        //aksesmenu
        Route::get('aksesmenu/data/{id}', 'aksesmenuController@data')->name('aksesmenu.data');
        Route::get('aksesmenu/create/{id}', 'aksesmenuController@create')->name('aksesmenu.create_id');
        Route::resource('aksesmenu', 'aksesmenuController');
        
        // slider
        Route::prefix('slider')->as('slider')->group(function () {
            Route::get('/data', 'sliderController@data');
            Route::get('/hapus/{id}', 'sliderController@hapus');
        });
        Route::resource('slider', 'sliderController');

        // kontak
        Route::prefix('kontak')->as('kontak')->group(function () {
            Route::get('/data', 'kontakController@data');
            Route::get('/hapus/{id}', 'kontakController@hapus');
        });
        Route::resource('kontak', 'kontakController');

        // aplikasi
        Route::prefix('aplikasi')->as('aplikasi')->group(function () {
            Route::get('/data/{id?}', 'aplikasiController@data');
            Route::get('/logo/{id}', 'aplikasiController@logo');
            Route::post('/store_logo', 'aplikasiController@store_logo');
            Route::get('/favicon/{id}', 'aplikasiController@favicon');
            Route::post('/store_favicon', 'aplikasiController@store_favicon');
        });
        Route::resource('aplikasi', 'aplikasiController'); 
        
        // content
        Route::prefix('halaman')->as('halaman')->group(function () {
            Route::get('/data/{id?}', 'halamanController@data');
            Route::get('/hapus/{id}', 'halamanController@hapus');
            Route::get('/save/{id}', 'halamanController@save');
            Route::get('/create_child/{id}', 'halamanController@create_child');
            Route::post('/store_halaman', 'halamanController@store_halaman');
            Route::get('/link/{id}', 'halamanController@link');
            Route::post('/store_link', 'halamanController@store_link');
            Route::get('/upload/{id}', 'halamanController@upload');
            Route::post('/store_upload', 'halamanController@store_upload');
        });
        Route::resource('halaman', 'halamanController');

        // portal
        Route::prefix('portal')->as('portal')->group(function () {
            Route::get('/data/{id}', 'portalController@data');
            Route::get('/hapus/{id}', 'portalController@hapus');
            Route::get('/create_child/{id}', 'portalController@create_child');

            Route::get('/save/{id}', 'halamanController@save');
            Route::get('/create_child/{id}', 'halamanController@create_child');
            Route::post('/store_halaman', 'halamanController@store_halaman');
            Route::get('/link/{id}', 'halamanController@link');
            Route::post('/store_link', 'halamanController@store_link');
            Route::get('/upload/{id}', 'halamanController@upload');
            Route::post('/store_upload', 'halamanController@store_upload');
        });
        Route::resource('portal', 'portalController');

        // upload
        Route::prefix('upload')->as('upload')->group(function () {
            Route::get('/data/{id}', 'uploadController@data');
            Route::get('/hapus/{id}', 'uploadController@hapus');
            Route::get('/create_child/{id}', 'uploadController@create_child');
        });
        Route::resource('upload', 'uploadController');
    });
});
