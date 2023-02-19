<?php

use Illuminate\Support\Facades\Route;

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

//frontend
Route::get('ojisatriani/noauth/{folder}/{file}', 'Backend\jsController@backendnoauth');
Route::get('ojisatriani/frontend/{versi}/{folder}/{file}', 'Backend\jsController@frontend');

// Auth
// Auth::routes(['register' => false]);
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Route::group(['middleware' => 'throttle:5,10'], function () {
    Route::post('pengguna/masuk', 'Backend\userController@masuk');
// });

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('file/{id}/{nama}', 'Backend\fileController@getFile');
Route::get('download/{id}/{nama}', 'Backend\fileController@download');