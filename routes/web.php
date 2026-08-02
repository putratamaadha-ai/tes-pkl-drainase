<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\DrainaseController;

// Halaman utama mengarah ke index drainase
Route::get('/', function () {
    return view('welcome'); // atau home jika nama filenya home.blade.php
});

// Resource route untuk Kecamatan, Kelurahan dan Drainase
Route::resource('kecamatan', KecamatanController::class);
Route::resource('kelurahan', KelurahanController::class);
Route::resource('drainase', DrainaseController::class);