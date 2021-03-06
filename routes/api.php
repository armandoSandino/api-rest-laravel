<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//insertar usuario
Route::post('usuario','UserController@store');
//Route::ApiResource('usuario','UserController');//esta ruta tabiem es valida para registrar
//login
Route::post('login','UserController@login');
    
//rutas protegidas
//Route::ApiResource('contactos','ContactoController');
Route::group(['middleware'=>'auth:api'], function () {

    
    Route::ApiResource('contactos','ContactoController');
    //cerrar sesion
    Route::post('logout', 'UserController@logout');
});
