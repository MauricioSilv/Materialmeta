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

Route::get('emprestar', 'EmprestimoController@index');
Route::group([''], function (){
	Route::resource('professors', 'ProfessorController');


});




Route::get('materiais', 'MaterialController@index');
Route::get('tipomateriais', 'Tipo_material@tipoMate');
Route::get('/', function() {
	return view('materialhome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
