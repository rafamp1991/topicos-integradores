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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web']], function(){
    Route::resource('clientes', 'ClientesController');
});

Route::get('/listClient', 'ClientesController@list');

Route::get('/pdfviewClient',array('as'=>'pdfviewClient','uses'=>'ClientesController@pdfview'));

Route::group(['middleware' => ['web']], function(){
    Route::resource('veiculos', 'VeiculosController');
});

Route::get('/listVehicle', 'VeiculosController@list');

Route::get('/pdfviewVehicle',array('as'=>'pdfviewVehicle','uses'=>'VeiculosController@pdfview'));

Route::group(['middleware' => ['web']], function(){
    Route::resource('rotas', 'RotasController');
});

Route::get('/listRoute', 'RotasController@list');

Route::get('/pdfviewRoute',array('as'=>'pdfviewRoute','uses'=>'RotasController@pdfview'));