<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ClienteController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/*
Route::get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/clientes/listar', 'App\Http\Controllers\ClienteController@listar');
Route::resource('cliente',App\Http\Controllers\ClienteController::class)->only(['index','store','show','update','destroy']);

Route::get('/cobrancas/listar', 'App\Http\Controllers\CobrancaController@listar');
Route::resource('cobranca',App\Http\Controllers\CobrancaController::class)->only(['index','store','show','update','destroy']);


