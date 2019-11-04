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
Route::post('register/store', ['as' => 'register.store', 'uses' => 'Auth\RegisterController@register']);

Route::middleware(['auth'])->group(function () {
    Route::apiResource('/home', 'HomeController');
    Route::apiResource('/usuario', 'UsuariosController');
    Route::post('/pesquisar', 'UsuariosController@search')->name('usuario.pesquisar');
    Route::get('usuario/{id}/edit/', ['as' => 'usuario.edit', 'uses' => 'UsuariosController@edit']);
    Route::get('usuario/destroy/{id}', ['as' => 'usuario.destroy', 'uses'=> 'UsuariosController@destroy']);
    Route::get('usuarios/create', ['as' => 'usuarios.create', 'uses' => 'UsuariosController@create']);
    Route::get('/updateprofile', 'UsuariosController@updateprofile')->name('usuario.updateprofile');


    Route::apiResource('publicacao', 'PublicacoesController');
    Route::get('publicacoes/controle', ['as' => 'publicacoes.controle', 'uses' => 'PublicacoesController@controle']);
    Route::get('/publicacoes/create', ['as' => 'publicacoes.create', 'uses' => 'PublicacoesController@create']);
    Route::get('publicacao/{id}/edit/', ['as' => 'publicacao.edit', 'uses' => 'PublicacoesController@edit']);
    Route::get('publicacao/destroy/{id}', ['as' => 'publicacao.destroy', 'uses'=> 'PublicacoesController@destroy']);
    Route::apiResource('/publicacoes/categorias', 'CategoriasController');
    Route::post('/publicacao/pesquisar', 'PublicacoesController@search')->name('publicacao.pesquisar');
    Route::get('publicacoes/imagens', ['as' => 'publicacoes.imagens', 'uses' => 'CategoriasController@imagens']);
    Route::get('publicacoes/videos', ['as' => 'publicacoes.videos', 'uses' => 'CategoriasController@videos']);
    Route::get('publicacoes/documentos', ['as' => 'publicacoes.documentos', 'uses' => 'CategoriasController@documentos']);
    Route::get('publicacoes/musicas', ['as' => 'publicacoes.musicas', 'uses' => 'CategoriasController@musicas']);



});


