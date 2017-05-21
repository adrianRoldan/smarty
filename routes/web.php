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

Route::get('/', "MapaController@index")->name("/");
Route::get('/dashboard', "MapaController@index");


Route::get("/bindMosquitto", "ConnectionController@bindMosquitto");



Route::get('/cloud', "ConnectionController@cloud");
Route::post('/cloud/sendtocloud', "ConnectionController@sendToCloud");
Route::get('/cloud/sendtocloud', "ConnectionController@sendToCloud");

Route::get('/dispositivo/get/{dispositivo}', "DispositivoController@get");
Route::get('/nodo/get/{id}', "NodoController@get");

Auth::routes();

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/broker', "ConnectionController@broker");
Route::post('/broker/send', "ConnectionController@sendToBroker");
Route::get('/broker/sendtomosquitto', "ConnectionController@sendToMosquitto");
Route::post('/broker/bindmosquitto', "ConnectionController@bindMosquitto");
Route::get('/broker/bindmosquitto', "ConnectionController@bindMosquitto");


Route::get('/mapa', "MapaController@index");




