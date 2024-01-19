<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\SubscriberController;
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
// HomePage
Route::get('/',[PageController::class,'index'])->name('home');
// Category Page
Route::get('/news-category/{slug}', [PageController::class, 'category'])->name('categoryPage');
// Single PostDetail page
Route::get('/news/{slug}', [PageController::class, 'single'])->name('postDetail');
// Subscription
Route::post('subscriber', [SubscriberController::class, 'subscriber'])->name('subscriber');
Route::get('subscribe', [SubscriberController::class, 'subscribe'])->name('subscribe');
Route::get('event_notification', [SubscriberController::class, 'event'])->name('event.notification');



