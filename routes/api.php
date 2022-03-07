<?php

use App\Http\Controllers\ArtigosController;
use App\Http\Controllers\MenuController;
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

Route::controller(ArtigosController::class)->group(function () {
    Route::get('artigos/grid', 'grid');
    Route::get('artigos', 'index');
    Route::get('artigos/create', 'create');
    Route::post('artigos/store', 'store');
    Route::get('artigos/{artigo}', 'show');
});

Route::controller(MenuController::class)->group(function () {
    Route::get('menu', 'index');
});

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
