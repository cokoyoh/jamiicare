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
})->middleware('verified');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::post('/appointments/store/{id?}', 'AppointmentsController@store')->name('appointments.store');
Route::get('/appointments', 'AppointmentsController@index')->name('appointments');
Route::get('/appointments/create/{id?}', 'AppointmentsController@create')->name('appointments.create');
Route::get('/appointments/approve/{appointment}', 'AppointmentsController@approve')->name('appointments.approve');