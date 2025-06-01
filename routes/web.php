<?php

use Illuminate\Support\Facades\Route;

Route::resource('/', App\Http\Controllers\HomeController::class);
Route::resource('/profil', App\Http\Controllers\ProfilController::class);
Route::resource('/berita', App\Http\Controllers\BeritaController::class);
Route::resource('/produk', App\Http\Controllers\ProdukController::class);
Route::resource('/infografis/penduduk', App\Http\Controllers\InfoPendudukController::class);
Route::get('/infografis/penduduk/data/kelamin/{tahun}', [App\Http\Controllers\InfoPendudukController::class, 'dataByTahunJenisKelamin']);
Route::get('/infografis/penduduk/data/usia/{tahun}', [App\Http\Controllers\InfoPendudukController::class, 'dataByTahunUsia']);



