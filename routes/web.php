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

Route::get('/', 'App\Http\Controllers\accueil@index');
Route::get("causes", 'App\Http\Controllers\causes@index');
Route::get('consequences', 'App\Http\Controllers\consequences@index');
Route::get('solutions', 'App\Http\Controllers\solutions@index');

Route::get('resizeImage', 'App\Http\Controllers\accueil@resizeImage');
Route::post('resizeImagePost', 'App\Http\Controllers\accueil@resizeImagePost')->name('resizeImagePost');

Route::get('causes/{param}', 'App\Http\Controllers\causes@details')->where('param', '(.*)');;
Route::get('consequences/{param}', 'App\Http\Controllers\consequences@details');
Route::get('solutions/{param}', 'App\Http\Controllers\solutions@details');