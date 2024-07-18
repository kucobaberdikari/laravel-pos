<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\APIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=> 'auth:sanctum'], function(){
    Route::get('/produk', [APIController::class, 'index'])->name('produk.index');
    Route::get('/penjualan', [APIController::class, 'penjualan']);

    // auth route
    Route::get('/logout', [AuthController::class, 'logout']);

});

Route::post('/login', [AuthController::class, 'login']);
