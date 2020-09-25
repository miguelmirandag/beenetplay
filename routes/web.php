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

//Ruta de Formulario de Login, 
Route::get('/', 'Auth\LoginController@showLoginForm');

//Ruta de Player, como requisito pasa por el middleware para verificar si usuario esta autenticado
Route::get('player', 'PlayerController@index')->name('player')->middleware('usuario.auth');

//Ruta que llama a funcion Login que conecta y verifica con API
Route::post('login', 'Auth\LoginController@login')->name('login');

//Ruta que llama a funcion, para cerrar sesion
Route::post('logout', 'Auth\LoginController@logout')->name('logout');




