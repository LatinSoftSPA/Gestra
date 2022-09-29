<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Gestra\MovilesController;


Route::controller(MovilesController::class)->group(function () {
    Route::get('/moviles/{docu_empre}', 'index')->name('moviles.index');
    Route::get('/movil/{docu_empre}/{nume_movil}/{pate_movil}', 'show')->name('movil.show');
    Route::post('/movil', 'store')->name('movil.store');
    Route::put('/movil', 'update')->name('movil.update');
    Route::delete('/movil', 'destroy')->name('movil.destroy');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
