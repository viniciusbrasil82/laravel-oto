<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AuthController;

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

Route::post('/register',[AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware(['auth:api'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/project', function () {
        return 'Projects Fetch Successfully!';
    });
});



Route::middleware('auth:api')->prefix('v1')->group(function () {
    Route::resource('users',App\Http\Controllers\UserController::class)->only(['index','store','show','update','destroy']);
    //Route::resource('products',App\Http\Controllers\ProductController::class)->only(['index','store','show','update','destroy']);

    Route::controller(App\Http\Controllers\ProductController::class)->group(function () {
        Route::get('/products/{id}', 'show');
        Route::post('/products', 'create');
        Route::put('/products', 'store');
        Route::delete('/products/{id}', 'destroy');
        
    }); 
    Route::controller(App\Http\Controllers\OrderController::class)->group(function () {
        Route::get('/orders', 'index');
        Route::get('/orders/{id}', 'show');
        Route::patch('/orders/{id}/status', 'updtstatus');
        Route::post('/orders', 'create');
    });     
});
/*
Route::controller(App\Http\Controllers\OrderController::class)->prefix('v1')->group(function () {
    Route::get('/orders', 'index');
    Route::get('/orders/{id}', 'show');
    Route::patch('/orders/{id}/status', 'updtstatus');
    Route::post('/orders', 'create');
});  */




