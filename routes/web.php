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
    Route::resource('clientes', 'ClienteController');
});

Route::get('/listClient', 'ClienteController@list');

Route::get('/pdfviewClient',array('as'=>'pdfviewClient','uses'=>'ClienteController@pdfview'));

Route::group(['middleware' => ['web']], function(){
    Route::resource('veiculos', 'VeiculoController');
});

Route::get('/listVehicle', 'VeiculoController@list');

Route::get('/pdfviewVehicle',array('as'=>'pdfviewVehicle','uses'=>'VeiculoController@pdfview'));

Route::group(['middleware' => ['web']], function(){
    Route::resource('motoristas', 'MotoristaController');
});

Route::get('/listDriver', 'MotoristaController@list');

Route::get('/pdfviewDriver',array('as'=>'pdfviewDriver','uses'=>'MotoristaController@pdfview'));

Route::group(['middleware' => ['web']], function(){
    Route::resource('rotas', 'RotaController');
});

Route::get('/listRoute', 'RotaController@list');

Route::get('/pdfviewRoute',array('as'=>'pdfviewRoute','uses'=>'RotaController@pdfview'));