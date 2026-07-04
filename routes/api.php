<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PolizaController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ValidacionController;

    Route::get('polizas/search', [PolizaController::class, 'search'])->name('poliza.search');
    Route::get('facturas/search', [FacturaController::class, 'search'])->name('factura.search');
    Route::get('polizas', [PolizaController::class, 'index'])->name('poliza.index');
    Route::post('validacion', [ValidacionController::class, 'store'])->name('validacion.store');
    Route::get('validacion', [ValidacionController::class, 'index'])->name('validacion.index');


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
