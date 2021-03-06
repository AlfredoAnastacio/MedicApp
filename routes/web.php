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

Route::middleware(['auth', 'admin'])->namespace('Admin')->group(function(){

    // SPECIALTIES
    Route::get('/specialties', 'SpecialtyController@index')->name('specialty.index');
    Route::get('/specialties/create', 'SpecialtyController@create')->name('speciality.create');
    Route::get('/specialties/{specialty}/edit', 'SpecialtyController@edit')->name('specialty.edit');
    Route::post('specialties-eliminar', 'SpecialtyController@destroy')->name('specialty.destroy');
    Route::post('/specialties', 'SpecialtyController@store')->name('specialty.store');
    Route::put('/specialties/{idspecialty}', 'SpecialtyController@update')->name('specialty.update');

    //DOCTORS
    Route::get('/doctors', 'DoctorController@index')->name('doctors.index');
    Route::get('/doctors/create', 'DoctorController@create')->name('doctors.create');
    Route::get('/doctors/{doctor}/edit', 'DoctorController@edit')->name('doctors.edit');
    Route::post('doctors-eliminar', 'DoctorController@destroy')->name('doctors.destroy');
    Route::post('/doctors', 'DoctorController@store')->name('doctors.store');
    Route::put('/doctors/{idDoctor}', 'DoctorController@update')->name('doctors.update');

    //PATIENTS
    Route::get('/patients', 'PatientController@index')->name('patients.index');
    Route::get('/patients/create', 'PatientController@create')->name('patients.create');
    Route::get('/patients/{patient}/edit', 'PatientController@edit')->name('patients.edit');
    Route::post('patients-eliminar', 'PatientController@destroy')->name('patients.destroy');
    Route::post('/patients', 'PatientController@store')->name('patients.store');
    Route::put('/patients/{idPatient}', 'PatientController@update')->name('patients.update');

});

Route::middleware(['auth', 'doctor'])->namespace('Doctor')->group(function(){

    Route::get('/schedule', 'ScheduleController@edit')->name('schedule.index');
    Route::post('/schedule', 'ScheduleController@store')->name('schedule.store');
});

Route::middleware('auth')->group(function(){

    Route::get('/appointments/create', 'AppointmentController@create')->name('appointments.create');
    Route::post('/appointments', 'AppointmentController@store')->name('appointments.store');

    //JSON
    Route::get('/specialties/{specialty}/doctors', 'Api\SpecialtyController@doctors')->name('specialties.doctors');
    Route::get('/schedule/hours', 'Api\ScheduleController@hours')->name('schedule.hours');

});