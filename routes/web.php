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

Route::resource('/home', 'HomeController')->middleware(['auth','auth.admin']);
Route::resource('/precios', 'PreciosController')->middleware(['auth','auth.admin']);
Route::resource('/emails', 'EmailController')->middleware(['auth','auth.admin']);
Route::resource('/creditos', 'CreditoController')->middleware(['auth','auth.admin']);

/*la primera es el nombre de la ruta, la segunda es el controlador mas el metodo que iniciara la tercera aun nose jejeje */
Route::resource('/home2','HomeClienteController')->middleware(['auth','auth.cliente']);
Route::resource('/servicioCli', 'ServicioClienteController')->middleware(['auth','auth.cliente']);
Route::get('/cuentaCli', 'CuentaClienteController@index')->name('cuentaCli')->middleware(['auth','auth.cliente']);



