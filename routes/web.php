<?php

use Carbon\Carbon;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', 'FormController@index');

Route::get('/check', 'CheckController@index');

Route::get('/test', 'TestController@index');

Route::get('/bed', 'BedController@index');
Route::get('/bed', 'BedController@fetching');
Route::get('/bed/{bed_number}/edit', 'BedController@edit');
Route::patch('/bed/{bed_number}', 'BedController@update');

Route::get('/w3', 'Ward3Controller@index');
Route::get('/w3', 'Ward3Controller@fetching');
Route::get('/w3/{bed_number}/edit', 'Ward3Controller@edit');
Route::patch('/w3/{bed_number}', 'Ward3Controller@update');

Route::get('/w4', 'Ward4Controller@index');
Route::get('/w4', 'Ward4Controller@fetching');
Route::get('/w4/{bed_number}/edit', 'Ward4Controller@edit');
Route::patch('/w4/{bed_number}', 'Ward4Controller@update');

Route::get('/w5', 'Ward5Controller@index');
Route::get('/w5', 'Ward5Controller@fetching');
Route::get('/w5/{bed_number}/edit', 'Ward5Controller@edit');
Route::patch('/w5/{bed_number}', 'Ward5Controller@update');

Route::get('/icu', 'ICUController@index');
Route::get('/icu', 'ICUController@fetching');
Route::get('/icu/{bed_number}/edit', 'ICUController@edit');
Route::patch('/icu/{bed_number}', 'ICUController@update');
