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

Route::apiResource('alimento', 'App\Http\Controllers\api\AlimentoController');
Route::apiResource('receita', 'App\Http\Controllers\api\ReceitaController');
Route::apiResource('receitas/{id}/alimentos', 'App\Http\Controllers\api\ReceitasAlimentosController');
Route::apiResource('clientes', 'App\Http\Controllers\api\PedidoController');
Route::apiResource('pedidos', 'App\Http\Controllers\api\PedidoController');
