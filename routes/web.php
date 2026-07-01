<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ValidacionController;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard' ,[DashboardController::class, 'index'])->name('dashboard');
    Route::resource('validacion', ValidacionController::class)->names('validacion');
});

require __DIR__.'/settings.php';
