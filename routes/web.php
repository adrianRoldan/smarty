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

Route::get('/', "DashboardController@index")->name("/");
Route::get('/dashboard', "DashboardController@index");

Route::get('/cloud', "ConnectionController@cloud");
Route::post('/cloud/sendtocloud', "ConnectionController@sendToCloud");
Route::get('/cloud/sendtocloud', "ConnectionController@sendToCloud");

Route::get('/dispositivo/get/{dispositivo}', "DispositivoController@get");

Auth::routes();

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/broker', "ConnectionController@broker");
Route::post('/broker/sendtomosquitto', "ConnectionController@sendToMosquitto");
Route::get('/broker/sendtomosquitto', "ConnectionController@sendToMosquitto");

