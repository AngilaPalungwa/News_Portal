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

// use Modules\Post\Http\Controllers\PostController;

Route::prefix('post')->group(function() {
    Route::resource('post', PostController::class);
});
