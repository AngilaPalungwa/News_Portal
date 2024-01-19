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

Route::prefix('login')->group(function() {
    // Login
    Route::get('/', 'LoginController@index')->name('login');
    Route::post('/submit', 'LoginController@submit')->name('frontend.login');

    // Register
    Route::get('/register', 'RegisterController@index')->name('register');
    Route::post('/submit-register', 'RegisterController@submit')->name('frontend.register');
    
    // Forgot Password
    Route::get('/password-forget', 'ResetPasswordController@index')->name('login.forget');
    Route::post('/password-reset', 'ResetPasswordController@resetPassword')->name('login.forget.reset');
    Route::get('/show-reset{token}', 'ResetPasswordController@showResetForm')->name('login.forgot.form');
    Route::post('/handle-reset{token}', 'ResetPasswordController@handleReset')->name('login.forgot.handle');

    // Logout
    Route::get('/logout', 'LoginController@logout')->name('logout');

});
