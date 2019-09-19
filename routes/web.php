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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/specialties', 'SpecialtyController@index')->name('specialty.index');
Route::get('/specialties/create', 'SpecialtyController@create')->name('speciality.create');
Route::post('/specialties', 'SpecialtyController@store')->name('specialty.store');

Route::get('/specialties/{specialty}/edit', 'SpecialtyController@edit')->name('specialty.edit');
Route::put('/specialties/{idspecialty}', 'SpecialtyController@update')->name('specialty.update');
Route::get('/specialties/{idspecialty}', 'SpecialtyController@destroy')->name('specialty.destroy');

