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

Route::get('causes/{param}', 'App\Http\Controllers\causes@details')->where('param', '(.*)');
Route::get('consequences/{param}', 'App\Http\Controllers\consequences@details');
Route::get('solutions/{param}', 'App\Http\Controllers\solutions@details');


Route::get('administrateur-back-office-web-design-2022', 'App\Http\Controllers\admin@index');
Route::get('administration/logout', 'App\Http\Controllers\admin@logout');
Route::post('administrateur/login', 'App\Http\Controllers\admin@login');
Route::get('administrateur/causes', 'App\Http\Controllers\admin@causes');
Route::get('administrateur/consequences', 'App\Http\Controllers\admin@consequences');
Route::get('administrateur/solutions', 'App\Http\Controllers\admin@solutions');

Route::post('administrateur/causes/ajouter', 'App\Http\Controllers\admin@ajouterCause');
Route::post('administrateur/causes/modifier', 'App\Http\Controllers\admin@modifierCause');
Route::post('administrateur/causes', 'App\Http\Controllers\admin@rechercheCause');
Route::get('administrateur/causes/{param}/suppression', 'App\Http\Controllers\admin@suppressionCause')->where('param', '(.*)');
Route::get('administrateur/causes/{param}/modification', 'App\Http\Controllers\admin@modificationCause')->where('param', '(.*)');

Route::post('administrateur/consequences/ajouter', 'App\Http\Controllers\admin@ajouterConsequence');
Route::post('administrateur/consequences/modifier', 'App\Http\Controllers\admin@modifierConsequence');
Route::post('administrateur/consequences', 'App\Http\Controllers\admin@rechercheConsequence');
Route::get('administrateur/consequences/{param}/suppression', 'App\Http\Controllers\admin@suppressionConsequence')->where('param', '(.*)');
Route::get('administrateur/consequences/{param}/modification', 'App\Http\Controllers\admin@modificationConsequence')->where('param', '(.*)');

Route::post('administrateur/solutions/ajouter', 'App\Http\Controllers\admin@ajouterSolution');
Route::post('administrateur/solutions/modifier', 'App\Http\Controllers\admin@modifierSolution');
Route::post('administrateur/solutions', 'App\Http\Controllers\admin@rechercheSolution');
Route::get('administrateur/solutions/{param}/suppression', 'App\Http\Controllers\admin@suppressionSolution')->where('param', '(.*)');
Route::get('administrateur/solutions/{param}/modification', 'App\Http\Controllers\admin@modificationSolution')->where('param', '(.*)');