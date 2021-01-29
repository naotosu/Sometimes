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

Route::get('/', 'App\Http\Controllers\TopController@index');

Route::get('/input', 'App\Http\Controllers\InputController@inputView');

Route::post('/input_data', 'App\Http\Controllers\InputController@inputData');

Route::post('/delete', 'App\Http\Controllers\InputController@deleteExecute');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
