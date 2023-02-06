<?php

use App\Http\Controllers\CameraController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\SubscriptionController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\StationController::class, 'index']);

Auth::routes();


// Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google', [App\Http\Controllers\Auth\GoogleController::class, 'redirectToGoogle']);
// Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');
Route::get('auth/google/callback', [App\Http\Controllers\Auth\GoogleController::class, 'handleGoogleCallback']);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('subscriptions', SubscriptionController::class);

    Route::get('cameras/{camera}/edit', [App\Http\Controllers\CameraController::class, 'edit'])->name('cameras.edit');
    Route::match(['put', 'patch'], 'cameras/{camera}', 'CameraController@update')->name('cameras.update');
});

Route::get('/show-img/{filename}', [App\Http\Controllers\CameraController::class, 'showImg'])->name('camera.show-img');

Route::resource('cameras', CameraController::class, [
    'only' => ['index', 'show']
]);

// Route::get('/list-stations', [App\Http\Controllers\StationController::class, 'listStations'])->name('list-stations');

Route::resource('stations', StationController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
