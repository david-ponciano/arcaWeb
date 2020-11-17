<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('/usuarios', 'UserController');
Route::resource('mascotas', 'MascotaController');
Route::resource('especies', 'EspecieController');
Route::resource('razas', 'RazaController');
Route::resource('sexos', 'SexoController');
Route::resource('servicios', 'ServicioController');
Route::resource('estados', 'ReproduccionController');
Route::resource('historiales', 'HistorialController');
Route::resource('citas', 'CitasController');
Route::resource('roles', 'RoleController');

 
