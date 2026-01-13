<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\DokterController;
use App\Http\Controllers\RekamMedisController;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::resource('pasien', PasienController::class);
Route::resource('dokter', DokterController::class);
Route::resource('rekam-medis', RekamMedisController::class);
