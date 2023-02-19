<?php

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
*/
use Illuminate\Support\Facades\Route;

Route::get('/', 'frontendController@index');
Route::prefix('company')->as('company')->group(function () {
    Route::get('/page/{id}/{seo?}', 'contentController@index');
    Route::get('/galeri/{jenis}', 'contentController@galeri');
    Route::get('/info/{id}', 'contentController@informasi');
    Route::get('/berita', 'contentController@berita');
    Route::get('/artikel', 'contentController@artikel');
    Route::get('/agenda', 'contentController@agenda');
    Route::get('/pemilu/{jenis}/{seo?}', 'contentController@pemilu');
    Route::get('/agenda/datainternal', 'contentController@datainternal');
    Route::get('/agenda/dataexternal', 'contentController@dataexternal');
    Route::get('/berita-detail/{id}/{seo?}', 'contentController@beritadetail');
});