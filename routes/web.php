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
    return view('/auth/login');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/api/usuario/destroy/{id}', ['as' => 'usuario.destroy', 'uses'=> 'UsuariosController@destroy']);
    Route::get('publicacoes/controle', ['as' => 'publicacoes.controle', 'uses' => 'PublicacoesController@controle']);
Route::get('usuario/{id}/edit/', ['as' => 'usuario.edit', 'uses' => 'UsuariosController@edit']);
});
