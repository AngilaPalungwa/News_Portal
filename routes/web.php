<?php

use App\Http\Controllers\PageController;
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

Route::get('/',[PageController::class,'index'])->name('home');
Route::get('/news-category/{slug}', [PageController::class, 'category'])->name('categoryPage');
Route::get('/news/{slug}', [PageController::class, 'single'])->name('postDetail');

