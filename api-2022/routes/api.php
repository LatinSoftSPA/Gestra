<?php

use App\Http\Controllers\Manager\MovilController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::controller(MovilController::class)->group(function () {
    Route::get('/moviles', 'index');
    Route::post('/movil/{nume_movil}/{pate_movil}', 'show');
    Route::post('/movil', 'store');
    Route::put('/movil', 'update');
    Route::delete('/movil', 'destroy');
});


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
