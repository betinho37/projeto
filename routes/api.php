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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/home', 'HomeController');
Route::apiResource('usuario', 'UsuariosController');
Route::get('/api/usuario/create', ['as' => 'usuario.create', 'uses' => 'UsuariosController@create']);


Route::get('/', function () {
    return view('api/login');
});



