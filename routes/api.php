<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Auth::routes();
Route::post('register/store', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@create']);

Route::middleware(['auth'])->group(function () {
Route::apiResource('/home', 'HomeController');
Route::apiResource('/usuario', 'UsuariosController');
Route::post('/pesquisar', 'UsuariosController@search')->name('usuario.pesquisar');
Route::get('usuario/{id}/edit/', ['as' => 'usuario.edit', 'uses' => 'UsuariosController@edit']);
Route::get('usuario/destroy/{id}', ['as' => 'usuario.destroy', 'uses'=> 'UsuariosController@destroy']);

/////////////////
Route::apiResource('publicacao', 'PublicacoesController');
Route::get('publicacoes/controle', ['as' => 'publicacoes.controle', 'uses' => 'PublicacoesController@controle']);
Route::get('/publicacoes/create', ['as' => 'publicacoes.create', 'uses' => 'PublicacoesController@create']);
Route::get('publicacao/{id}/edit/', ['as' => 'publicacao.edit', 'uses' => 'PublicacoesController@edit']);
Route::get('excluir/arquivo/{nome}', 'PublicacoesController@deletfile')->name('excluir.arquivo');
Route::get('publicacao/destroy/{id}', ['as' => 'publicacao.destroy', 'uses'=> 'PublicacoesController@destroy']);

});


