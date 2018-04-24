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

Route::resource('emprestar', 'EmprestimoController');
Route::resource('professors', 'ProfessorController');
Route::resource('estadomaterial', 'EstadoMaterialController');
Route::get('agendamento/{agendamento}', 'AgendamentoController@listar');
Route::post('agendamento', 'AgendamentoController@agendar');
Route::get('agendamento/{id}/edit', 'AgendamentoController@desfazer');
Route::put('agendamento/{id}', 'AgendamentoController@updateDesfazer');

Route::resource('materiais', 'MaterialController');
Route::resource('tipomateriais', 'TipoMaterialController');
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

//Route::get('/', function() {
//	return view('materialhome');
//});




//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
