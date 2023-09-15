<?php

use Illuminate\Http\Request;
use Modules\Apontamento\Http\Controllers\Api\OrdemController;

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
Route::middleware('auth:api')->get('/apontamento', function (Request $request) {
    return $request->user();
});

Route::get('/ordem/{ordem}/origem/{origem}/recurso/{codigoRecurso}', [OrdemController::class, 'getOrdemComOperacao']);
