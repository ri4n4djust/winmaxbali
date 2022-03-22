<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\masterController;
use App\Http\Controllers\HomeController;

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
Route::get('/', [App\Http\Controllers\masterController::class, 'index']);
Route::get('/strg', function(){
    Artisan::call('storage:link');
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/send-web-push-notificaiton', [HomeController::class, 'index'])->name('send-push.notificaiton');

Route::post('/save-device-token', [HomeController::class, 'saveDeviceToken'])->name('save-device.token');
Route::post('/send-notification', [HomeController::class, 'sendNotification'])->name('send.notification');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
