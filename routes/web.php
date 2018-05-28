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
Route::get('confirmar/{id}', 'EmprestimoController@confirmar');
Route::resource('professors', 'ProfessorController');
Route::resource('estadomaterial', 'EstadoMaterialController');
Route::get('agenda/{id}', 'AgendamentoController@listar');
Route::get('agendprofessor', 'AgendamentoController@agendprofessor');
Route::post('agendamento', 'AgendamentoController@agendar');
Route::get('agendament/{id}/edit', 'AgendamentoController@desfazer');
Route::put('agendamentu/{id}', 'AgendamentoController@updateDesfazer');
Route::get('emprestimos', 'AgendamentoController@listaEmprestimo');

Route::resource('materiais', 'MaterialController');
Route::resource('tipomateriais', 'TipoMaterialController');
Route::get('inicio', 'InicioController@inicio');
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

//Route::get('/', function() {
//	return view('materialhome');
//});




//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
