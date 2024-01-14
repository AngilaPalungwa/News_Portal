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

Route::prefix('adminuser')->group(function() {
    Route::get('/', 'AdminUserController@index')->name('user.index');
    Route::get('/user-create', 'AdminUserController@create')->name('user.create');
    Route::post('/user-store', 'AdminUserController@store')->name('user.store');
    Route::get('/user-edit/{id}', 'AdminUserController@edit')->name('user.edit');
    Route::post('/user-update/{id}', 'AdminUserController@update')->name('user.update');
    Route::get('/user-delete/{id}', 'AdminUserController@destroy')->name('user.delete');
});
