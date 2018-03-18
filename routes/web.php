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

Route::get('emprestar/{material}', 'EmprestimoController@index');
Route::post('emprestar', 'EmprestimoController@store');

Route::resource('professors', 'ProfessorController');
Route::resource('estadomaterial', 'EstadoMaterialController');

Route::resource('materiais', 'MaterialController');
Route::resource('tipomateriais', 'TipoMaterialController');
//Route::get('/', function() {
//	return view('materialhome');
//});


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
