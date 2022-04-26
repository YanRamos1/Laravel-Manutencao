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


Route::get('/','App\Http\Controllers\LoginController@index')->name('raiz');

Route::get('/dashboard','App\Http\Controllers\DashboardController@index')->name('dashboard.index');

Route::get('/equipamento','App\Http\Controllers\EquipamentoController@index')->name('equipamento.index');
Route::get('/equipamento/new','App\Http\Controllers\EquipamentoController@create')->name('equipamento.create');
Route::post('/equipamento/new-equipamento','App\Http\Controllers\EquipamentoController@add')->name('equipamento.create.post');
Route::post('/equipamento/new-type','App\Http\Controllers\EquipamentoController@addNewType')->name('equipamento_type.create.post');
Route::get('/equipamento/edit/{id}','App\Http\Controllers\EquipamentoController@add')->name('equipamento.edit');
Route::get('/equipamento/delete/{id}','App\Http\Controllers\EquipamentoController@add')->name('equipamento.delete');



Route::get('/cliente','App\Http\Controllers\ClienteController@index');
Route::get('/cliente/new','App\Http\Controllers\ClienteController@create')->name('cliente.create');
Route::post('/cliente/new-cliente','App\Http\Controllers\ClienteController@add')->name('cliente.create.post');

Route::get('/cliente/edit/{$id}','App\Http\Controllers\ClienteController@create')->name('cliente.edit');
Route::get('/cliente/delete/{$id}','App\Http\Controllers\ClienteController@create')->name('cliente.delete');




Route::get('/ordem','App\Http\Controllers\OrdemServicoController@index');
Route::get('/ordem/new','App\Http\Controllers\OrdemServicoController@create')->name('ordem.create');
Route::get('/ordem/edit/{id}','App\Http\Controllers\OrdemServicoController@edit')->name('ordem.edit');
Route::get('/ordem/delete/{id}','App\Http\Controllers\OrdemServicoController@delete')->name('ordem.delete');
Route::get('/ordem/show/{id}','App\Http\Controllers\OrdemServicoController@show')->name('ordem.show');
Route::post('/ordem/new-ordem','App\Http\Controllers\OrdemServicoController@add')->name('ordem.create.post');

Route::get('/servico','App\Http\Controllers\ServicoController@index');
Route::get('/servico/new','App\Http\Controllers\ServicoController@create')->name('servico.create');
Route::post('/servico/delete','App\Http\Controllers\ServicoController@delete')->name('servico.delete');
Route::post('/servico/new-servico','App\Http\Controllers\ServicoController@add')->name('servico.create.post');

Route::get('/material','App\Http\Controllers\MaterialController@index');
Route::get('/material/new','App\Http\Controllers\MaterialController@create')->name('material.create');
Route::post('/material/delete','App\Http\Controllers\MaterialController@delete')->name('material.delete');
Route::post('/material/new-material','App\Http\Controllers\MaterialController@add')->name('material.create.post');

Route::fallback(function () {
    return view('Layout.error');
});






