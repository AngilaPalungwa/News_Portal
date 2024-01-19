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

Route::prefix('ads')->group(function() {
    // Route::get('/', 'AdsController@index')->name('ads');
    // Route::get('/ads-create', 'AdsController@create')->name('ads.create');
    // Route::post('/ads-create', 'AdsController@create')->name('ads.create');
    Route::resource('ads', AdsController::class);
});
